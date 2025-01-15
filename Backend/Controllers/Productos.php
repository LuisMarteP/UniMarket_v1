<?php
class Productos extends Controller
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
}
?>