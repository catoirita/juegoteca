<?php
// /datos/niñoDAO.php
require_once __DIR__ . '/../config/Database.php';

class AutorizadoDAO
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addAutorizado($idNi, $nombreAu, $celularAu,$parentesco, $estado)
{
    $query = "INSERT INTO autorizados (niño_id, nombre_autorizado, telefono_autorizado, parentesco, estado) 
              VALUES (:nino_id, :nombre_autorizado, :telefono_autorizado, :parentesco, :estado)";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nino_id', $idNi);
    $stmt->bindParam(':nombre_autorizado', $nombreAu);
    $stmt->bindParam(':telefono_autorizado', $celularAu);
    $stmt->bindParam(':parentesco', $parentesco);
    $stmt->bindParam(':estado', $estado);

    return $stmt->execute(); // Retorna true si la ejecución fue exitosa
}


    // Método para obtener un niño por su ID
    public function getAuById($autorizadoId)
{
    // Modificar la consulta para hacer un JOIN con la tabla niños y obtener el nombre
    $query = "SELECT e.id, e.nombre_autorizado, telefono_autorizado, e.niño_id, e.parentesco, e.estado, n.nombre_completo AS nombre_niño 
              FROM autorizados e 
              JOIN niños n ON e.niño_id = n.id
              WHERE e.id = :autorizadoId";

    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':autorizadoId', $autorizadoId, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);  // Retorna los resultados
}



    public function updateAu($idAu, $idNi, $nombreAu, $celularAu, $parentesco,$estado)
    {
        $query = "CALL UpdateAu(:id, :nino_id, :nombre_autorizado, :telefono_autorizado, :parentesco, :estado)";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $idAu, PDO::PARAM_INT);
        $stmt->bindParam(':nino_id', $idNi, PDO::PARAM_STR);
        $stmt->bindParam(':nombre_autorizado', $nombreAu, PDO::PARAM_STR);
        $stmt->bindParam(':telefono_autorizado', $celularAu, PDO::PARAM_STR);
        $stmt->bindParam(':parentesco', $parentesco, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    // Método para obtener todos los niños
    public function getAllAu()
    {
        $query = "SELECT autorizados.id, niños.nombre_completo AS nombre_niño, autorizados.nombre_autorizado, autorizados.telefono_autorizado, autorizados.parentesco, autorizados.estado 
              FROM autorizados
              JOIN niños ON autorizados.niño_id = niños.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para eliminar un niño
    public function deleteAu($idAu)
    {
        $estado = 0; // 0 significa "inactivo" o "eliminado"
        $query = "UPDATE autorizados SET estado = :estado WHERE id = :id"; 
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':id', $idAu, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
}       