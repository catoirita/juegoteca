<?php

require_once __DIR__ . '/../data/inscripcionDAO.php';

class InscripcionService
{
    private $inscripcionDAO;

    public function __construct()
    {
        $this->inscripcionDAO = new InscripcionDAO();
    }

    public function addInscripcion($id_niño, $fecha_inscripcion, $monto_pago, $estado_pago)
    {
        return $this->inscripcionDAO->addInscripcion($id_niño, $fecha_inscripcion, $monto_pago, $estado_pago);
    }

    public function getInscripcionById($id)
    {
        return $this->inscripcionDAO->getInscripcionById($id);
    }

    public function updateInscripcion($id, $id_niño, $fecha_inscripcion, $monto_pago, $estado_pago)
    {
        return $this->inscripcionDAO->updateInscripcion($id, $id_niño, $fecha_inscripcion, $monto_pago, $estado_pago);
    }

    public function getAllInscripciones()
    {
        return $this->inscripcionDAO->getAllInscripciones();
    }

    public function deleteInscripcion($id)
    {
        return $this->inscripcionDAO->deleteInscripcion($id);
    }
}