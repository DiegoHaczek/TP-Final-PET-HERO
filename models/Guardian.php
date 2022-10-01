<?php
    namespace Models;

    class Guardian extends Usuario {

        private $remuneracion;
        private $tipoPerro;
        private $disponibilidad;
        private $comentarios;

        public function getRemuneracion()
        {
                return $this->remuneracion;
        }

     
        public function setRemuneracion($remuneracion): self
        {
                $this->remuneracion = $remuneracion;

                return $this;
        }

       
        public function getTipoPerro()
        {
                return $this->tipoPerro;
        }

       
        public function setTipoPerro($tipoPerro): self
        {
                $this->tipoPerro = $tipoPerro;

                return $this;
        }

       
        public function getDisponibilidad()
        {
                return $this->disponibilidad;
        }

        
        public function setDisponibilidad($disponibilidad): self
        {
                $this->disponibilidad = $disponibilidad;

                return $this;
        }

        
        public function getComentarios()
        {
                return $this->comentarios;
        }

       
        public function setComentarios($comentarios): self
        {
                $this->comentarios = $comentarios;

                return $this;
        }
    }


?>