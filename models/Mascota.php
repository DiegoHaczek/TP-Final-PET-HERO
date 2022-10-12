<?php 
    namespace Models;

    class Mascota extends Perfil {

        private $id;
        private $idDueno;
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

        public function getId()
        {
                return $this->id;
        }

        public function setId($id): self
        {
                $this->id = $id;

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
    } 

?>