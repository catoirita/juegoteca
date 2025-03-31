<?php

    class Personal{
    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $cargo;
    private $estado;

    // Constructor
    public function __construct($nombre, $apellido, $telefono, $cargo, $estado, $id = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->cargo = $cargo;
        $this->estado = $estado;
    }

    // Métodos Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellido()
    {
        return $this->apellido;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }
    public function getCargo()
    {
        return $this->cargo;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    // Métodos Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

}
?>
