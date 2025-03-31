<?php

    class Autorizado{
    private $idEn;
    private $idNi;
    private $descripcion;
    private $medicamento;
    private $estado;

    // Constructor
    public function __construct($idNi, $descripcion, $medicamento, $estado, $idEn = null)
    {
        $this->idEn = $idEn;
        $this->idNi = $idNi;
        $this->descripcion = $descripcion;
        $this->medicamento = $medicamento;
        $this->estado = $estado;
    }

    // Métodos Getters
    public function getIdEn()
    {
        return $this->idEn;
    }

    public function getIdNi()
    {
        return $this->idNi;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getMedicamento()
    {
        return $this->getMedicamento;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    // Métodos Setters
    public function setIdEn($idEn)
    {
        $this->idEn = $idEn;
    }

    public function setIdNi($idNi)
    {
        $this->idNi = $idNi;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setMedicamento($medicamento)
    {
        $this->medicamento = $medicamento;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

}
?>
