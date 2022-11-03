<?php
    namespace Controllers;


    use Models\Guardian as Guardian;
    use DAO\GuardianDAO as GuardianDAO;
    use Models\Dueno as Dueno;
    use Controllers\DuenoController as DuenoController;
    use Models\Mascota as Mascota;
    use DAO\MascotaDAO as MascotaDAO;
    use Controllers\HomeController as HomeController;

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
        */

        public function ShowListView()
        {
           // require_once(VIEWS_PATH."validate-session.php");
            $GuardianList = $this->GuardianDAO->getAll();

            require_once(VIEWS_PATH."listaguardianes.php");
        }

        public function ShowProfile($id,$alert = ""){

           if  ($this->GuardianDAO->GetById($id)){

            $usuario = $this->GuardianDAO->GetById($id);

            $mascotaDao = new MascotaDAO();
            $mascotas = $mascotaDao->GetAll();

            require_once(VIEWS_PATH."perfilguardian.php");

           }

        }

        public function Add($password,$passwordconfirm, $mail)
        {
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
                require_once(VIEWS_PATH."registroguardian.php"); }

            //$this->ShowAddView();
        }

        public function disponibilidadById ($id){

        $GuardianList=$this->GuardianDAO->getAll();
        foreach($GuardianList as $Guardian){

            if($Guardian->getId() == $id){
                return $Guardian->getDisponibilidad();
            }
        }
        return null;
        }
        
        public function mailExiste($mail)
        {
            $controller = new DuenoController();
            
            if(!$controller->mailDuenoExiste($mail)){ ///verifico que mail no eixste en el otro DAO tampoco
            
                $GuardianList= $this->GuardianDAO->getAll();
                foreach ($GuardianList as $Guardian) {
                    if ($mail == $Guardian->getMail()) {
                        return true;
                    }
            }
            return false;
        }else{
            return true;
        }
        }

        public function mailGuardianExiste($mail){//funcion llamada por el controller de dueno

            $GuardianList= $this->GuardianDAO->getAll();
                foreach ($GuardianList as $Guardian) {
                    if ($mail == $Guardian->getMail()) {
                        return true;
                    }
            }
            return false;
        }

        public function EditProfile(){
           
            $usuario = New Guardian();
            $usuario = $this->GuardianDAO->GetById($_SESSION["id"]);
            $editar=true;
            require_once(VIEWS_PATH."editarperfilguardian.php");

        }

        public function SetProfile($nombre,$apellido,$edad,$fotoperfil,$tmp_name,$remuneracion,$tamano,$disponibilidad)
        {

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

        }
       
        public function Remove($id)
        {
            //require_once(VIEWS_PATH."validate-session.php");
            
            $this->GuardianDAO->Remove($id);

            //$this->ShowListView();
        }

        
    }
?>