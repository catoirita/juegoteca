<?php
// /services/niñoService.php
require_once __DIR__ . '/../data/EnfermedadDAO.php';

class EnfermedadService
{
    private $enfermedadDAO;

    public function __construct()
    {
        $this->enfermedadDAO = new EnfermedadDAO();
    }

    // Servicio para agregar un niño
    public function addEnfermedad($idNi, $descripcion,$medicamento, $estado)
    {
        return $this->enfermedadDAO->addEnfermedad((int)$idNi, $descripcion,$medicamento, (int)$estado);
    }

    // Servicio para obtener un niño por su ID
    public function getEnById($idEn)
    {
        return $this->enfermedadDAO->getEnById($idEn);
    }

   
    public function updateEn($idEn, $idNi, $descripcion,$medicamento, $estado)
    {
        return $this->enfermedadDAO->updateEn($idEn, (int)$idNi, $descripcion,$medicamento,(int)$estado);
    }

    // Servicio para obtener todos los niños
    public function getAllEn()
    {
        return $this->enfermedadDAO->getAllEn();
    }

    // Servicio para eliminar un niño
    public function deleteEn($idEn)
    {
        return $this->enfermedadDAO->deleteEn($idEn);
    }
}
?>
