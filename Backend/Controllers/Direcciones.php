<?php
class Direcciones extends Controller
{

    const Estado = 1;

    public function __construct()
    {
        session_start();
        //control de inicio de sesion
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }

        parent::__construct();
    }

    public function index()
    {
        $this->views->getview($this, "index");
        $data['estatus'] = $this->model->getEst();
    }

    public function registrarDireccion()
    {
        try {
            // Sanitizar datos de entrada
            $id =  filter_var($_POST['id_usu'], FILTER_SANITIZE_NUMBER_INT);
            $identificador = htmlspecialchars($_POST['identificador'], ENT_QUOTES, 'UTF-8');
            $ciudad = htmlspecialchars($_POST['ciudad'], ENT_QUOTES, 'UTF-8');
            $codigoPostal = filter_var($_POST['codigoPostal'], FILTER_SANITIZE_NUMBER_INT);
            $sector = htmlspecialchars($_POST['sector'], ENT_QUOTES, 'UTF-8');
            $calle = htmlspecialchars($_POST['calle'], ENT_QUOTES, 'UTF-8');
            $numero = filter_var($_POST['numero'], FILTER_SANITIZE_NUMBER_INT);
            $estado = self::Estado;
            $cordenadasGps = htmlspecialchars($_POST['cordenadasGPS'], ENT_QUOTES, 'UTF-8');

            // Validar campos obligatorios
            if (empty($identificador) || empty($ciudad) || empty($codigoPostal) || empty($sector) || empty($calle) || empty($numero) || empty($cordenadasGps)) {
                throw new Exception("Por favor, completa todos los campos.");
            }

            if (!empty($id)) {
                $data = $this->model->RegistrarDir($id, $identificador, $ciudad, $codigoPostal, $sector, $calle, $numero, $estado, $cordenadasGps);

                if ($data === "ok") {
                    $msg = array("status" => "success", "message" => "Dirección registrada con éxito");
                } else {
                    throw new Exception("Error al registrar la dirección");
                }
            } else {
                throw new Exception("Error con el ID");
            }
        } catch (Exception $e) {
            $msg = array("status" => "error", "message" => $e->getMessage());
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar()
    {
        if (!isset($_SESSION['id'])) {
            echo json_encode(['error' => 'No se encontró el ID de usuario en la sesión']);
            die();
        }
    
        $idUsuario = $_SESSION['id'];
        error_log("ID Usuario recibido en modelo: " . $idUsuario);
    
        $data = $this->model->getDirecciones($idUsuario);
        if ($data === false) {
            echo json_encode(['error' => 'Error al obtener las direcciones']);
            die();
        }
    
        for ($i = 0; $i < count($data); $i++) {
            error_log("Estado de la dirección ID " . $data[$i]['ID_Direccion'] . ": " . $data[$i]['nombre_est']);
    
            if ($data[$i]['nombre_est'] == 'Activo') {
                $data[$i]['nombre_est'] = '<span class="badge badge-success">Activo</span>';
            } else {
                $data[$i]['nombre_est'] = '<span class="badge badge-danger">Inactivo</span>';
            }
            
            $data[$i]['acciones'] = '<div class="btn-group" role="group">
            <button class="btn btn-primary" type="button" onclick="btnEditDir(' . $data[$i]['ID_Direccion'] . ');">
            <i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnInavDir(' . $data[$i]['ID_Direccion'] . ');">
            <i class="fas fa-wrench"></i></button>
            </div>';
        }
    
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    

    //cargar el usuario a editar(Funcion necesaria para conectar la funcion.js"btnEditUser" con el usuariosModel"editarUsu" ))
    public function editar(int $id)
    {
        try {
            $dataeditar = $this->model->editarDir($id); //cargar los datos del usuario al form

            if (!$dataeditar) {
                throw new Exception("No se encontró el usuario con ID proporcionado");
            }

            echo json_encode($dataeditar, JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            $msg = array("status" => "error", "message" => $e->getMessage());
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function editarDireccion()
{
    try {
        $idDireccion = filter_var($_POST['id_dir'], FILTER_SANITIZE_NUMBER_INT);
        $idUsuario = filter_var($_POST['id_usu'], FILTER_SANITIZE_NUMBER_INT);
        $estado = filter_var($_POST['id_Est'], FILTER_SANITIZE_NUMBER_INT);
        $identificador = filter_var($_POST['identificador'], FILTER_SANITIZE_STRING);
        $ciudad = filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING);
        $codigoPostal = filter_var($_POST['codigoPostal'], FILTER_SANITIZE_NUMBER_INT);
        $sector = filter_var($_POST['sector'], FILTER_SANITIZE_STRING);
        $calle = filter_var($_POST['calle'], FILTER_SANITIZE_STRING);
        $numero = filter_var($_POST['numero'], FILTER_SANITIZE_NUMBER_INT);
        $cordenadasGps = filter_var($_POST['cordenadasGPS'], FILTER_SANITIZE_STRING);

        // Validación de campos
        if (empty($idDireccion) || empty($idUsuario) || empty($estado) || empty($identificador) || empty($ciudad) || empty($codigoPostal) || empty($sector) || empty($calle) || empty($numero) || empty($cordenadasGps)) {
            throw new Exception("Todos los campos son obligatorios");
        }

        $data = $this->model->EditarDireccion($idDireccion, $idUsuario, $estado, $identificador, $ciudad, $codigoPostal, $sector, $calle, $numero, $cordenadasGps);

        if ($data === "ok") {
            $msg = array("status" => "success", "message" => "Dirección editada con éxito");
        } else {
            throw new Exception("Error al editar la dirección");
        }
    } catch (Exception $e) {
        $msg = array("status" => "error", "message" => $e->getMessage());
    }

    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
}
// inhabilitar direccion
public function inhabilitar()
{
    try {
        $idDireccion = filter_var($_POST['ID_Direccion'], FILTER_SANITIZE_NUMBER_INT);
        $nuevaDireccionID = filter_var($_POST['NuevaDireccionID'], FILTER_SANITIZE_NUMBER_INT);

        if (empty($idDireccion) || empty($nuevaDireccionID)) {
            throw new Exception("Todos los campos son obligatorios");
        }

        // Inhabilitar la dirección actual
        $this->model->inhabilitarDireccion($idDireccion);

        // Activar la nueva dirección
        $this->model->activarDireccion($nuevaDireccionID);

        $msg = array("status" => "success", "message" => "Dirección inhabilitada y nueva dirección activada con éxito");
    } catch (Exception $e) {
        $msg = array("status" => "error", "message" => $e->getMessage());
    }

    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
}





}
?>