<?php
    abstract class Usuario{
        private $userName;
        private $contra;
        private $mail;


        public function __construct ( $userName, $mail, $contra){
            $this -> userName = $userName;
            $this -> mail = $mail;
            $this -> contra = $contra;
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
        public function getContra (){
            return $this -> contra;
        }

        public function setContra ($userName){
            $this -> contra = $contra;
        }

        public function mostrarUsuario (){
            echo $this->userName . " |";
            echo $this->mail . " |";
            echo $this->contra . " |";
        }

    }

?>



