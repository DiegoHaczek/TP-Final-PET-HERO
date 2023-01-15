<?php
    namespace Controllers;


    use Models\Guardian as Guardian;
    use DAO\GuardianDAO as GuardianDAO;
    use Models\Dueno as Dueno;
    use Controllers\DuenoController as DuenoController;
    use Controllers\ComentarioController as ComentarioController;
    use Models\Mascota as Mascota;
    use DAO\MascotaDAO as MascotaDAO;
    use DAO\ComentarioDAO as ComentarioDAO;
    use Controllers\HomeController as HomeController;

    class GuardianController
    {
        private $GuardianDAO;

        public function __construct()
        {
            try {
                $this->GuardianDAO = new GuardianDAO();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function ShowListView()
        {
            try {
                $GuardianList = $this->GuardianDAO->getAll();

                require_once(VIEWS_PATH."listaguardianes.php");
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function ShowProfile($id,$alert = ""){

            try {
                if  ($this->GuardianDAO->GetById($id)){

                    $usuario = $this->GuardianDAO->GetById($id);
        
                    $mascotaDao = new MascotaDAO();
                    $comentarioDao = new ComentarioDAO();
                    $comentarioController = new ComentarioController();
                    $comprobacionComentario = $comentarioController->ComprobacionComentario($id,$_SESSION['id']);
                    $comentarios = $comentarioDao->GetByIdGuardian($id);

                    // cambiar implementacion
                    $mascotas = $mascotaDao->GetAll();
        
                    require_once(VIEWS_PATH."perfilguardian.php");
 
                }
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

                        $Guardian = new Guardian();
                        $Guardian->setPassWord($password);
                        $Guardian->setMail($mail);

                        $this->GuardianDAO->Add($Guardian);

                        $_SESSION["type"] = $Guardian->getType();
                        $_SESSION["id"] = $this->GuardianDAO->GetIdByMail($mail);

                        require_once(VIEWS_PATH."editarperfilguardian.php");
                        }
                        else{
                            $alert=['tipo'=>"error",'mensaje'=>"El Email ya está en uso"];
                            require_once(VIEWS_PATH."registroguardian.php");}
                }
                else{
                    $alert=['tipo'=>"error",'mensaje'=>"Las contraseñas no coinciden"];
                    require_once(VIEWS_PATH."registroguardian.php"); 
                }
                //$this->ShowAddView();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function disponibilidadById ($id){
            try {
                // cambiar implementacion
                $GuardianList=$this->GuardianDAO->getAll();
                foreach($GuardianList as $Guardian){

                    if($Guardian->getId() == $id){
                        return $Guardian->getDisponibilidad();
                    }
                }
                return null; 
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }
        
        public function mailExiste($mail)
        {
            try {
                $controller = new DuenoController();
            
                if(!$controller->mailDuenoExiste($mail)){ ///verifico que mail no eixste en el otro DAO tampoco
                
                    // cambiar implementacion
                    $GuardianList= $this->GuardianDAO->getAll();
                    foreach ($GuardianList as $Guardian) {
                        if ($mail == $Guardian->getMail()) {
                            return true;
                        }
                    }
                    return false;
                } else {
                    return true;
                }
            }catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }
            

        public function mailGuardianExiste($mail){//funcion llamada por el controller de dueno

            try {

                //cambiar implementacion
                $GuardianList= $this->GuardianDAO->getAll();
                foreach ($GuardianList as $Guardian) {
                    if ($mail == $Guardian->getMail()) {
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
                $usuario = New Guardian();
                $usuario = $this->GuardianDAO->GetById($_SESSION["id"]);
                $editar=true;
                require_once(VIEWS_PATH."editarperfilguardian.php");
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }

        public function SetProfile($nombre,$apellido,$edad,$fotoperfil,$tmp_name,$remuneracion,$disponibilidad,$tamano=['Grande','Mediano','Chico'])
        {
            try {
                $PerfilGuardian = new Guardian();
                $PerfilGuardian->setNombre($nombre);
                $PerfilGuardian->setApellido($apellido);
                $PerfilGuardian->setEdad($edad);
                $PerfilGuardian->setFotoPerfil($fotoperfil);
                $PerfilGuardian->setRemuneracion($remuneracion);
                $PerfilGuardian->setTamano($tamano);
                $PerfilGuardian->setDisponibilidad($disponibilidad);
                
                $this->GuardianDAO->SetProfile($PerfilGuardian,$tmp_name);

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
       
        public function Remove($id)
        {
            try {
                $this->GuardianDAO->Remove($id);
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }
        
    }
?>