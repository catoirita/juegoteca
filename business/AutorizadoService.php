<?php
// /services/niñoService.php
require_once __DIR__ . '/../data/AutorizadoDAO.php';

class AutorizadoService
{
    private $autorizadoDAO;

    public function __construct()
    {
        $this->autorizadoDAO = new AutorizadoDAO();
    }

    // Servicio para agregar un niño
    public function addAu($idNi, $nombreAu, $celularAu,$parentesco, $estado)
    {
        return $this->autorizadoDAO->addAutorizado($idNi, $nombreAu, $celularAu,$parentesco, $estado);
    }

    // Servicio para obtener un niño por su ID
    public function getAuById($idAu)
    {
        return $this->autorizadoDAO->getAuById($idAu);
    }

   
    public function updateAu($idAu, $idNi, $nombreAu, $celularAu, $parentesco,$estado)
    {
        return $this->autorizadoDAO->updateAu($idAu, $idNi, $nombreAu, $celularAu,$parentesco, $estado);
    }

    // Servicio para obtener todos los niños
    public function getAllAu()
    {
        return $this->autorizadoDAO->getAllAu();
    }

    // Servicio para eliminar un niño
    public function deleteAu($idAu)
    {
        return $this->autorizadoDAO->deleteAu($idAu);
    }
}
?>
