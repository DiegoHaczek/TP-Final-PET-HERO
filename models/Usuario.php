<?php
    namespace Models;


    abstract class Usuario extends Perfil{
        
        private $id;
        private $userName;
        private $passWord;
        private $mail;

        public function getId()
        {
                return $this->id;
        }

        public function setId($id): self
        {
                $this->id = $id;

                return $this;
        }

        public function getUserName()
        {
                return $this->userName;
        }

        public function setUserName($userName): self
        {
                $this->userName = $userName;

                return $this;
        }

        public function getPassWord()
        {
                return $this->passWord;
        }

        public function setPassWord($passWord): self
        {
                $this->passWord = $passWord;

                return $this;
        }

        public function getMail()
        {
                return $this->mail;
        }

        public function setMail($mail): self
        {
                $this->mail = $mail;

                return $this;
        }
    }


?>



