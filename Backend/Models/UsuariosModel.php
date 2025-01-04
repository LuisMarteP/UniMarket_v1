<?php 
class UsuariosModel extends Query {
    private $conn;

    public function __construct() {
        parent::__construct();
        $this->conn = (new Conexion())->conect();
    }

    public function getUsuario(string $email, string $pass) {
        $sql = "SELECT * FROM usuarios WHERE Correo_Usu = ? AND Contraseña_Usu = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $pass);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
}
?>
