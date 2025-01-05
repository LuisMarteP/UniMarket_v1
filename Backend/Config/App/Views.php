<?php
class views{
    public function getview($controlador, $vista, $data=""){
        $controlador = get_class($controlador);
        if ($controlador == "Home"){
            $vista = "Backend/Views/".$vista.".php";

        }else {
            $vista = "Backend/Views/".$controlador."/".$vista.".php";
        }
        require $vista;
    }
}

?>