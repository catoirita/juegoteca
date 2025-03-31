<?php

    class Autorizado{
    private $idAu;
    private $idNi;
    private $nombreAu;
    private $celularAu;
    private $parentesco;
    private $estado;

    // Constructor
    public function __construct($idNi, $nombreAu, $celularAu,$parentesco, $estado, $idAu = null)
    {
        $this->idAu = $idAu;
        $this->idNi = $idNi;
        $this->nombreAu = $nombreAu;
        $this->celularAu = $celularAu;
        $this->parentesco = $parentesco;
        $this->estado = $estado;
    }

    // Métodos Getters
    public function getIdAu()
    {
        return $this->idAu;
    }

    public function getIdNi()
    {
        return $this->idNi;
    }

    public function getNombreAu()
    {
        return $this->nombreAu;
    }

    public function getCelularAu()
    {
        return $this->celularAu;
    }

    public function getParentesco()
    {
        return $this->parentesco;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    // Métodos Setters
    public function setIdAu($idAu)
    {
        $this->idAu = $idAu;
    }

    public function setIdNi($idNi)
    {
        $this->idNi = $idNi;
    }

    public function setNombreAu($nombreAu)
    {
        $this->nombreAu = $nombreAu;
    }

    public function setCelularAu($celularAu)
    {
        $this->celularAu = $celularAu;
    }

    public function setParentesco($parentesco)
    {
        $this->parentesco = $parentesco;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

}
?>
