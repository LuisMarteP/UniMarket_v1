<?php
class Usuarios extends Controller
{

    const ESTATUS_ACTIVO = 1;
    const RECIBIR_NOTIFICACIONES = 2;
    const ACEPTA_TERMINOS = 1;

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
             <button class="btn btn-primary" type="button" onclick="btnEditUser(' . $data[$i]['ID_Usuario'] . ');">
             <i class="fas fa-edit"></i></button> 
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

        if ($data) {
            if (password_verify($pass, $data['Contraseña_Usu'])) {
                $_SESSION['Id'] = $data['ID_Usuario'];
                $_SESSION['Rol'] = $data['ID_Rol_Usu'];
                $_SESSION['Nombre'] = $data['Nombre_Usu'];
                echo json_encode(["status" => "success", "message" => "ok"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Contraseña incorrecta."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Usuario no encontrado."]);
        }


        exit;
    }

    public function registrar()
    {
        try {

            $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
            $rol = filter_var($_POST['Rol'], FILTER_SANITIZE_NUMBER_INT);
            $nombre = filter_var($_POST['Nombre'], FILTER_SANITIZE_STRING);
            $apellido = filter_var($_POST['Apellido'], FILTER_SANITIZE_STRING);
            $correo = filter_var($_POST['Correo'], FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['Telefono'], FILTER_SANITIZE_NUMBER_INT);
            $contraseña = $_POST['Contraseña'];
            $confContraseña = $_POST['ConfContraseña'];

            $estatus = self::ESTATUS_ACTIVO;
            $notificaciones = self::RECIBIR_NOTIFICACIONES;
            $terminos = self::ACEPTA_TERMINOS;

            // Validar campos obligatorios
            if (empty($rol) || empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($contraseña) || empty($confContraseña)) {
                throw new Exception("Llenar todos los campos");
            }

            // Registrar nuevo usuario
            if (empty($id)) {
                if ($contraseña !== $confContraseña) {
                    throw new Exception("Las contraseñas no coinciden");
                }

                $contraseña_hash = password_hash($contraseña, PASSWORD_DEFAULT);
                $data = $this->model->RegistrarUser($rol, $estatus, $nombre, $apellido, $correo, $telefono, $contraseña_hash, $notificaciones, $terminos);

                if ($data === "ok") {
                    $msg = array("status" => "success", "message" => "Usuario registrado con éxito");
                } elseif ($data === "email_exists") {
                    throw new Exception("El correo ya está en uso");
                } else {
                    throw new Exception("Error al registrar el usuario");
                }
            }
        } catch (Exception $e) {
            $msg = array("status" => "error", "message" => $e->getMessage());
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }


    // Inhabilitar usuario
    public function inhabilitar()
    {
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
        try {
            $dataeditar = $this->model->editarUsu($id); //cargar los datos del usuario al form

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

    public function editarUser()
    {
        try {
            
            $nombre = filter_var($_POST['p_Nombre_Usu'], FILTER_SANITIZE_STRING);
            $apellido = filter_var($_POST['p_Apellido_Us'], FILTER_SANITIZE_STRING);
            $correo = filter_var($_POST['p_Correo_Usu'], FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['p_Telefono_Usu'], FILTER_SANITIZE_NUMBER_INT);
            $estatus = filter_var($_POST['p_ID_Estatus'], FILTER_SANITIZE_NUMBER_INT);
            $rol = filter_var($_POST['p_ID_Rol_Usu'], FILTER_SANITIZE_NUMBER_INT);
            $id = filter_var($_POST['p_ID_Usuario'], FILTER_SANITIZE_NUMBER_INT);

            // Validación de campos
            if (empty($nombre) || empty($apellido) || empty($correo) || empty($telefono) || empty($estatus || empty($rol) || empty($id) )) {
                throw new Exception("Todos los campos son obligatorios");
            }

            $data = $this->model->EditarUsuario($id, $nombre, $apellido, $correo, $telefono, $estatus, $rol);

            if ($data === "ok") {
                $msg = array("status" => "success", "message" => "Usuario editado con éxito");
            } else {
                throw new Exception("Error al editar el usuario");
            }
        } catch (Exception $e) {
            $msg = array("status" => "error", "message" => $e->getMessage());
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
