<?php 
    namespace Models;

    class Mascotas extends Perfil {

        private $tipoPerro;
        private $indicaciones;

        
        public function getTipoPerro()
        {
                return $this->tipoPerro;
        }

        public function setTipoPerro($tipoPerro): self
        {
                $this->tipoPerro = $tipoPerro;

                return $this;
        }

        public function getIndicaciones()
        {
                return $this->indicaciones;
        }

        public function setIndicaciones($indicaciones): self
        {
                $this->indicaciones = $indicaciones;

                return $this;
        }
    } 

?>