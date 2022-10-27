<?php
    namespace Controllers;

    use DAO\DuenoDAO as DuenoDAO;
    use Models\Dueno as Dueno;
    use Models\Guardian as Guardian;
    use Controllers\GuardianController as GuardianController;
    use Controllers\HomeController as HomeController;

    class DuenoController
    {
        private $DuenoDAO;

        public function __construct()
        {
            $this->DuenoDAO = new DuenoDAO();
        }

        public function Add($password,$passwordconfirm, $mail)
        {
            //require_once(VIEWS_PATH."validate-session.php");

            if ($password==$passwordconfirm){  //Valida que las contraseñas sean iguales
                
                    if(!$this->mailExiste($mail)){ //Valida que el email no exista

                    $Dueno = new Dueno();
                    $Dueno->setPassWord($password);
                    $Dueno->setMail($mail);

                    $this->DuenoDAO->Add($Dueno);

                  //  $_SESSION["loggedUser"] = $Dueno->getNombre();
                    $_SESSION["type"] = $Dueno->getType();
                    $_SESSION["id"] = $this->DuenoDAO->GetIdByMail($mail);

                    require_once(VIEWS_PATH."editarperfildueno.php");
                    }
                    else{
                        $alert=['tipo'=>"error",'mensaje'=>"El Email ya está en uso"];
                        require_once(VIEWS_PATH."registrodueno.php");}
            }
            else{
                $alert=['tipo'=>"error",'mensaje'=>"Las contraseñas no coinciden"];
                require_once(VIEWS_PATH."registrodueno.php"); }

            //$this->ShowAddView();
        }

        public function mailExiste($mail)
        {

            $controller = new GuardianController();
            
            if(!$controller->mailGuardianExiste($mail)){ ///verifico que mail no eixste en el otro DAO tampoco

            $DuenoList= $this->DuenoDAO->getAll();
            foreach ($DuenoList as $Dueno) {
                if ($mail == $Dueno->getMail()) {
                    return true;
                }
                }
                return false;
            }else{

                return true;
            }

        }

        public function mailDuenoExiste($mail){//funcion llamada por el controller de guardian

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

            $_SESSION["loggedUser"] = $nombre;

            $alert=['tipo'=>"exito",'mensaje'=>"Perfil Creado con Éxito"];
            $controllerHome = new HomeController();
            $controllerHome->index($alert);

        }

        public function Remove($id)
        {
            //require_once(VIEWS_PATH."validate-session.php");
            
            $this->DuenoDAO->Remove($id);

            //$this->ShowListView();
        }
    }
?>