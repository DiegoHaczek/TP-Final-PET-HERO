<?php 

    namespace Models;

    class Chat {

        private $idReserva;
        private $mensaje;
        private $emisor;
        

        public function getIdReserva()
        {
                return $this->idReserva;
        }

        public function setIdReserva($idReserva): self
        {
                $this->idReserva = $idReserva;

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

        public function getEmisor()
        {
                return $this->emisor;
        }

        public function setEmisor($emisor): self
        {
                $this->emisor = $emisor;

                return $this;
        }
    }


?>