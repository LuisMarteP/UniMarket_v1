<?php
spl_autoload_register(function($class){

    if (file_exists("Backend/Config/App/".$class.".php")){
        require_once "Backend/Config/App/" . $class . ".php";
    }
})

?>