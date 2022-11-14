<?php
    namespace Controllers;

    use DAO\MascotaDAO as MascotaDAO;
    use Models\Mascota as Mascota;
    use Controllers\HomeController as HomeController;

    class MascotaController
    {
        private $MascotaDAO;

        public function __construct()
        {
            try {
                $this->MascotaDAO = new MascotaDAO();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function ShowListView()
        {
            try {
                require_once(VIEWS_PATH."validate-session.php");
                $MascotaList = $this->MascotaDAO->getAll();
                require_once(VIEWS_PATH."listamascotas.php");
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function Add($nombre, $edad, $tamano, $especie, $razaPerroChico ,
         $razaPerroMediano, $razaPerroGrande , $razaGato , $indicaciones, $fotoperfil,$tmp_name,$fichamedica,$tmp_nameFichamedica)
        {
            try {
                $Mascota = new Mascota();
                $Mascota->setNombre($nombre);
                $Mascota->setEdad($edad);

                $Mascota->setFotoPerfil($fotoperfil);
                $Mascota->setFichaMedica($fichamedica);
                $Mascota->setTamano($tamano);
                $Mascota->setIndicaciones($indicaciones);
                $Mascota->setIdDueno($_SESSION["id"]);
                $Mascota->setEspecie($especie);
                
                if ($especie=="perro"){
                if ($razaPerroChico){
                    $Mascota->setRaza($razaPerroChico);}else
                    if($razaPerroMediano){
                        $Mascota->setRaza($razaPerroMediano);}else
                    if($razaPerroGrande){
                        $Mascota->setRaza($razaPerroGrande);}

                    }else{
                        $Mascota->setRaza($razaGato);
                    }



                $this->MascotaDAO->Add($Mascota,$tmp_name,$tmp_nameFichamedica);

                //echo "<script>alert('Mascota agregada con éxito')</script>";

                $alert=['tipo'=>"exito",'mensaje'=>"Mascota Agregada con Éxito"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
                //header('location:../index.php');

                //$this->ShowAddView();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
        }

        public function SetProfile($nombre,$edad,$tipo, $indicaciones,$fotoperfil)
        {
            try {
                $PerfilMascota = new Mascota();
                $PerfilMascota->setNombre($nombre);
                //$PerfilMascota->setApellido($apellido);
                $PerfilMascota->setEdad($edad);
                $PerfilMascota->setFotoPerfil($fotoperfil);
                $Mascota->setTamano($tipo);
                $Mascota->setIndicaciones($indicaciones);
                
                $this->MascotaDAO->SetProfile($PerfilMascota);

                require_once(VIEWS_PATH."listamascotas.php");
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }

        public function ShowProfile($id,$alert = ""){

            try {
                if  ($this->MascotaDAO->GetById($id)){   
                    $perfilMascota = $this->MascotaDAO->GetPetProfile($id);
                    require_once(VIEWS_PATH."perfilmascota.php");
                }
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
            
         }

        public function countMascotas ($idDueno){

            try {
                $MascotaList = $this->MascotaDAO->getAll();
                $cantidad=0;
                foreach($MascotaList as $mascota){
                    if($mascota->getIdDueno()==$idDueno){
                        $cantidad++;
                    }
                }
                return $cantidad;
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
           
        }


        public function Remove($id)
        {
            try {
                $this->MascotaDAO->Remove($id);

                $this->ShowListView();
            } catch (Exception $e) {
                $alert=['tipo'=>"error",'mensaje'=>"Error"];
                $controllerHome = new HomeController();
                $controllerHome->index($alert);
            }
        }
    }
?>