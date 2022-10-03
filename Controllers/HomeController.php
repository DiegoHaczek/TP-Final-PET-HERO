<?php
    namespace Controllers;

    class HomeController
    {
        /*private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }*/

        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
        }

        public function registroGuardian(){
            require_once(VIEWS_PATH."registroguardian.php");
        }

        public function registroDueno(){
            require_once(VIEWS_PATH."registrodueno.php");

        }

        public function registroMascota(){
            require_once(VIEWS_PATH."agregarmascota.php");
        }

        /*public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."add-cellphone.php");
        }

        public function Login($userName, $password)
        {
            $user = $this->userDAO->GetByUserName($userName);

            if(($user != null) && ($user->getPassword() === $password))
            {
                $_SESSION["loggedUser"] = $user;
                $this->ShowAddView();
            }
            else
                $this->Index("Usuario y/o Contraseña incorrectos");
        }
        
        public function Logout()
        {
            session_destroy();

            $this->Index();
        }*/
    }
?>