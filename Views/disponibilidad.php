<?php 
            
        date_default_timezone_set('America/Argentina/Buenos_Aires'); //seteo la zona horaria

        function cargarDias(){                                       //hago una funcion que cargue todos los dias disponibles del calendario
                $fechaInicio = new DateTime();
                $fechaFin = new DateTime();
                $unMes = new DateInterval ("P1M");
                $unDia = new DateInterval ("P1D");
                $fechaFin->add($unMes);
                $fechaFin->add($unDia);          //se me quedaba corto por un dia, averiguar xq
                $arregloFechas = array();
                
                for ($fecha = $fechaInicio;$fecha<=$fechaFin;$fecha->add($unDia)){

                $fechaFormateada= date_format($fecha,"d-m");
                array_push($arregloFechas,$fechaFormateada);
                //echo $fechaFormateada . "<br>";
                }

                return $arregloFechas;
            }

        if ($_POST){

            $fechasDisponibles = explode (",",$usuario->getDisponibilidad());   //Recibo el string de fechas y lo paso a arreglo
        
               $fechas=cargarDias();                               //cargo todas las fechas
                $fechasNoDisponibles = array_diff($fechas,$fechasDisponibles);// (todas las fechas) - (fechas seleccionadas) = (fechas no disponibles)
                
                                                                             //El datepicker es un objeto de JS, por lo que debo pasar el array de PHP a JS
            echo "<script> var fechasNoDisponiblesJS = [];</script>";        //Declaro el arreglo en JS antes del bucle
            
                foreach ($fechasNoDisponibles as $fecha){
                ?>
                <script> fechasNoDisponiblesJS.push('<?=$fecha?>')</script>   <!--Paso de PHP a JS-->
                <?php  }
                   // echo "<script>console.log(fechasNoDisponiblesJS)</script>";
            }
?>               
                
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script  src="../js/datepickereditado.js"></script>

<script>

$('.date').datepicker('setDatesDisabled',fechasNoDisponiblesJS);  //funcion de datepicker que setea fechas no disponibles
                                                                    //el dueño solo puede elegir de entre las fechas seleccionadas por el guardian
    </script>
