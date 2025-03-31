<?php
// /services/niñoService.php
require_once __DIR__ . '/../data/PersonalDAO.php';

class PersonalService
{
    private $personalDAO;

    public function __construct()
    {
        $this->personalDAO = new PersonalDAO();
    }

    // Servicio para agregar un niño
    public function addPersonal($nombre, $apellido, $telefono, $cargo, $estado)
    {
        return $this->personalDAO->addPersonal($nombre, $apellido, $telefono, $cargo,  $estado);
    }

    // Servicio para obtener un niño por su ID
    public function getPeById($id)
    {
        return $this->personalDAO->getPeById($id);
    }

   
    public function updatePersonal($id, $nombre, $apellido, $telefono, $cargo, $estado)
    {
        return $this->personalDAO->updatePersonal($id, $nombre, $apellido, $telefono, $cargo, $estado);
    }

    // Servicio para obtener todos los niños
    public function getAllPersonal()
    {
        return $this->personalDAO->getAllPersonal();
    }

    // Servicio para eliminar un niño
    public function deletePersonal($id)
    {
        return $this->personalDAO->deletePersonal($id);
    }
}
?>
