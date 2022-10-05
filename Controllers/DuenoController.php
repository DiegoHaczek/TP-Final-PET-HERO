<?php
    namespace Controllers;

    use DAO\DuenoDAO as DuenoDAO;
    use Models\Dueno as Dueno;

    class DuenoController
    {
        private $DuenoDAO;

        public function __construct()
        {
            $this->DuenoDAO = new DuenoDAO();
        }

        /*public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."add-Dueno.php");
        }

        public function ShowListView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            $DuenoList = $this->DuenoDAO->getAll();
            
            require_once(VIEWS_PATH."Dueno-list.php");
        }*/

        public function Add($username, $password, $mail)
        {
            //require_once(VIEWS_PATH."validate-session.php");


            // 1.  <!------------------Validar Contraseñas----------------> 

            // 2.  <!------------------Verificar que no existe UserName----------------> 

            // 3. <!------------------Verificar que no exista Email----------------->

            $Dueno = new Dueno();
            $Dueno->setUserName($username);
            $Dueno->setPassWord($password);
            $Dueno->setMail($mail);

            $this->DuenoDAO->Add($Dueno);

            require_once(VIEWS_PATH."editarperfildueno.php");

            //$this->ShowAddView();
        }

        public function EditProfile($nombre,$apellido,$edad,$fotoperfil)
        {

            $PerfilDueno = new Dueno();
            $PerfilDueno->setNombre($nombre);
            $PerfilDueno->setApellido($apellido);
            $PerfilDueno->setEdad($edad);
            $PerfilDueno->setFotoPerfil($fotoperfil);
            
            $this->DuenoDAO->EditProfile($PerfilDueno);

            require_once(VIEWS_PATH."maindueno.php");

        }

        public function Remove($id)
        {
            //require_once(VIEWS_PATH."validate-session.php");
            
            $this->DuenoDAO->Remove($id);

            //$this->ShowListView();
        }
    }
?>