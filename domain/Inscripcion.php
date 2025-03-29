<?php

class Inscripcion {
    private $id;
    private $id_niño;
    private $fecha_inscripcion;
    private $monto_pago;
    private $estado_pago;

    // Constructor
    public function __construct($id_niño, $fecha_inscripcion, $monto_pago, $estado_pago, $id = null) {
        $this->id = $id;
        $this->id_nino = $id_niño;
        $this->fecha_inscripcion = $fecha_inscripcion;
        $this->monto_pago = $monto_pago;
        $this->estado_pago = $estado_pago;
    }

    // Métodos Getters
    public function getId() {
        return $this->id;
    }

    public function getIdNiño() {
        return $this->id_nino;
    }

    public function getFechaInscripcion() {
        return $this->fecha_inscripcion;
    }

    public function getMontoPago() {
        return $this->monto_pago;
    }

    public function getEstadoPago() {
        return $this->estado_pago;
    }

    // Métodos Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdNiño($id_niño) {
        $this->id_nino = $id_nino;
    }

    public function setFechaInscripcion($fecha_inscripcion) {
        $this->fecha_inscripcion = $fecha_inscripcion;
    }

    public function setMontoPago($monto_pago) {
        $this->monto_pago = $monto_pago;
    }

    public function setEstadoPago($estado_pago) {
        $this->estado_pago = $estado_pago;
    }
}

?>