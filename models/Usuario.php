<?php
        namespace Models;
        include_once 'Perfil.php';


     abstract class Usuario extends Perfil{
        
        
        private $userName;
        private $passWord;
        private $mail;


        public function __construct ($nombre,$apellido,$edad,$fotoPerfil,$userName, $mail, $passWord){
            
            parent::__construct($nombre,$apellido,$edad,$fotoPerfil);
            $this -> userName = $userName;
            $this -> mail = $mail;
            $this -> passWord = $passWord;
        }

        public function getUserName (){
            return $this -> userName;
        }

        public function setUserName ($userName){
            $this -> userName = $userName;
        }
        public function getMail (){
            return $this -> mail;
        }

        public function setMail ($userName){
            $this -> mail = $mail;
        }
        public function getPassWord (){
            return $this -> passWord;
        }

        public function setPassWord ($userName){
            $this -> passWord = $passWord;
        }

        public function mostrarUsuario (){
            echo $this->userName . " |";
            echo $this->mail . " |";
            echo $this->passWord . " |";
        }

    }


?>



