<?php
class Configuracion extends Controller
{

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
        $data = $this->model->getEmpresa(); //cargamos los datos de la empresa en la variable data
        
        $this->views->getview($this, "index", $data);
    }
}