<?php
class Niño {
    private $id;
    private $nombre_completo;
    private $fecha_nacimiento;
    private $direccion;
    private $numero_contacto;
    private $persona_contacto_emergencia;
    private $telefono_emergencia;

    // Constructor
    public function __construct($nombre_completo, $fecha_nacimiento, $direccion, $numero_contacto, $persona_contacto_emergencia, $telefono_emergencia, $id = null)
    {
        $this->id = $id;
        $this->nombre_completo = $nombre_completo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->direccion = $direccion;
        $this->numero_contacto = $numero_contacto;
        $this->persona_contacto_emergencia = $persona_contacto_emergencia;
        $this->telefono_emergencia = $telefono_emergencia;
    }

    // Métodos Getters
    public function getId()
    {
        return $this->id;
    }

    public function getNombreCompleto()
    {
        return $this->nombre_completo;
    }

    public function getFechaNacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function getDireccion()
    {
        return $this->direccion;
    }

    public function getNumeroContacto()
    {
        return $this->numero_contacto;
    }

    public function getPersonaContactoEmergencia()
    {
        return $this->persona_contacto_emergencia;
    }

    public function getTelefonoEmergencia()
    {
        return $this->telefono_emergencia;
    }

    // Métodos Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombreCompleto($nombre_completo)
    {
        $this->nombre_completo = $nombre_completo;
    }

    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setNumeroContacto($numero_contacto)
    {
        $this->numero_contacto = $numero_contacto;
    }

    public function setPersonaContactoEmergencia($persona_contacto_emergencia)
    {
        $this->persona_contacto_emergencia = $persona_contacto_emergencia;
    }

    public function setTelefonoEmergencia($telefono_emergencia)
    {
        $this->telefono_emergencia = $telefono_emergencia;
    }
}
?>
