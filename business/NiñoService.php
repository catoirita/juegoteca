<?php
// /services/niñoService.php
require_once __DIR__ . '/../data/niñoDAO.php';

class NiñoService
{
    private $niñoDAO;

    public function __construct()
    {
        $this->niñoDAO = new NiñoDAO();
    }

    // Servicio para agregar un niño
    public function addNiño($nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia)
    {
        return $this->niñoDAO->addNiño($nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia);
    }

    // Servicio para obtener un niño por su ID
    public function getNiñoById($id)
    {
        return $this->niñoDAO->getNiñoById($id);
    }

    // Servicio para actualizar la asistencia de un niño
    public function updateNiño($id, $nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia)
    {
        return $this->niñoDAO->updateNiño($id, $nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia);
    }

    // Servicio para obtener todos los niños
    public function getAllNiños()
    {
        return $this->niñoDAO->getAllNiños();
    }

    // Servicio para eliminar un niño
    public function deleteNiño($id)
    {
        return $this->niñoDAO->deleteNiño($id);
    }
}
?>
