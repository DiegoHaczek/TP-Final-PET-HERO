<?php 

    namespace Models;

    class Cupon {

        private $id;
        private $reserva; 
        private $monto;
        private $estado;

        
        public function getReserva()
        {
                return $this->reserva;
        }

        public function setReserva($reserva): self
        {
                $this->reserva = $reserva;

                return $this;
        }

        public function getMonto()
        {
                return $this->monto;
        }

        public function setMonto($monto): self
        {
                $this->monto = $monto;

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