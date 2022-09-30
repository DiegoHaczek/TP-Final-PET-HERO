<?php
    namespace Controllers;

    use DAO\GuardianDAO as GuardianDAO;
    use Models\Guardian as Guardian;

    class GuardianController
    {
        private $GuardianDAO;

        public function __construct()
        {
            $this->GuardianDAO = new GuardianDAO();
        }

        /*public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."add-Guardian.php");
        }

        public function ShowListView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            $GuardianList = $this->GuardianDAO->getAll();
            
            require_once(VIEWS_PATH."Guardian-list.php");
        }*/

        public function Add($username, $password, $mail)
        {
            //require_once(VIEWS_PATH."validate-session.php");

            $Guardian = new Guardian();
            $Guardian->setUserName($username);
            $Guardian->setPassWord($password);
            $Guardian->setMail($mail);

            $this->GuardianDAO->Add($Guardian);

            //$this->ShowAddView();
        }

        public function Remove($id)
        {
            //require_once(VIEWS_PATH."validate-session.php");
            
            $this->GuardianDAO->Remove($id);

            //$this->ShowListView();
        }
    }
?>