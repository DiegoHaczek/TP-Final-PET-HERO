<?php
    class Usuario{
        private $userName
        private $mail

        public function __construct ( $userName, $mail){
            $this -> userName = $userName;
            $this -> mail = $mail;
        }

        public function getUserName (){
            return $this -> userName;
        }

        public function setUserName ($userName){
            $this -> userName = $userName;
        }

        public mostrarUsuario (){
            echo $this->userName;
            echo $this->mail;
        }

    }

    $usuario = new Usuario ("tomas","paratn");

    $usuario->mostrarUsuario ();








?>



