<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<!-- incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>

<main class="content">

    <div id="mainContainer" class="">

                
    <section style="width:52em;padding:3em 0 4em 0">
                        
                        <summary><span style=" position:relative; bottom:2em;"><strong> Perfil </span></strong></summary>
                        <div class="sectioncontent">

                            <div class="profilecard" id="perfilguardian">

                                <div class="mainprofileinfo">
                                    <img class="imgperfilgrande" src="<?php echo IMG_PATH;?>avatardefault.png">
                                    <span><?php echo ucwords($usuario->getNombre());?></span>
                                    <span><?php echo ucwords($usuario->getApellido());?></span>
                                    <span>Reputacion</span>
                                    <span>0/10</span>
                                </div>

                                <div class="secondaryprofileinfo">

                                    <div class="infopersonal">
                                        <span> Información Personal</span>
                                        <div class="separador"></div>
                                        <span>Edad: <strong><?php echo $usuario->getEdad();?></strong></span>
                                        <span>Email: <strong><?php echo $usuario->getMail();?></strong></span>
                                    </div>

                                    <div class="infoguardian">

                                        <span>Información Guardián</span>
                                        <div class="separador"></div>
                                        <span>Tipo de Perro: <strong><?php echo implode(", ",$usuario->getTipoPerro());?></strong></span>
                                        <span>Remuneracion por Día: <strong><?php echo $usuario->getRemuneracion();?></strong></span>
                                        <span>Disponibilidad: <?php if($usuario->getDisponibilidad()=='Plena'||$usuario->getDisponibilidad()=='Fines De Semana'){
                                            ?> <strong><?php echo $usuario->getDisponibilidad()?></strong>  <?php
                                        }else{ ?> </span>
                                           
                                        <?php include (VIEWS_PATH."disponibilidad.php") ?>
                                    
                                        <div class="container" style="width:26%;">
                                                <input style="cursor: pointer; border: 1px solid rgba(64, 114, 8, 0.1); position:relative; bottom:2.3em; right:3em; !important; border-radius: 3%; background-color:
                                                rgba(235, 241, 146, 0.733);"
                                            type="text" class="form-control date" placeholder="Ver fechas" name="fechas" id="calendario" autocomplete="off"
                                            data-date-start-date="0d" data-date-end-date="+1m" value="" required readonly><br> 
                                            </div>

                                            <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <a href="<?php echo FRONT_ROOT."Home"?>">
                     <button id="goback" type="button" style="position:relative; right:1.5em; margin-top:-1.5em;"><span id="backward">Volver al Home</span></button></a>
 

</main>

<?php require 'datepickervista.php' ?>


<script>

$('.date').datepicker('setDatesDisabled',fechasNoDisponiblesJS);  //funcion de datepicker que setea fechas no disponibles
                                                                    //el dueño solo puede elegir de entre las fechas seleccionadas por el guardian
    </script>


<?php require 'footer.php' ?>