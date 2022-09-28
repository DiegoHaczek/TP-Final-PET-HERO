<?php 



class Reserva {

    private $nombreUsuarioGuardian;
    private $nombreUsuarioDueño;
    private $nombreMascota;
    private $fechaInicio;
    private $duracion;

    public function __construct($nombreUsuarioGuardian,$nombreUsuarioDueño,$nombreMascota,$fechaInicio,$duracion){

        $this->nombreUsuarioGuardian = $nombreUsuarioGuardian;
        $this->nombreUsuarioDueño = $nombreUsuarioDueño;
        $this->nombreMascota = $nombreMascota;
        $this->fechaInicio = $fechaInicio;
        $this->duracion = $duracion;

    }

    public function getNombreUsuarioGuardian()
    {
        return $this->nombreUsuarioGuardian;
    }

    public function setNombreUsuarioGuardian($nombreUsuarioGuardian): self
    {
        $this->nombreUsuarioGuardian = $nombreUsuarioGuardian;

        return $this;
    }

    public function getNombreUsuarioDue()
    {
        return $this->nombreUsuarioDue;
    }

    public function setNombreUsuarioDue($nombreUsuarioDue): self
    {
        $this->nombreUsuarioDue = $nombreUsuarioDue;

        return $this;
    }

    public function getNombreMascota()
    {
        return $this->nombreMascota;
    }

    public function setNombreMascota($nombreMascota): self
    {
        $this->nombreMascota = $nombreMascota;

        return $this;
    }

    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio): self
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function getDuracion()
    {
        return $this->duracion;
    }

    public function setDuracion($duracion): self
    {
        $this->duracion = $duracion;

        return $this;
    }
}




?>