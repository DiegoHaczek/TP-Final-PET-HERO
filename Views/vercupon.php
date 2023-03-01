<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

<?php if ($alert!="") {?>

<div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

<?php } ?>

    <div id="mainContainer" class="" style="min-height:20em;min-width:75em;">

        <section style="min-height:35em;min-width:30em;padding:3em 0 4em 0;position:relative;z-index: 1 !important">
                        
                        <summary><span style=" position:relative; bottom:2em;"><strong> Cupón de Pago </span></strong></summary>
                        <div class="sectioncontent" style="height:17em">

                        <div class="cuponpago">

                            <div class="headercupon">
                                
                                <div id="fila">
                                <span><strong>Cupón de Pago</strong></span>
                                <div class="separador" style="width:40em"></div>
                                </div>

                            </div>

                            <div class="contenidocupon">

                            <span>Código Cupón: <strong>#123ABC4</strong></span>
                            <span>Nombre Dueño: <strong><?php echo $datosCupon['d.nombre']; ?></strong></span>
                            <span>Nombre Mascota: <strong><?php echo $datosCupon['m.nombre'];?></strong></span>
                            <span>Nombre Guardián: <strong><?php echo $datosCupon['g.nombre'];?></strong></span>
                            <span>Vencimiento: <strong><?php echo $datosCupon['r.fecha_inicio'];?></strong></span>
                            <span>Monto: <strong style="font-size:1.3rem;"><?php echo $datosCupon['c.monto'];?></strong></span>

                            </div>


                        </div>

                            
                            </div>
                            <!--<form action="<?php //echo FRONT_ROOT."Cupon/updateEstado"?>">
                            <input type="number" name="idCupon" value="<?php // echo $datosCupon["c.id_cupon"];?>" style="display:none"></input>
                            <input type="number" name="idReserva" value="<?php // echo $datosCupon["r.id_reserva"];?>" style="display:none"></input>
                         <input type="text" name="estado" value="Aceptada" style="display:none"></input>
                         <button id="submit" class="formButton" style="padding:0.3em 1em; position:relative; left:22em; top:4.75em;">Pagar</button>
                        </form>  -->

                       <form action="<?php echo FRONT_ROOT."Cupon/verFormularioPago"?>">
                            <input type="number" name="idCupon" value="<?php  echo $datosCupon["c.id_cupon"];?>" style="display:none"></input>
                            <input type="number" name="idReserva" value="<?php  echo $datosCupon["r.id_reserva"];?>" style="display:none"></input>
                            <!--<input type="text" name="estado" value="Aceptada" style="display:none"></input>-->
                         <button id="submit" class="formButton" style="padding:0.3em 1em; position:relative; left:22em; top:4.75em;">Continuar</button>
                        </form>  
                            
                            

                            <div class="logo" style="">
                            
                            <span id="textologo"><p>Pet Hero</p></span>

                            <img src="<?php echo IMG_PATH;?>huella.png" style="width:6em;height:6em;">


                            <a href="<?php echo FRONT_ROOT."Home/Index"?>" style="position:relative;right:37.5em;top:27em">
                         <button id="goback" type="button" style=""><span id="backward"  style="font-size:1.2rem;">Volver al Home</span></button></a>
                            </div>

                            
                        
                        </div>


                       
                        


        </section>



                       

             
 
</main>

<style>

    label{margin-top:1em;margin-left:1em;}

</style>



<script>


if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}


</script>


<?php require 'footer.php' ?>