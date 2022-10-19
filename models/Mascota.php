<?php 
    namespace Models;

    class Mascota extends Perfil {

        private $id;
        private $idDueno;
        private $tamano;
        private $raza;
        private $especie;
        private $indicaciones;

        
        public function getTamano()
        {
                return $this->tamano;
        }

        public function setTamano($tamano): self
        {
                $this->tamano = $tamano;

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

        public function getRaza()
        {
                return $this->raza;
        }

        public function setRaza($raza): self
        {
                $this->raza = $raza;

                return $this;
        }

        public function getEspecie()
        {
                return $this->especie;
        }

        public function setEspecie($especie): self
        {
                $this->especie = $especie;

                return $this;
        }
    } 

?>