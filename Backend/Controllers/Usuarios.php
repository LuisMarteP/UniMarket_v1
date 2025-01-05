<?php
class Usuarios extends Controller {

     public function __construct()
     {
        session_start();
        parent::__construct();
     }

    public function index() {
        $data['roles'] = $this->model->getRol();
        $this->views->getview($this, "index", $data);
    }

    //Cargar usuarios
     public function listar(){
        $data = $this->model->getUsuarios();
        for ($i=0; $i < count($data); $i++){
           
             $data[$i]['acciones'] = '<div>
             <button class="btn btn-primary" type="button"><i class="fas fa-edit"></i></button> 
             <button class="btn btn-danger" type="button"><i class="fas fa-trash-alt"></i></button>
             </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

     //Validar usuarios (Inicio de sesion)
    public function validar() {
        if (empty($_POST['email']) || empty($_POST['pass'])) {
            $msg = array("status" => "error", "message" => "Por favor, completa todos los campos.");
        } else {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $data = $this->model->getUsuario($email, $pass);
    
            if ($data) {
                $_SESSION['Id'] = $data['ID_Usuario'];
                $_SESSION['Rol'] = $data['ID_Rol_Usu'];
                $_SESSION['Nombre'] = $data['Nombre_Usu'];
                $msg = array("status" => "success", "message" => "ok");
            } else {
                $msg = array("status" => "error", "message" => "Usuario o Contraseña incorrecta.");
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die(); // Evita que PHP envíe datos adicionales
    }
    
}
?>



                