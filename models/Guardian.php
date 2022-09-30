<?php
    namespace Models;

    class Guardian extends Usuario {

        private $remumeracion;
        private $tipoPerro;
        private $disponibilidad;
        private $comentarios;

        public function getRemumeracion()
        {
                return $this->remumeracion;
        }

     
        public function setRemumeracion($remumeracion): self
        {
                $this->remumeracion = $remumeracion;

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


    $elprimerguardian = new Guardian('jose','perez',34,NULL,'josesitox100','joseperez@outlook.es','contrasegura123',600,'Mediano,Chico','Plena',NULL);


    var_dump($elprimerguardian);


?>