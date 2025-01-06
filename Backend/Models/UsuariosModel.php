<?php
class UsuariosModel extends Query
{
    private $conn;
    private $rol, $estatus, $nombre, $apellido, $correo, $telefono, $contraseña, $notificaciones, $terminos;

    public function __construct()
    {
        parent::__construct();
        $this->conn = (new Conexion())->conect();
    }

    public function getUsuario(string $email, string $pass)
    {
        $sql = "SELECT * FROM usuarios WHERE Correo_Usu = ? AND Contraseña_Usu = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $pass);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function getRol()
    {
        $sql = "SELECT * FROM roles";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function getEst()
    {
        $sql = "SELECT * FROM estatus";
        $data = $this->selectAll($sql);
        return $data;
    }
    public function getUsuarios()
    {
        $sql = "CALL CargarUsuarios()";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function RegistrarUser($rol, $estatus, $nombre, $apellido, $correo, $telefono, $contraseña, $notificaciones, $terminos)
    {
        $sql = "CALL RegistrarUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, @resultado)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $rol);
        $stmt->bindParam(2, $estatus);
        $stmt->bindParam(3, $nombre);
        $stmt->bindParam(4, $apellido);
        $stmt->bindParam(5, $correo);
        $stmt->bindParam(6, $telefono);
        $stmt->bindParam(7, $contraseña);
        $stmt->bindParam(8, $notificaciones);
        $stmt->bindParam(9, $terminos);
    
        try {
            $stmt->execute();
    
            // Obtener el valor de la variable de salida
            $result = $this->conn->query("SELECT @resultado AS resultado")->fetch(PDO::FETCH_ASSOC);
    
            return $result['resultado'];
        } catch (PDOException $e) {
            error_log("Error al registrar usuario: " . $e->getMessage());
            return "error";
        }
    }
    

    public function inhabilitarUsuario($id)
    {
        $sql = "CALL InhabilitarUsuario(?)";
        $datos = [$id];
        return $this->save($sql, $datos); // Usar tu función `save`
    }


    public function editarUsu(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE ID_Usuario = $id";
        $dataeditar = $this->select($sql);
        return $dataeditar;
    }

    public function EditarUsuario($id, $nombre, $apellido, $correo, $telefono, $estatus, $rol)
    {
    $sql = "CALL EditarUsuario(?, ?, ?, ?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(1, $id);
    $stmt->bindParam(2, $nombre);
    $stmt->bindParam(3, $apellido);
    $stmt->bindParam(4, $correo);
    $stmt->bindParam(5, $telefono);
    $stmt->bindParam(6, $estatus);
    $stmt->bindParam(7, $rol);

    try {
        $stmt->execute();
        return "ok";
    } catch (PDOException $e) {
        error_log("Error al editar usuario: " . $e->getMessage());
        return "error";
    }
}


}


