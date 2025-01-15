<?php
class DireccionesModel extends Query
{
    private $conn;
    private $id_dir, $id_usuario, $identificador, $sector,  $Ciudad, $Codigo_Postal, $Sector, $Calle, $Numero, $Cordenadas_Gps;

    public function __construct()
    {
        parent::__construct();
        $this->conn = (new Conexion())->conect();
    }

  public function getDirecciones($idUsuario)
    {
        $sql = "CALL CargarDirecciones(?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    public function RegistrarDir($id, $identificador, $ciudad, $codigoPostal, $sector, $calle, $numero, $estado, $cordenadasGps)
    {
        try {
            $sql = "CALL AddDireccion(?, ?, ?, ?, ?, ?, ?, ?, ?, @resultado)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id, PDO::PARAM_INT);
            $stmt->bindParam(2, $identificador, PDO::PARAM_STR);
            $stmt->bindParam(3, $ciudad, PDO::PARAM_STR);
            $stmt->bindParam(4, $codigoPostal, PDO::PARAM_INT);
            $stmt->bindParam(5, $sector, PDO::PARAM_STR);
            $stmt->bindParam(6, $calle, PDO::PARAM_STR);
            $stmt->bindParam(7, $numero, PDO::PARAM_INT);
            $stmt->bindParam(8, $estado, PDO::PARAM_INT);
            $stmt->bindParam(9, $cordenadasGps, PDO::PARAM_STR);
            $stmt->execute();

            // Obtener el resultado del procedimiento almacenado
            $result = $this->conn->query("SELECT @resultado AS resultado");
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['resultado'];
        } catch (Exception $e) {
            return "Error al registrar la dirección: " . $e->getMessage();
        }
    }

    // Cargar el usuario seleccionado a los campos de edicion
    public function editarDir(int $id_dir)
    {
        $sql = "SELECT * FROM direcciones WHERE ID_Direccion = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id_dir, PDO::PARAM_INT);
        $stmt->execute();
        $dataeditar = $stmt->fetch(PDO::FETCH_ASSOC);
        return $dataeditar;
    }

    public function EditarDireccion(string $idDireccion, string $idUsuario, string $estado, string $identificador, string $ciudad, string $codigoPostal, string $sector, string $calle, string $numero, string $cordenadasGps)
    {
        
        $sql = "CALL EditarDireccion(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, @p_resultado)";
        $stmt = $this->conn->prepare($sql);
    
        // Vincular los parámetros en el orden correcto         //Nombre de la columnas en la tablas direcciones
        $stmt->bindParam(1, $idDireccion, PDO::PARAM_INT);      // ID_Direccion
        $stmt->bindParam(2, $idUsuario, PDO::PARAM_INT);        // ID_Usuario
        $stmt->bindParam(3, $estado, PDO::PARAM_INT);           // Estado
        $stmt->bindParam(4, $identificador, PDO::PARAM_STR);    // Identificador
        $stmt->bindParam(5, $ciudad, PDO::PARAM_STR);           // Ciudad
        $stmt->bindParam(6, $codigoPostal, PDO::PARAM_INT);     // Codigo_Postal
        $stmt->bindParam(7, $sector, PDO::PARAM_STR);           // Sector
        $stmt->bindParam(8, $calle, PDO::PARAM_STR);            // Calle
        $stmt->bindParam(9, $numero, PDO::PARAM_INT);           // Numero
        $stmt->bindParam(10, $cordenadasGps, PDO::PARAM_STR);   // Cordenadas_Gps
    
        try {
            // Ejecutar el procedimiento almacenado
            $stmt->execute();
    
            // Consultar el valor del parámetro OUT
            $resultQuery = $this->conn->query("SELECT @p_resultado AS resultado");
            $result = $resultQuery->fetch(PDO::FETCH_ASSOC);
    
            return $result['resultado']; // Retorna el resultado del procedimiento
        } catch (PDOException $e) {
            // Registrar el error en los logs para depuración
            error_log("Error al editar dirección: " . $e->getMessage());
            return "error"; // Devuelve un valor genérico en caso de error
        }
    }
    
    public function inhabilitarDireccion($idDireccion)
    {
        $sql = "UPDATE direcciones SET Estado = 2 WHERE ID_Direccion = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $idDireccion, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public function activarDireccion($idDireccion)
    {
        $sql = "UPDATE direcciones SET Estado = 1 WHERE ID_Direccion = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $idDireccion, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    


}
?>