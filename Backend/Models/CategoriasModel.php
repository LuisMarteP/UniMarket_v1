<?php
class CategoriasModel extends Query
{
    private $conn;

    public function __construct()
    {
        parent::__construct(); // Inicializa la conexión de la clase base
        $this->conn = (new Conexion())->conect(); // Establece la conexión PDO
    }

 

    // Cargar las categorías relacionadas con la empresa (filtrar por ID_Vendedor)
    public function getCategorias($id_vendedor)
    {
        $sql = "CALL CargarCategorias(?)";
        var_dump($sql); // Imprime la consulta SQL
        echo "Consulta SQL: " . $sql . "<br>";
    
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $id_vendedor, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Devuelve todas las categorías
        return $data;
    }
    
    // Registrar una nueva categoría (ID_Vendedor es el ID de la empresa)
    public function RegistrarCat($id_vendedor, $id_estado, $nombre, $descripcion)
    {
        try {
            $sql = "CALL RegistrarCategoria(?, ?, ?, ?, @resultado)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id_vendedor, PDO::PARAM_INT);
            $stmt->bindParam(2, $id_estado, PDO::PARAM_INT);
            $stmt->bindParam(3, $nombre, PDO::PARAM_STR);
            $stmt->bindParam(4, $descripcion, PDO::PARAM_STR);
            $stmt->execute();

            // Obtener el resultado del procedimiento almacenado
            $result = $this->conn->query("SELECT @resultado AS resultado");
            $row = $result->fetch(PDO::FETCH_ASSOC);
            return $row['resultado']; // Devuelve el resultado del procedimiento
        } catch (Exception $e) {
            return "Error al registrar la categoría: " . $e->getMessage();
        }
    }

        // Cargar el usuario seleccionado a los campos de edicion
        public function editarUsu(int $id)
        {
            $sql = "SELECT * FROM categorias WHERE ID_Categoria = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $dataeditar = $stmt->fetch(PDO::FETCH_ASSOC);
            return $dataeditar;
        }

        public function inhabilitarCategoria($id)
        {
            $sql = "CALL InhabilitarCategoria(?)";
            $datos = [$id];
            return $this->save($sql, $datos); // Usar tu función `save`
        }
    
}
?>

