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

    public function validarUsuario(string $email, string $password)
    {
        $sql = "CALL ValidarUsuario(?, ?, @p_resultado, @p_id_usuario, @p_nombre, @p_rol)";
        $stmt = $this->conn->prepare($sql);

        try {
            // Ejecutar el procedimiento almacenado
            $stmt->execute([$email, $password]);

            // Obtener los resultados de las variables OUT
            $resultQuery = $this->conn->query("SELECT @p_resultado AS resultado, @p_id_usuario AS id_usuario, @p_nombre AS nombre, @p_rol AS rol");
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            error_log("Error al validar usuario: " . $e->getMessage());
            return null;
        }
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

    public function RegistrarUser(string $rol, string  $estatus, string  $nombre, string  $apellido, string  $correo, string  $telefono, string  $contraseña, string  $notificaciones, string  $terminos)
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
    public function EditarUsuario(string $id, string $nombre, string $apellido, string $correo, string $telefono, string $estatus, string $rol)
    {
        // Procedimiento almacenado con el parámetro OUT
        $sql = "CALL EditarUsuario(?, ?, ?, ?, ?, ?, ?, @p_resultado)";
        $stmt = $this->conn->prepare($sql);

        // Vincular los parámetros en el orden correcto
        $stmt->bindParam(1, $id, PDO::PARAM_INT);           // ID_Usuario
        $stmt->bindParam(2, $nombre, PDO::PARAM_STR);       // Nombre_Usu
        $stmt->bindParam(3, $apellido, PDO::PARAM_STR);     // Apellido_Usu
        $stmt->bindParam(4, $correo, PDO::PARAM_STR);       // Correo_Usu
        $stmt->bindParam(5, $telefono, PDO::PARAM_STR);     // Telefono_Usu
        $stmt->bindParam(6, $estatus, PDO::PARAM_INT);      // ID_Estatus
        $stmt->bindParam(7, $rol, PDO::PARAM_INT);          // ID_Rol_Usu

        try {
            // Ejecutar el procedimiento almacenado
            $stmt->execute();

            // Consultar el valor del parámetro OUT
            $resultQuery = $this->conn->query("SELECT @p_resultado AS resultado");
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);

            return $result['resultado']; // Retorna el resultado del procedimiento
        } catch (PDOException $e) {
            // Registrar el error en los logs para depuración
            error_log("Error al editar usuario: " . $e->getMessage());
            return "error"; // Devuelve un valor genérico en caso de error
        }
    }
}
