<?php 

    namespace Models;

    class Comentario {

        private $id;
        private $idReserva;
        private $puntaje;
        private $mensaje;
        private $fecha;

        public function getIdReserva()
        {
                return $this->idReserva;
        }

        public function setIdReserva($idReserva): self
        {
                $this->idReserva = $idReserva;

                return $this;
        }

        public function getPuntaje()
        {
                return $this->puntaje;
        }

        public function setPuntaje($puntaje): self
        {
                $this->puntaje = $puntaje;

                return $this;
        }

        public function getMensaje()
        {
                return $this->mensaje;
        }

        public function setMensaje($mensaje): self
        {
                $this->mensaje = $mensaje;

                return $this;
        }

        public function getFecha()
        {
                return $this->fecha;
        }

        public function setFecha($fecha): self
        {
                $this->fecha = $fecha;

                return $this;
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }
    }
?>