<?php
// /datos/inscripcionDAO.php
require_once __DIR__ . '/../config/Database.php';

class InscripcionDAO
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function addInscripcion($id_niño, $fecha_inscripcion, $monto_pago, $estado_pago)
    {
        $query = "INSERT INTO inscripciones (id_niño, fecha_inscripcion, monto_pago, estado_pago,) 
                  VALUES (:id_niño, :fecha_inscripcion, :monto_pago, :estado_pago)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_niño', $id_nino, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_inscripcion', $fecha_inscripcion);
        $stmt->bindParam(':monto_pago', $monto_pago);
        $stmt->bindParam(':estado_pago', $estado_pago);
       

        return $stmt->execute(); 
    }

    public function getInscripcionById($id)
    {
        $query = "SELECT * FROM inscripciones WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateInscripcion($id, $id_niño, $fecha_inscripcion, $monto_pago, $estado_pago)
    {
        $query = "UPDATE inscripciones SET id_niño = :id_niño, fecha_inscripcion = :fecha_inscripcion, monto_pago = :monto_pago, estado_pago = :estado_pago WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':id_niño', $id_niño, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_inscripcion', $fecha_inscripcion);
        $stmt->bindParam(':monto_pago', $monto_pago);
        $stmt->bindParam(':estado_pago', $estado_pago);
        
        return $stmt->execute(); 
    }

    public function getAllInscripciones()
    {
        $query = "SELECT * FROM inscripciones";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteInscripcion($id)
    {
        $query = "DELETE FROM inscripciones WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }
}
?>