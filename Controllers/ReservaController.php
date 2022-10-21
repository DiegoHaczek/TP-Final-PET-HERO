<?php
    namespace Controllers;

    use Models\Guardian as Guardian;
    use Models\Reserva as Reserva;
    use Controllers\GuardianController as GuardianController;
    use Controllers\HomeController as HomeController;

    class ReservaController
    {
        
        public function Add($fechaInicio, $fechaFinal, $mascota, $idGuardian, $idDueno)
        {

            $controllerGuardian = new GuardianController();
            date_default_timezone_set('America/Argentina/Buenos_Aires'); //seteo la zona horaria

            $inicio = \date_create_from_format("d-m",$fechaInicio);
            $fin = \date_create_from_format("d-m",$fechaFinal);

            //var_dump($inicio, $fin);

            if ($inicio<=$fin) { 

                if($this->comprobarDisponibilidad($inicio,$fin,$idGuardian)){

                $reserva = new Reserva();
                $reserva->setIdDueno($idDueno);
                $reserva->setIdGuardian($idGuardian);
                $reserva->setFechaInicio($fechaInicio);
                $reserva->setFechaFinal($fechaFinal);
                $reserva->setNombreMascota($mascota);

                echo "<script>alert('Reserva creada con éxito')</script>";
                
                $controllerHome = new HomeController();
                $controllerHome->Index();} else {


                echo "<script>alert('El Guardián no se encuentra disponible en las fechas indicadas')</script>";
                $controllerGuardian->ShowProfile($idGuardian);

                }
            } else {
                
                echo "<script>alert('La fecha final debe ser posterior a la fecha inicial')</script>";
                $controllerGuardian->ShowProfile($idGuardian);
            }
        }

        public function comprobarDisponibilidad($fechaInicio,$fechaFinal,$idGuardian){

                $controllerGuardian = new GuardianController();
                $disponibilidad = $controllerGuardian->disponibilidadById($idGuardian);
                $arregloDisponibilidad = explode(",",$disponibilidad);

                $unDia = new \DateInterval ("P1D");

                //var_dump($arregloDisponibilidad);

                for($fecha=$fechaInicio;$fecha<=$fechaFinal;$fecha->add($unDia)){

                    $fechaFormateada= date_format($fecha,"d-m");

                    if(!\in_array($fechaFormateada,$arregloDisponibilidad)){

                        return false;
                    }
                }
                return true;
        }
    }

    
?>