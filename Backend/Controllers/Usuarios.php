<?php
class Usuarios extends Controller {

     public function __construct()
     {
        session_start();
        parent::__construct();
     }

    public function index() {
        $this->views->getview($this, "index");
    }

    public function validar() {
        if (empty($_POST['email']) || empty($_POST['pass'])) {
            $msg = "Los campos están vacíos";
        } else {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $data = $this->model->getUsuario($email, $pass);
            if ($data) {
                $_SESSION['Id'] = $data['ID_Usuario'];
                $_SESSION['Rol'] = $data['ID_Rol_Usu'];
                $_SESSION['Nombre'] = $data['Nombre_Usu'];
                
                $msg = "ok";
            } else {
                $msg = "Usuario o Contraseña incorrecta";
            }
        }
        
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
}
?>
