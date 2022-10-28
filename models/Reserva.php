<?php 

namespace Models;


class Reserva {

    private $idGuardian;
    private $idDueno;
    private $idMascota;
    private $fechaInicio;
    private $fechaFinal;
    private $estado;

    public function getIdGuardian()
    {
        return $this->idGuardian;
    }

    public function setIdGuardian($idGuardian): self
    {
        $this->idGuardian = $idGuardian;

        return $this;
    }

    public function getIdDueno()
    {
        return $this->idDueno;
    }

    public function setIdDueno($idDueno): self
    {
        $this->idDueno = $idDueno;

        return $this;
    }

    public function getIdMascota()
    {
        return $this->idMascota;
    }

    public function setIdMascota($idMascota): self
    {
        $this->idMascota = $idMascota;

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

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFechaFinal()
    {
        return $this->fechaFinal;
    }

    public function setFechaFinal($fechaFinal): self
    {
        $this->fechaFinal = $fechaFinal;

        return $this;
    }
}




?>