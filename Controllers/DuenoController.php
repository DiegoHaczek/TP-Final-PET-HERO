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
            /*
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
        }*/


        public function Add($username, $password,$passwordconfirm, $mail)
        {
            //require_once(VIEWS_PATH."validate-session.php");

            if ($password==$passwordconfirm){  //Valida que las contraseñas sean iguales
                
                if(!$this->userExiste($username)){ //Valida que el nombre de usuario no exista

                    if(!$this->mailExiste($mail)){ //Valida que el email no exista

                    $Dueno = new Dueno();
                    $Dueno->setUserName($username);
                    $Dueno->setPassWord($password);
                    $Dueno->setMail($mail);

                    $this->DuenoDAO->Add($Dueno);

                    $_SESSION["loggedUser"] = $Dueno->getUserName();
                    $_SESSION["type"] = $Dueno->getType();

                    require_once(VIEWS_PATH."editarperfildueno.php");
                    }
                    else{
                        echo "<script>alert('El email ya existe')</script>";
                        require_once(VIEWS_PATH."registrodueno.php");}
                }
                else{
                    echo "<script>alert('El nombre de usuario ya existe')</script>";
                    require_once(VIEWS_PATH."registrodueno.php");}
            }
            else{
                echo "<script>alert('Las contraseñas no coinciden')</script>";
                require_once(VIEWS_PATH."registrodueno.php"); }

            //$this->ShowAddView();
        }

        public function userExiste($username)
        {
            $DuenoList= $this->DuenoDAO->getAll();
            foreach ($DuenoList as $Dueno) {
                if ($username == $Dueno->getUserName()) {
                    return true;
                }
            }
            return false;
        }

        public function mailExiste($mail)
        {
            $DuenoList= $this->DuenoDAO->getAll();
            foreach ($DuenoList as $Dueno) {
                if ($mail == $Dueno->getMail()) {
                    return true;
                }
            }
            return false;
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