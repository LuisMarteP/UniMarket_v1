<?php 
class FrontendModel extends Query {
    private $conn;
    
    public function __construct()
    {
        parent::__construct();
        $this->conn = (new Conexion())->conect();
    }
}
?>