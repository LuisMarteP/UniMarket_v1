<?php
class Categorias extends Controller
{

    const Estado = 1;

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        //control de inicio de sesion
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url);
        }

        $this->views->getview($this, "index");
    }

    public function listar()
{
    // Verificar si el id_vendedor existe en la sesión
    if (!isset($_SESSION['id_usuario'])) {
        echo json_encode(['error' => 'ID de usuario no definido en la sesión.'], JSON_UNESCAPED_UNICODE);
        die();
    }

    $id_vendedor = $_SESSION['id_usuario'];

    // Depuración para verificar si el ID está correctamente definido
    var_dump($id_vendedor);
    // O usar error_log para escribir en el registro de errores de PHP
    error_log("ID Vendedor: $id_vendedor");

    $data = $this->model->getCategorias($id_vendedor);

    for ($i = 0; $i < count($data); $i++) {
        if ($data[$i]['estado'] == '1') {
            $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
        } else {
            $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
        }

        $data[$i]['acciones'] = '<div class="btn-group" role="group">
        <button class="btn btn-primary" type="button" onclick="btnECategoria(' . $data[$i]['ID_Categoria'] . ');">
                <i class="fas fa-edit"></i></button> 
        <button class="btn btn-danger" type="button" onclick="btnInavCategoria(' . $data[$i]['ID_Categoria'] . ');">
                <i class="fas fa-wrench"></i>
       </button>
       </div>';
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
    
}

    


    public function registrarCategoria()
    {
        try {
            // Sanitizar datos de entrada
            $id_vendedor =  filter_var($_POST['ID_Empresa'], FILTER_SANITIZE_NUMBER_INT);
            $estado = self::Estado;
            $nombre = htmlspecialchars($_POST['nombreCategoria'], ENT_QUOTES, 'UTF-8');
            $descripcion = htmlspecialchars($_POST['descricionCategoria'], ENT_QUOTES, 'UTF-8');

            // Validar campos obligatorios
            if (empty($estado) || empty($id_vendedor) || empty($nombre) || empty($descripcion)) {
                throw new Exception("Por favor, completa todos los campos.");
            }

            if (!empty($id)) {
                $data = $this->model->RegistrarCategoria($id_vendedor, $estado, $nombre, $descripcion);

                if ($data === "ok") {
                    $msg = array("status" => "success", "message" => "Dirección registrada con éxito");
                } else {
                    throw new Exception("Error al registrar categoria");
                }
            }
        } catch (Exception $e) {
            $msg = array("status" => "error", "message" => $e->getMessage());
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    //cargar la categoria a sus campos para editarlos
    public function editar(int $id)
    {
        try {
            $dataeditar = $this->model->editarCat($id); //cargar los datos del usuario al form

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

    // Inhabilitar usuario
    public function inhabilitar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['ID_Usuario'];
            $resultado = $this->model->inhabilitarCategoria($id);
            echo json_encode(["status" => $resultado ? "success" : "error"]);
        }
        exit;
    }
}
