<?php
class Usuarios extends Controller
{

    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        $data['estatus'] = $this->model->getEst();
        $data['roles'] = $this->model->getRol();
        $this->views->getview($this, "index", $data);
    }

    //Cargar usuarios
    public function listar()
    {
        $data = $this->model->getUsuarios();
        for ($i = 0; $i < count($data); $i++) {

            $data[$i]['acciones'] = '<div>
             <button class="btn btn-primary" type="button" onclick="btnEditUser(' . $data[$i]['ID_Usuario'] . ');"><i class="fas fa-edit"></i></button> 
             </div>';
             $data[$i]['acciones1'] = '<div>
             <button class="btn btn-danger" type="button" onclick="btnDeleteUser(' . $data[$i]['ID_Usuario'] . ');">
             <i class="fas fa-trash-alt"></i></button>
             </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //Validar usuarios (Inicio de sesion)
    public function validar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405); // Método no permitido
            echo json_encode(["status" => "error", "message" => "Método no permitido."]);
            exit;
        }
    
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $pass = $_POST['pass'];
    
        if (!$email || empty($pass)) {
            echo json_encode(["status" => "error", "message" => "Por favor, completa todos los campos."]);
            exit;
        }
    
        $data = $this->model->getUsuario($email);
    
        if ($data && password_verify($pass, $data['Contraseña'])) {
            $_SESSION['Id'] = $data['ID_Usuario'];
            $_SESSION['Rol'] = $data['ID_Rol_Usu'];
            $_SESSION['Nombre'] = $data['Nombre_Usu'];
            echo json_encode(["status" => "success", "message" => "ok"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Usuario o Contraseña incorrecta."]);
        }
        exit;
    }
    

    public function registrar()
    {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $rol = filter_var($_POST['Rol'], FILTER_SANITIZE_NUMBER_INT);
        $nombre = filter_var($_POST['Nombre']);
        $apellido = filter_var($_POST['Apellido']);
        $correo = filter_var($_POST['Correo'], FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['Telefono'], FILTER_SANITIZE_NUMBER_INT);
        $contraseña = $_POST['Contraseña'];
        $confContraseña = $_POST['ConfContraseña'];
        $estatus = '1';
        $notificaciones = '2';
        $terminos = '1';

        if (empty($rol) || empty($nombre) || empty($apellido) || empty($correo) || empty($telefono)) {
            $msg = array("status" => "error", "message" => "Llenar todos los campos");
        } else {
            if ($id == "") {
                if ($contraseña != $confContraseña) {
                    $msg = array("La contraseña no coinciden");
                }
                $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT); //Cifrar la contraseña
                $data = $this->model->RegistrarUser($rol, $estatus, $nombre, $apellido, $correo, $telefono, $contraseña_hash, $notificaciones, $terminos);
                if ($data == "ok") {
                    $msg = array("status" => "success", "message" => "Usuario registrado con éxito");
                } else {
                    $msg = array("status" => "error", "message" => "Error en el registro del usuario");
                }
            } else {
                $data = $this->model->modificarUsuario($rol, $estatus, $nombre, $apellido, $correo, $telefono, $id);
                if ($data == "ok") {
                    $msg = array("status" => "success", "message" => "Usuario registrado con éxito");
                } else {
                    $msg = array("status" => "error", "message" => "Error en el registro del usuario");
                }
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    // Inhabilitar usuario
    public function inhabilitar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['ID_Usuario'];
            $resultado = $this->model->inhabilitarUsuario($id);
            echo json_encode(["status" => $resultado ? "success" : "error"]);
        }
        exit;
    }
    

    //cargar el usuario a editar(Funcion necesaria para conectar la funcion.js"btnEditUser" con el usuariosModel"editarUsu" ))
    public function editar(int $id) 
    {
       $dataeditar = $this->model->editarUsu($id);
       echo json_encode($dataeditar,JSON_UNESCAPED_UNICODE);
       die;
    }

    public function editarUser()
    {
        $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
        $rol = filter_var($_POST['Rol'], FILTER_SANITIZE_NUMBER_INT);
        $nombre = filter_var($_POST['Nombre']);
        $apellido = filter_var($_POST['Apellido']);
        $correo = filter_var($_POST['Correo'], FILTER_SANITIZE_EMAIL);
        $telefono = filter_var($_POST['Telefono'], FILTER_SANITIZE_NUMBER_INT);
        $estatus = filter_var($_POST['Estatus'], FILTER_SANITIZE_NUMBER_INT);
    
        $campos = [$id, $rol, $nombre, $apellido, $correo, $telefono, $estatus];
if (in_array("", $campos, true)) {
    $msg = array("status" => "error", "message" => "Llenar todos los campos");
    echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    die();
} else {
            $data = $this->model->EditarUsuario($id, $nombre, $apellido, $correo, $telefono, $estatus, $rol);
            if ($data == "ok") {
                $msg = array("status" => "success", "message" => "Usuario editado con éxito");
            } else {
                $msg = array("status" => "error", "message" => "Error al editar el usuario");
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    

   
}
