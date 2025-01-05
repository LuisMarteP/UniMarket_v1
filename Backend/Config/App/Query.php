<?php
class Query extends Conexion{
    private $pdo, $con, $sql;
    public function __construct(){
        $this->pdo = new Conexion();
        $this->con = $this->pdo->conect();
    }
    public function select(string $sql)
    {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute();
        $data = $resul->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

public function selectAll(string $sql)
{
    try {
        $this->sql = $sql;
        $resul = $this->con->prepare($this->sql);
        $resul->execute(); // Ejecuta la consulta
        $data = $resul->fetchAll(PDO::FETCH_ASSOC); // Obtén todos los resultados
        return $data;
    } catch (PDOException $e) {
        // Captura errores y retorna un mensaje útil
        return ["error" => $e->getMessage()];
    }
}

    
}

?>