<?php
    namespace Controllers;

    use Models\Guardian as Guardian;
    use Models\Reserva as Reserva;
    use Controllers\GuardianController as GuardianController;
    use Controllers\HomeController as HomeController;
    use Controllers\CuponController as CuponController;
    use DAO\ReservaDAO as ReservaDAO;

    class ReservaController
    {
        private $ReservaDAO;

        public function __construct()
        {
            $this->ReservaDAO = new ReservaDAO();
        }

        public function Add($fechaInicio, $fechaFinal, $mascota, $idGuardian, $idDueno, $idMascota)
        {

            $controllerGuardian = new GuardianController();
            $controllerHome = new HomeController();

            date_default_timezone_set('America/Argentina/Buenos_Aires'); //seteo la zona horaria

            $inicio = \date_create_from_format("Y-m-d",$fechaInicio);
            $fin = \date_create_from_format("Y-m-d",$fechaFinal);

            //var_dump($mascota);
            //var_dump($inicio, $fin);

            if ($inicio<=$fin) { 
                if($this->comprobarDisponibilidad($inicio,$fin,$idGuardian)){
                    if ($this->comprobarRaza($mascota)) {
                        if($this->comprobarRazaPorFecha($fechaInicio, $fechaFinal, $mascota)){
                            $reserva = new Reserva();
                            $reserva->setIdDueno($idDueno);
                            $reserva->setIdGuardian($idGuardian);
                            $reserva->setFechaInicio($fechaInicio);
                            $reserva->setFechaFinal($fechaFinal);
                            $reserva->setIdMascota($idMascota);

                            $this->ReservaDAO->Add($reserva);

                            $alert=['tipo'=>"exito",'mensaje'=>"Reserva Creada con Éxito"];
                            
                            $controllerHome->Index($alert);
                        } else {
                            $alert=['tipo'=>"error",'mensaje'=>"El Guardián tiene una Reserva con otra Raza en la Fecha Indicada."];
                            $controllerGuardian->ShowProfile($idGuardian,$alert);
                        }
                    } else {
                        $alert=['tipo'=>"error",'mensaje'=>"Las Mascotas indicadas son de distintas razas"];
                        $controllerGuardian->ShowProfile($idGuardian,$alert);
                    }
                } else {


                //echo "<script>alert('El Guardián no se encuentra disponible en las fechas indicadas')</script>";

                $alert=['tipo'=>"error",'mensaje'=>"El Guardián no se encuentra disponible en las fechas indicadas"];
                $controllerGuardian->ShowProfile($idGuardian,$alert);

                }
            } else {

                $alert=['tipo'=>"error",'mensaje'=>"La Fecha Final debe ser posterior a la Fecha Inicial"];
                $controllerGuardian->ShowProfile($idGuardian,$alert);
            }
        }

        public function comprobarDisponibilidad($fechaInicio,$fechaFinal,$idGuardian){
            
            $controllerGuardian = new GuardianController();
            $disponibilidad = $controllerGuardian->disponibilidadById($idGuardian);

                if ($disponibilidad=='Plena'){return true;}else{

                    if ($disponibilidad=='Fines De Semana'){

                        $dateDiff = $fechaInicio->diff($fechaFinal);

                        if($dateDiff->d>1){
                            return false;

                        }else{
                            return true;
                        }

                    }else{

                        $arregloDisponibilidad = explode(",",$disponibilidad);

                        $unDia = new \DateInterval ("P1D");

                        //var_dump($arregloDisponibilidad);

                        for($fecha=$fechaInicio;$fecha<=$fechaFinal;$fecha->add($unDia)){

                            $fechaFormateada= date_format($fecha,"Y-m-d");

                            if(!\in_array($fechaFormateada,$arregloDisponibilidad)){

                                return false;
                            }
                        }
                        return true;}}
        }

        public function comprobarRaza($mascota){

            $raza = array();
            
            foreach ($mascota as $value) {
                $item = explode(",", $value);
                array_push($raza, $item[1]);
            }

            $primeraRaza = $raza[0];

            foreach($raza as $item){
                if($primeraRaza != $item){
                    return false;
                }
            }

            return true;

        }

        public function comprobarRazaPorFecha($fechaInicio, $fechaFinal, $mascota){
            
            $arregloRazas = $this->ReservaDAO->getListaRazas($fechaInicio, $fechaFinal);

            if($arregloRazas){
            $raza = array();
            
            $raza = explode(",", $mascota[0]);

            //var_dump($arregloRazas);

            if(strtolower($arregloRazas[0]["raza"]) != strtolower($raza[1])){
                return false;
            }
            }

            return true;

        }

        public function updateEstado($idReserva,$estado){

            if ($estado == "Aceptada") {
                $CuponController = new CuponController();
                $CuponController->Add($idReserva);
                //Agregar para enviar mail
            }

            $this->ReservaDAO->updateEstado($idReserva,$estado);


            $alert=['tipo'=>"exito",'mensaje'=>"Estado Reserva Actualizado"];

            $controllerHome = new HomeController();
            $controllerHome->index($alert);

        }        
    }

    
?>