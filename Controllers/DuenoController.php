<?php
    namespace Controllers;

    use DAO\DuenoDAO as DuenoDAO;
    use DAO\ReservaDAO as ReservaDAO;
    use Models\Dueno as Dueno;
    use Models\Guardian as Guardian;
    use Models\Reserva as Reserva;
    use Controllers\GuardianController as GuardianController;
    use Controllers\HomeController as HomeController;
    

    class DuenoController
    {
        private $DuenoDAO;

        public function __construct()
        {
            try {
                $this->DuenoDAO = new DuenoDAO();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function Add($password,$passwordconfirm, $mail)
        {
            try {
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
                    require_once(VIEWS_PATH."registrodueno.php"); 
                }
                //$this->ShowAddView();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function mailExiste($mail)
        {

            try {
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
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            

        }

        public function mailDuenoExiste($mail){//funcion llamada por el controller de guardian

            try {
                $DuenoList= $this->DuenoDAO->getAll();

                foreach ($DuenoList as $Dueno) {
                    if ($mail == $Dueno->getMail()) {
                        return true;
                    }
                }
                return false;
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function EditProfile(){
           
            try {
                $usuario = New Dueno();
                $usuario = $this->DuenoDAO->GetById($_SESSION["id"]);
                $editar=true;
                require_once(VIEWS_PATH."editarperfildueno.php");
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            

        }

        public function SetProfile($nombre,$apellido,$edad,$fotoperfil,$tmp_name)
        {
            try {
                $PerfilDueno = new Dueno();
                $PerfilDueno->setNombre($nombre);
                $PerfilDueno->setApellido($apellido);
                $PerfilDueno->setEdad($edad);
                $PerfilDueno->setFotoPerfil($fotoperfil);
                
                $this->DuenoDAO->SetProfile($PerfilDueno,$tmp_name);

                $_SESSION["loggedUser"] = $nombre;


                $alert=['tipo'=>"exito",'mensaje'=>"Perfil Creado con Éxito"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            

        }

        public function listReservas(){
            try {
                $id=$_SESSION['id'];
                $reservaDao = new ReservaDAO;
                $reservas = $reservaDao->getDatosReservaDueno($id);
                require_once(VIEWS_PATH.'listareservasdueno.php');
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function Remove($id)
        {
            try {
                //require_once(VIEWS_PATH."validate-session.php");
            
                $this->DuenoDAO->Remove($id);

                //$this->ShowListView();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }
    }
?>