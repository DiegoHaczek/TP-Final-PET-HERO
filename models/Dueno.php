<?php
    namespace Models;

    class Dueno extends Usuario{
        
        private $mascotas;
        private $historial;

        public function getMascotas()
        {
                return $this->mascotas;
        }

        public function setMascotas($mascotas): self
        {
                $this->mascotas = $mascotas;

                return $this;
        }

        public function getHistorial()
        {
                return $this->historial;
        }

        public function setHistorial($historial): self
        {
                $this->historial = $historial;

                return $this;
        }
    }


?>