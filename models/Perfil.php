<?php 
    namespace Models;

    abstract class Perfil{

        private $nombre;
        private $apellido;
        private $edad;
        private $fotoPerfil;
        
       
        public function getNombre()
        {
                return $this->nombre;
        }


        public function setNombre($nombre): self
        {
                $this->nombre = $nombre;

                return $this;
        }

       
        public function getApellido()
        {
                return $this->apellido;
        }

      
        public function setApellido($apellido): self
        {
                $this->apellido = $apellido;

                return $this;
        }

       
        public function getEdad()
        {
                return $this->edad;
        }

       
        public function setEdad($edad): self
        {
                $this->edad = $edad;

                return $this;
        }

        
        public function getFotoPerfil()
        {
                return $this->fotoPerfil;
        }

        
        public function setFotoPerfil($fotoPerfil): self
        {
                $this->fotoPerfil = $fotoPerfil;

                return $this;
        }
    }

?>