<?php
    namespace Controllers;

    use DAO\MascotaDAO as MascotaDAO;
    use Models\Mascota as Mascota;

    class MascotaController
    {
        private $MascotaDAO;

        public function __construct()
        {
            $this->MascotaDAO = new MascotaDAO();
        }

        /*public function ShowAddView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            require_once(VIEWS_PATH."add-Mascota.php");
        }


        */


        public function ShowListView()
        {
            require_once(VIEWS_PATH."validate-session.php");
            $MascotaList = $this->MascotaDAO->getAll();
            require_once(VIEWS_PATH."listamascotas.php");
        }

        public function Add($nombre, $edad, $tamano, $especie, $razaPerroChico , $razaPerroMediano, $razaPerroGrande , $razaGato , $indicaciones, $fotoperfil)
        {
            //require_once(VIEWS_PATH."validate-session.php");

            $Mascota = new Mascota();
            $Mascota->setNombre($nombre);
            $Mascota->setEdad($edad);
            $Mascota->setFotoPerfil($fotoperfil);
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



            $this->MascotaDAO->Add($Mascota);

            echo "<script>alert('Mascota agregada con éxito')</script>";

            header('location:../index.php');

            //$this->ShowAddView();
        }

        public function EditProfile($nombre,$edad,$tipo, $indicaciones,$fotoperfil)
        {

            $PerfilMascota = new Mascota();
            $PerfilMascota->setNombre($nombre);
            //$PerfilMascota->setApellido($apellido);
            $PerfilMascota->setEdad($edad);
            $PerfilMascota->setFotoPerfil($fotoperfil);
            $Mascota->setTamano($tipo);
            $Mascota->setIndicaciones($indicaciones);
            
            $this->MascotaDAO->EditProfile($PerfilMascota);

            require_once(VIEWS_PATH."listamascotas.php");

        }


        public function Remove($id)
        {
            //require_once(VIEWS_PATH."validate-session.php");
            
            $this->MascotaDAO->Remove($id);

            //$this->ShowListView();
        }
    }
?>