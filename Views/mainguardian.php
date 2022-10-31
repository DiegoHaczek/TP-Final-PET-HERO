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

    <div id="mainContainer" class="">

                
    <section style="width:52em;padding:3em 0 0 0">
                        
                        <summary><span style=" position:relative; bottom:2em;"><strong> Mi Perfil </span></strong></summary>
                        <div class="sectioncontent">

                            <div class="profilecard" id="perfilguardian">

                                <div class="mainprofileinfo">
                                    
                                <?php if ($usuario->getFotoPerfil()){ ?>

                                    <img class="imgperfilgrande" src="<?php echo FRONT_ROOT.$usuario->getFotoPerfil();?>" style="border: 1px solid gray">

                                <?php }else{ ?>

                                <img class="imgperfilgrande" src="<?php echo IMG_PATH;?>avatardefault.png">

                                    <?php } ?>
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
                                        <span>Tipo de Perro: <strong><?php echo $usuario->getTamano();?></strong></span>
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
                            <button class="formButton" style="padding:0.3em 1em; position:relative; left:19em; bottom:5em;">Editar</button>

                        </div>
                    </section>

                     <?php $mostrarSection=false;
                        foreach($reservas as $reserva){

                        if ($reserva["r.estado"]=='Pendiente'){
                            $mostrarSection=true;
                        }} 

                        if($mostrarSection){
                        ?>

                    <section style="width:80em">
                    <div class="sectioncontent">
                            
                        <summary><span><strong>Reservas Pendientes</strong></span></summary>
                        <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Nombre Dueño</span></th><th><span>Raza</span></th> 
                        <th><span>Días</span></th><th><span>Fecha Inicio</span></th><th><span>Fecha Fin</span></th></tr>
                        <tr class="espacio"><td></td></tr>


                        <?php foreach($reservas as $reserva) { if($reserva["r.estado"]=='Pendiente'){?>
                        
                        <tr><td><img  class ="imgperfilchica" src="<?php echo FRONT_ROOT.$reserva["m.foto_perfil"]?>"></td><td><span><?php echo $reserva["m.nombre"]; ?></span></td>
                        <td><span><?php echo $reserva["d.nombre"]; ?></span></td><td><span><?php echo $reserva["m.raza"]; ?></span></td><td><span>3</span></td>
                        <td><span><?php echo $reserva["r.fecha_inicio"]; ?></span></td><td><span><?php echo $reserva["r.fecha_final"]; ?></span></td>

                        <form action="<?php echo FRONT_ROOT."Reserva/updateEstado"?>">

                        <input type="number" name="idReserva" value="<?php echo $reserva["r.id_reserva"];?>" style="display:none"></input>
                        <input type="text" name="estado" value="Aceptada" style="display:none"></input>

                        <td><button class="formButton" type="submit">Aceptar</button>
                        
                        </form>
                        
                        <button class="formButton" type="submit" >Cancelar</button>



                        <button class="formButton" type="submit" >Ver Info</button></td></tr>
                        <tr class="espacio"><td></td></tr>


                        <?php }} ?>

                        </table>
                        
                    </div>
                    </section>

                    <?php } ?>

                     <section style="width:80em">
                    <div class="sectioncontent">
                            
                        <summary><span><strong>Próximas Reservas</strong></span></summary>
                        <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Nombre Dueño</span></th><th><span>Raza</span></th> 
                        <th><span>Días</span></th><th><span>Fecha Inicio</span></th><th><span>Fecha Fin</span></th></tr>
                        <tr class="espacio"><td></td></tr>

                        <?php foreach($reservas as $reserva) { if($reserva["r.estado"]=='Aceptada'){?>
                        
                        <tr><td><img  class ="imgperfilchica" src="<?php echo FRONT_ROOT.$reserva["m.foto_perfil"]?>"></td><td><span><?php echo $reserva["m.nombre"]; ?></span></td>
                        <td><span><?php echo $reserva["d.nombre"]; ?></span></td><td><span><?php echo $reserva["m.raza"]; ?></span></td><td><span>3</span></td>
                        <td><span><?php echo $reserva["r.fecha_inicio"]; ?></span></td><td><span><?php echo $reserva["r.fecha_final"]; ?></span></td>

                        <form action="<?php echo FRONT_ROOT."Reserva/updateEstado"?>">

                        <input type="number" name="idReserva" value="<?php echo $reserva["r.id_reserva"];?>" style="display:none"></input>
                        <input type="text" name="estado" value="Cancelada" style="display:none"></input>

                        <td><button class="formButton" type="submit">Cancelar</button>
                        
                        </form>
                        



                        <button class="formButton" type="submit" >Ver Info</button></td></tr>
                        <tr class="espacio"><td></td></tr>


                        <?php }} ?>

                        </table>
                        
                    </div>
                    </section>
                        

    </div>

</main>

<?php require 'datepickervista.php' ?>


<script>

$('.date').datepicker('setDatesDisabled',fechasNoDisponiblesJS);  //funcion de datepicker que setea fechas no disponibles
                                                                    //el dueño solo puede elegir de entre las fechas seleccionadas por el guardian
</script>

<script>
if (!$("#alert").hasClass("")){
$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});
}
</script>


<?php require 'footer.php' ?>