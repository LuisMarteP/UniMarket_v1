<?php 
require_once "Backend/Config/Config.php";

// Redirigir a la página principal del frontend si no se especifica una ruta
if (!isset($_GET['url']) || empty($_GET['url'])) {
    header("Location: Frontend");
    exit();
}

$ruta = htmlspecialchars($_GET['url']);
$array = explode("/", $ruta);
$controller = $array[0];
$metodo = "index";
$parametro = "";

if (!empty($array[1])) {
    if (!empty($array[1] != "")){
        $metodo = $array[1];
    }
}
if (!empty($array[2])){
    if (!empty($array[2] != "")){
        for ($i=2; $i < count($array); $i++){
            $parametro .= $array[$i]. ",";
        }
        $parametro = trim($parametro, ",");
    }
}

require_once "Backend/Config/App/autoload.php";

$dircontrollers = "Backend/Controllers/".$controller.".php";
if (file_exists($dircontrollers)){
    require_once $dircontrollers;
    $controller = new $controller();
    if (method_exists($controller, $metodo)){
        $controller->$metodo($parametro);
    } else {
        echo "No existe el metodo";
    } 
} else { 
    echo "No existe el controlador";
}
?>
