<?php
class Controller {
    protected $model,$views;

    public function __construct() 
    { 
        $this->cargarModel();   
        $this->views = new views();
    }

    public function cargarModel() 
    {
        $model = get_class($this) . "Model";
        $ruta = "Backend/Models/" . $model . ".php";
        if (file_exists($ruta)) {
            require_once $ruta;
            if (class_exists($model)) {
                $this->model = new $model();
            } else {
                echo "La clase del modelo no existe: " . $model;
            }
        } else {
            echo "El archivo del modelo no existe: " . $ruta;
        }
    }
}
?>
