<?php require '../vistas/header.php'?>   <!--Muestro disponibilidad al duenio de acuerdo a lo indicado por el guardian-->
<?php require '../vistas/usernav.php'?>

<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/><!--incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>
<link rel="stylesheet" href="../css/main.css">  <!--lo sobreescribo con mi css (que ya incluí en el header) porque me lo modifica-->

<main class="content">

<div id="formContainer">

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

            $fechasDisponibles = explode (",",$_POST['fechas']);   //Recibo el arreglo de fechas disponibles y lo paso a string
        
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
                 <h3><p>Seleccionar día reserva</p></h3>
                 <form style="width:75%; margin:0 auto;"><fieldset style="padding-left:1.5em;">
                <div class="container" style="width:100%">
                    <input style="border: 1px solid rgba(64, 114, 8, 0.1) !important; border-radius: 3%; background-color:
                     rgba(235, 241, 146, 0.733); margin-left:-1em"
                      type="text" class="form-control date" placeholder="Ver fechas disponibles" name="fechas" id="calendario" autocomplete="off"
                     data-date-start-date="0d" data-date-end-date="+1m"  required readonly><br> 

                </div></fieldset></form>
</div>

</main>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script  src="../js/datepickereditado.js"></script>

<script>

$('.date').datepicker('setDatesDisabled',fechasNoDisponiblesJS);  //funcion de datepicker que setea fechas no disponibles
                                                                    //el dueño solo puede elegir de entre las fechas seleccionadas por el guardian
    </script>


<?php require '../vistas/footer.php' ?>