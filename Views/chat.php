<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

<?php if ($alert!="") {?>

<div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

<?php } ?>

    <div id="mainContainer" class="" style="min-height:20em;min-width:75em;">

        <section style="min-height:50em;min-width:27em;padding:3em 0 4em 0;position:relative;z-index: 1 !important">
                        
        <summary><span style=" position:relative; bottom:1.5em;"><strong> Mis Chats </span></strong></summary>

                            
            <div class="chat">

                <div class="conversacionesList">


                        <?php   $i=0;
                                foreach($ChatList as $chat){ //muestro los chats disponinbles

                           ?>

                            <div class="infoConversacion"> 
                                <a href="<?php echo FRONT_ROOT ?>Chat/mostrarChat?id_reserva=<?php echo $chat['id_reserva'].'&numeroConversacion='.$i;?>">
                                <img class="imgperfilchica" src="<?php echo FRONT_ROOT.$chat['foto_perfil']?>">
                                <div class="contenedorNombre"><span class="nombreUsuarioChat"><?php echo $chat['nombre']; ?></span></div>
                            </a></div>

                            <?php $i++; } ?>
                       

                </div>

                <div class="conversacion">


                    <div class="headerConversacion">


                        <?php if($ChatList){ 
                            if ($idReserva==''){?> <!-- si no se selecciono ninguna conversacion sale la primera -->


                        <img class="imgperfilchica" src="<?php echo FRONT_ROOT.$ChatList[0]['foto_perfil'];?>">
                        <div class="contenedorNombre"><span class="nombreUsuarioChat"><?php echo $ChatList[0]['nombre']; ?></span></div>
                        <?php if($_SESSION['type']=='d'){ ?>
                        <a href="<?php echo FRONT_ROOT ?>Guardian/ShowProfile/<?php echo $ChatList[0]['id_guardian']; ?>">
                        <button class="formButton" type="submit" style="align-self:center; position:relative;margin-bottom:1.2em;margin-right:1em">Ver Perfil</button>
                        </a><?php }else{}?>
                        <?php }else{ ?>

                        <img class="imgperfilchica" src="<?php echo FRONT_ROOT.$ChatList[$numeroConversacion]['foto_perfil'];?>">
                        <div class="contenedorNombre"><span class="nombreUsuarioChat"><?php echo $ChatList[$numeroConversacion]['nombre']; ?></span></div>
                        <?php if($_SESSION['type']=='d'){ ?>
                        <a href="<?php echo FRONT_ROOT ?>Guardian/ShowProfile/<?php echo $ChatList[$numeroConversacion]['id_guardian']; ?>">
                        <button class="formButton" type="submit" style="align-self:center; position:relative;margin-bottom:1.2em;margin-right:1em">Ver Perfil</button>
                        </a><?php } ?>

                        <?php }} ?>

                    </div>

                    <div class="cuerpoConversacion">

                            
                        <?php if ($Mensajes) {  

                            foreach($Mensajes as $mensaje) { //rehacer condiciones
                                
                                if ($_SESSION['type']=='d') {  //los mensajes propios salen a la izquierda
                                    
                                    if($mensaje['emisor']=='dueno'){?> 

                                    <div class="mensajeChat propio" ><span><?php echo $mensaje['mensaje']; ?></span></div>

                                    <?php }else { ?>

                                    <div class="mensajeChat ajeno"><span><?php echo $mensaje['mensaje'];?></span></div>
           
                                    <?php }} else if($mensaje['emisor']=='dueno'){?> 

                                    <div class="mensajeChat ajeno" ><span><?php echo $mensaje['mensaje']; ?></span></div>

                                    <?php }else { ?>

                                    <div class="mensajeChat propio"><span><?php echo $mensaje['mensaje'];?></span></div>


                         <?php }}} ?>   

                    </div>

                    <div class="cajaComentarios">
                        <form action="<?php echo FRONT_ROOT."Chat/Add"?>">
                            <input type="number" name="idReserva" style="display:none" value="<?php  echo ($idReserva == '')? $ChatList[0]['id_reserva'] : $idReserva ;?>">
                            <textarea name="mensaje" id="inputMensaje" placeholder="Ingrese su Mensaje." autofocus required></textarea>
                            <input type="text" style="display:none" name="emisor" value="<?php echo ($_SESSION['type'] == 'd')? 'dueno'  : 'guardian' ;?>">
                            <input type="number" style="display:none" name="numeroConversacion" value="<?php echo ($numeroConversacion)? $numeroConversacion : 0 ;?>">
                            <button class="formButton" id='botonEnviar' type="submit"> Enviar </button>
                        <form>
                    </div>

                </div>


            </div>

        </section>

        <a href="<?php echo FRONT_ROOT."Home/Index"?>" style="position:relative;right:4em">
        <button id="goback" type="button" style=""><span id="backward"  style="font-size:1.2rem;">Volver al Home</span></button></a>

    </div>      

             
 
</main>

<style>

    label{margin-top:1em;margin-left:1em;}

</style>



<script>

    
    const ultimoMensaje = (document.querySelector('.mensajeChat:last-of-type')); 
    
    if(ultimoMensaje){
    ultimoMensaje.scrollIntoView();}     //esl chat se scrollea hacia el ultimo mensaje
    window.scrollTo(0, 200); 

    const input = document.getElementById('inputMensaje');
    const btnEnviar = document.getElementById('botonEnviar')
    input.addEventListener("keyup", () => {
        
        if (event.keyCode === 13) {
            event.preventDefault();
            btnEnviar.click();
            //document.getElementById('botonEnviar').click();

    }})
                                        

if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}


</script>


<?php require 'footer.php' ?>