<?php
// /datos/niñoDAO.php
require_once __DIR__ . '/../config/Database.php';

class PersonalDAO
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addPersonal($nombre, $apellido, $telefono, $cargo, $estado)
{
    $query = "INSERT INTO personal (nombre_personal, apellido_personal, telefono_personal, cargo, estado) 
              VALUES (:nombre_personal, :apellido_personal, :telefono_personal, :cargo,  :estado)";
    
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':nombre_personal', $nombre);
    $stmt->bindParam(':apellido_personal', $apellido);
    $stmt->bindParam(':telefono_personal', $telefono);
    $stmt->bindParam(':cargo', $cargo);
    $stmt->bindParam(':estado', $estado);

    return $stmt->execute(); // Retorna true si la ejecución fue exitosa
}


    // Método para obtener un niño por su ID
    public function getPeById($id)
    {
        $query = "SELECT * FROM personal WHERE id_personal = :id_personal";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_personal', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updatePersonal($id, $nombre, $apellido, $telefono, $cargo, $estado)
    {
        $query = "CALL UpdatePersonal(:id_personal, :nombre_personal, :apellido_personal, :telefono_personal,:cargo,  :estado)";
    
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_personal', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_personal', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellido_personal', $apellido, PDO::PARAM_STR);
        $stmt->bindParam(':telefono_personal', $telefono, PDO::PARAM_STR);
        $stmt->bindParam(':cargo', $cargo, PDO::PARAM_STR);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_STR);
    
        return $stmt->execute();
    }

    // Método para obtener todos los niños
    public function getAllPersonal()
    {
        $query = "SELECT * FROM personal";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para eliminar un niño
    public function deletePersonal($id)
    {
        $estado = 0; // 0 significa "inactivo" o "eliminado"
        $query = "UPDATE personal SET estado = :estado WHERE id_personal = :id_personal"; 
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':estado', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':id_personal', $id, PDO::PARAM_INT);
    
        return $stmt->execute();
    }
}       