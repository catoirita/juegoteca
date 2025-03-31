<?php
// /datos/niñoDAO.php
require_once __DIR__ . '/../config/Database.php';

class EnfermedadDAO
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addEnfermedad($idNi, $descripcion, $medicamento, $estado)
    {
        $query = "INSERT INTO enfermedad (niño_id, descripcion, medicamento, estado) 
                  VALUES (:nino_id, :descripcion, :medicamento, :estado)";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nino_id', $idNi);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':medicamento', $medicamento);
        $stmt->bindParam(':estado', $estado);

        return $stmt->execute(); // Retorna true si la ejecución fue exitosa
    }

    // Método para obtener una enfermedad por su ID
    public function getEnById($enfermedadId)
    {
        $query = "SELECT e.id, e.descripcion, e.estado, e.niño_id, n.nombre_completo AS nombre_niño 
                  FROM enfermedad e 
                  JOIN niños n ON e.niño_id = n.id
                  WHERE e.id = :enfermedadId";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':enfermedadId', $enfermedadId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorna los resultados
    }

    // Método para actualizar una enfermedad
    public function updateEn($enfermedadId, $idNi, $descripcion, $medicamento, $estado)
    {
        // Consulta SQL para actualizar la enfermedad
        $query = "UPDATE enfermedad 
                  SET niño_id = :nino_id, descripcion = :descripcion, medicamento = :medicamento, estado = :estado 
                  WHERE id = :enfermedad_id";
        
        // Preparar la consulta
        $stmt = $this->conn->prepare($query);

        // Enlazar los parámetros con los valores
        $stmt->bindParam(':nino_id', $idNi, PDO::PARAM_INT); // Asegúrate de que $idNi es un entero
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':medicamento', $medicamento, PDO::PARAM_STR); // Agregar el parámetro medicamento
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT); // Asegúrate de que $estado es un entero
        $stmt->bindParam(':enfermedad_id', $enfermedadId, PDO::PARAM_INT);

        // Ejecutar la consulta y retornar si fue exitosa
        return $stmt->execute();  // Retorna true si la ejecución fue exitosa
    }

    // Método para obtener todos los registros de enfermedades
    public function getAllEn()
    {
        $query = "SELECT enfermedad.id, niños.nombre_completo AS nombre_niño, enfermedad.descripcion, enfermedad.medicamento, enfermedad.estado 
                  FROM enfermedad
                  JOIN niños ON enfermedad.niño_id = niños.id";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para eliminar una enfermedad (cambiar el estado a 0)
    public function deleteEn($idEn)
    {
        $estado = 0; // 0 significa "inactivo" o "eliminado"
        $query = "UPDATE enfermedad SET estado = :estado WHERE id = :id"; 
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':id', $idEn, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
}
?>
