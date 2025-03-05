<?php
// /datos/niñoDAO.php
require_once __DIR__ . '/../config/Database.php';

class NiñoDAO
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Método para agregar un niño
    public function addNiño($nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia)
    {
        $query = "INSERT INTO niños (nombre_completo, fecha_nacimiento, direccion, numero_contacto, persona_contacto_emergencia, telefono_emergencia) 
                  VALUES (:nombre_completo, :fecha_nacimiento, :direccion, :numero_contacto, :persona_contacto_emergencia, :telefono_emergencia)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nombre_completo', $nombre_completo);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':numero_contacto', $numero_contacto);
        $stmt->bindParam(':persona_contacto_emergencia', $persona_contacto_emergencia);
        $stmt->bindParam(':telefono_emergencia', $telefono_emergencia);

        return $stmt->execute(); // Retorna true si la ejecución fue exitosa
    }

    // Método para obtener un niño por su ID
    public function getNiñoById($id)
    {
        $query = "SELECT * FROM niños WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function updateNiño($Id,$nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia )
    {
        $query = "CALL UpdateNiño(:id, :nombre_completo, :fecha_nacimiento, :direccion, :numero_contacto, :persona_contacto_emergencia, :telefono_emergencia)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $Id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_completo', $nombre_completo, PDO::PARAM_STR);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento, PDO::PARAM_STR);
        $stmt->bindParam(':direccion', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':numero_contacto', $numero_contacto, PDO::PARAM_STR);
        $stmt->bindParam(':persona_contacto_emergencia', $persona_contacto_emergencia, PDO::PARAM_STR);
        $stmt->bindParam(':telefono_emergencia', $telefono_emergencia, PDO::PARAM_STR);
        return $stmt->execute(); // devuelve el resultado de la ejecución
    }
    // Método para actualizar la asistencia de un niño
    public function updateAsistencia($id, $asistencia)
    {
        $query = "UPDATE niños SET asistencia = :asistencia WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':asistencia', $asistencia, PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    // Método para obtener todos los niños
    public function getAllNiños()
    {
        $query = "SELECT * FROM niños";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para eliminar un niño
    public function deleteNiño($id)
    {
        $query = "DELETE FROM niños WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        return $stmt->execute();
    }
}
?>
