<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<!-- incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>

<main class="content">

<?php if ($alert!="") {?>

<div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

<?php } ?>

    <div id="mainContainer" class="" style="width:75em;">

                
        <section style="min-height:36em;width:60em;padding:3em 0 4em 0;position:relative;z-index: 1 !important">
                        
                        <summary><span style=" position:relative; bottom:2em;"><strong> Perfil </span></strong></summary>
                        <div class="sectioncontent" style="height:26em">

                            <div class="profilecard" id="perfilguardian" >

                                <div class="mainprofileinfo">
                                <img class="imgperfilgrande" src="<?php echo FRONT_ROOT.$usuario->getFotoPerfil();?>" style="border: 1px solid gray">
                                    <span><?php echo ucwords($usuario->getNombre());?></span>
                                    <span><?php echo ucwords($usuario->getApellido());?></span>
                                    <span>Reputacion</span>
                                    <span><?php echo $usuario->getPuntaje()."/10";?> </span>
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
                                        <span>Tamaño Mascotas: <strong><?php echo $usuario->getTamano();?></strong></span>
                                        <span>Remuneracion por Día: <strong><?php echo $usuario->getRemuneracion();?></strong></span>
                                        <span>Disponibilidad: </span>
                                           
                                        <?php include (VIEWS_PATH."disponibilidad.php"); 
                                        
                                        if ($usuario->getDisponibilidad()=='Plena') { 
                                            
                                        ?> <span style="position:relative;left:7em;bottom:3.45em;"><strong><?php echo $usuario->getDisponibilidad();} else{ ?></strong></span>
                                    
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

                            <?php if($_SESSION['type'] == 'd' ) {?>
                            <button id="solicitar" class="formButton" style="padding:0.3em 1em; position:relative; left:16.2em; bottom:5.2em;">Solicitar Reserva</button>
                                <?php } ?>

                        </div>

                                            <?php
                                                 if ($comprobacionComentario){

                                              ?>

                                            <form class="formComentario" method="post" style="margin-top:3em;" action="<?php echo FRONT_ROOT."Comentario/Add"?>">
                                            <fieldset style="">
                                            <label for="mensaje"><span><strong>Realizar Comentario</strong></span></label><br>
                                                <textarea name="mensaje" id="mensaje" style="margin-bottom:2.3em;"
                                                placeholder="Ingrese su Comentario sobre la Reserva realizada con este Guardián." required></textarea>

                                                <br>

                                                <label id="puntaje" for="puntaje" style="margin-left:-13.2em;position:relative;bottom:0.2em;"><span><strong>Puntuacion: </strong></span></label> 

                                                <div class="inputDiv">

                                                <div class="etiqueta"><span></span></div>

                                                <input id="rangePuntaje" type="range" min="0" max="10" step="1" autocomplete="off" name="puntaje">
                                                </div>
      
                                                <input type="number" name="idReserva" value="<?php echo $comprobacionComentario[0]['id_reserva'] ?>" style="display:none">
                                                </input>
                                                       
                                                <button class="formButton" type="submit" style="position:relative;left:15.5em;bottom: 0.6em;">Enviar</button>


                                            </fieldset>
                                           
                                            </form>

                                            
                                            <?php } ?>

                            <details class="estilizado" style="margin-top:2em;margin-bottom:-1em;"> <summary><span><strong>Comentarios</strong></span></summary>

                            <div class="seccionComentarios" style="">

                            <?php if($comentarios){foreach($comentarios as $comentario) { ?>


                            <div class="comentario">

                            
                                            <div class="datosDuenoComentario">

                                            <span><strong><?php echo $comentario["d.nombre"]." (".$comentario["c.puntaje"].")";?></strong></span>
                                            <div class="separador"></div>
                                            <span><?php echo $comentario["c.fecha"]; ?></span>

                                            </div>

                                            <div class="fotoPerfilComentario">

                                            <img  class ="imgperfilmediana" src="<?php echo FRONT_ROOT.$comentario["d.foto_perfil"]?>">

                                            </div>
                                            
                                            <div class="mensajeComentario">

                                            <span><strong><?php echo '"'.$comentario["c.mensaje"].'"'; ?></strong>
                                            </span>

                                            </div>

                            </div>

                            <?php }}else echo '<span style="position:relative; top:3em;">El Guardian aun no tiene Comentarios Disponibles</span>' ?>


                            </div>

                            </details>
           

        </section>


        <section id="reserva" class="oculta" style="width:43em;padding-bottom:4em;">
            <div class="sectioncontent" style="">

                <summary style="margin:2em 0;"><span ><strong> Datos de la Reserva </span></strong></summary>
                    
                    

                        <form id="solicitarreserva" action="<?php echo FRONT_ROOT."Reserva/Add"?>" method="post" class="activo" style="">
                            <fieldset class="formHeader">
                                <h3><p>Solicitud Reserva</p></h3>
                            </fieldset>

                                <fieldset style="height:9.7em;">
                                <label for="fechaInicio" style="margin-top:2em; margin-bottom:0em;"><span><strong>Fecha de Inicio:</strong></span></label>
                                <div class="container" style="width:32%;">
                                                <input style="cursor: pointer; border: 1px solid rgba(64, 114, 8, 0.1); position:relative; bottom:2.6em; right:2.5em; !important; border-radius: 3%; background-color:
                                                rgba(235, 241, 146, 0.733);"
                                            type="text" class="form-control date" placeholder="Ver fechas" name="fechaInicio" id="calendario" autocomplete="off"
                                            data-date-start-date="0d" data-date-end-date="+1m" value="" required readonly><br> 
                                            </div>

                                            <label for="fechaFinal" style="margin-top:-1em;position:relative;bottom:1.7em;left:0.4em;"><span><strong>Fecha Final:</strong></span></label>
                                <div class="container" style="width:32%;">
                                                <input style="cursor: pointer; border: 1px solid rgba(64, 114, 8, 0.1); position:relative; bottom:5em; right:2.4em; !important; border-radius: 3%; background-color:
                                                rgba(235, 241, 146, 0.733);"
                                            type="text" class="form-control date" placeholder="Ver fechas" name="fechaFinal" id="calendario" autocomplete="off"
                                            data-date-start-date="0d" data-date-end-date="+1m" value="" required readonly><br> 
                                            </div>

                                </fieldset>

                                    <fieldset style="padding-bottom:1em;">
                                    <label for="mascotas"><span><strong>Mascotas a cuidar:</strong></span></label>
                                    <br>
                                    
                                    <?php foreach($mascotas as $mascota) { 
                                                                              
                                        if(in_array($mascota->getTamano(), explode(",",$usuario->getTamano()))){
                                        ?>

                                        <label for="idMascota"><span style="margin-left:1em;"><?php echo ucwords($mascota->getNombre()); echo " (".ucwords($mascota->getRaza()).")";?></span></label>
                                        <input type="checkbox" id="checkbox" name="mascota[]" value="<?php echo ucwords($mascota->getNombre()).",".ucwords($mascota->getRaza()).",".$mascota->getId();?>"></input> 
                                        <br>

                                        <!--<input type="text" style="display:none" value="<?php // echo $mascota->getId(); ?>" name="idMascota">-->
                                    
                                    <?php }} ?>
                                    

                                    <input type="text" style="display:none" value="<?php echo $usuario->getId(); ?>" name="idGuardian">

                                    <input type="text" style="display:none" value="<?php echo $_SESSION["id"]; ?>" name="idDueno">


                                    </fieldset>
                                
                                        <div id="botoneraForm" style="margin-bottom:1em;">
                                            <button class="formButton" type="submit"  style="margin-left:1.3em;">Solicitar</button>
                                            <button class="formButton" type="reset" >Limpiar Campos</button></div>    

                        </form>
        
        </section>

            <?php if($_SESSION['type']=='d') { ?>
              <a href="<?php echo FRONT_ROOT."Guardian/ShowListView"?>">
              <button id="goback" type="button" style="position:relative; right:1.5em; margin-top:-1.5em;"><span id="backward">Volver a Guardianes</span></button></a>
            <?php  }else{ ?>
              <a href="<?php echo FRONT_ROOT."Home/Index"?>">
              <button id="goback" type="button" style="position:relative; right:1.5em; margin-top:-1.5em;"><span id="backward">Volver al Home</span></button></a>

                <?php } ?>
</main>

<style>

    label{margin-top:1em;margin-left:1em;}

</style>

<?php require 'datepickervista.php' ?>


<script>


<?php if ($usuario->getDisponibilidad()=='Fines De Semana') {?>  

$('.date').datepicker('setDaysOfWeekDisabled',[1,2,3,4,5]);

<?php }else{  if ($usuario->getDisponibilidad()!='Plena'){?>

$('.date').datepicker('setDatesDisabled',fechasNoDisponiblesJS);  //funcion de datepicker que setea fechas no disponibles
                                                                  //el dueño solo puede elegir de entre las fechas seleccionadas por el guardian
<?php }} ?>


let solicitarReserva = document.getElementById('solicitar');
let formularioReserva = document.getElementById('reserva');
let elInput3 = document.querySelector('#rangePuntaje');



solicitarReserva.addEventListener('click',function(){


    if($("#reserva").hasClass("oculta")){

        $("#reserva").removeClass("oculta");
        $("#reserva").addClass("desplegada");

        setTimeout(function(){

            window.scroll({left: 0, top: document.body.scrollHeight, behavior: "smooth"});

        },330)
        
    }

})


if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}


if (elInput3) {
  var w = parseInt(window.getComputedStyle(elInput3, null).getPropertyValue('width'))-30;

  // LA ETIQUETA 
  let etq = document.querySelector('.etiqueta');
  if (etq) {
    // el valor de la etiqueta 
    etq.innerHTML = elInput3.value;

    // calcula la posición inicial de la etiqueta 
    let pxls = w / 10;

    etq.style.left = ((elInput3.value * pxls) +2) + 'px';

    elInput3.addEventListener('input', function() {
      // cambia el valor de la etiqueta 
      etq.innerHTML = elInput3.value;
      // cambia la posición de la etiqueta 
      etq.style.left = ((elInput3.value * pxls) +2 ) + 'px';

    }, false);
  }
}
</script>


<?php require 'footer.php' ?>