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


            // 1.  <!------------------Validar Contraseñas----------------> 

            // 2.  <!------------------Verificar que no existe UserName----------------> 

            // 3. <!------------------Verificar que no exista Email----------------->

            $Guardian = new Guardian();
            $Guardian->setUserName($username);
            $Guardian->setPassWord($password);
            $Guardian->setMail($mail);

            $this->GuardianDAO->Add($Guardian);

            require_once(VIEWS_PATH."editarperfil.php");

            //$this->ShowAddView();
        }

        public function EditProfile($nombre,$apellido,$edad,$fotoperfil,$remuneracion,$tipoperro,$disponibilidad)
        {

            $PerfilGuardian = new Guardian();
            $PerfilGuardian->setNombre($nombre);
            $PerfilGuardian->setApellido($apellido);
            $PerfilGuardian->setEdad($edad);
            $PerfilGuardian->setFotoPerfil($fotoperfil);
            $PerfilGuardian->setRemuneracion($remuneracion);
            $PerfilGuardian->setTipoPerro($tipoperro);
            $PerfilGuardian->setDisponibilidad($disponibilidad);
            
            $this->GuardianDAO->EditProfile($PerfilGuardian);

        }

        public function Remove($id)
        {
            //require_once(VIEWS_PATH."validate-session.php");
            
            $this->GuardianDAO->Remove($id);

            //$this->ShowListView();
        }
    }
?>