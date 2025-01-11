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

    public function getUsuario(string $email)
    {
        $sql = "SELECT * FROM usuarios WHERE Correo_Usu = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $email);
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

    public function RegistrarUser(string $rol,string  $estatus,string  $nombre,string  $apellido,string  $correo,string  $telefono,string  $contraseña,string  $notificaciones,string  $terminos)
    {
        $sql = "CALL RegistrarUsuario(?, ?, ?, ?, ?, ?, ?, ?, ?, @p_resultado)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $rol, PDO::PARAM_INT);
        $stmt->bindParam(2, $estatus, PDO::PARAM_INT);
        $stmt->bindParam(3, $nombre, PDO::PARAM_STR);
        $stmt->bindParam(4, $apellido, PDO::PARAM_STR);
        $stmt->bindParam(5, $correo, PDO::PARAM_STR);
        $stmt->bindParam(6, $telefono, PDO::PARAM_STR);
        $stmt->bindParam(7, $contraseña, PDO::PARAM_STR);
        $stmt->bindParam(8, $notificaciones, PDO::PARAM_BOOL);
        $stmt->bindParam(9, $terminos, PDO::PARAM_BOOL);

        try {
            $stmt->execute();

            // Obtener el resultado
            $resultQuery = $this->conn->query("SELECT @p_resultado AS resultado");
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);

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

    // Cargar el usuario seleccionado a los campos de edicion
    public function editarUsu(int $id)
    {
        $sql = "SELECT * FROM usuarios WHERE ID_Usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $dataeditar = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dataeditar;
    }

    // Funcion para editar el usuario seleccionado(Usando proceso almacenado)
    public function EditarUsuario(string $nombre,string $apellido,string $correo,string $telefono,string $estatus,string $rol,string $id)
{
    $sql = "CALL EditarUsuario(?, ?, ?, ?, ?, ?, ?, @p_resultado)";
    $stmt = $this->conn->prepare($sql);

    // Vincula los parámetros en el mismo orden que en el procedimiento
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->bindParam(2, $nombre, PDO::PARAM_STR);
    $stmt->bindParam(3, $apellido, PDO::PARAM_STR);
    $stmt->bindParam(4, $correo, PDO::PARAM_STR);
    $stmt->bindParam(5, $telefono, PDO::PARAM_STR);
    $stmt->bindParam(6, $estatus, PDO::PARAM_INT);
    $stmt->bindParam(7, $rol, PDO::PARAM_INT);

    try {
        $stmt->execute();

        // Obtener el resultado de la variable OUT
        $resultQuery = $this->conn->query("SELECT @p_resultado AS resultado");
        $result = $resultQuery->fetch(PDO::FETCH_ASSOC);

        return $result['resultado'];
    } catch (PDOException $e) {
        error_log("Error al editar usuario: " . $e->getMessage());
        return "error";
    }
}
}
