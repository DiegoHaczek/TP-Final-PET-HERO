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

                <div class="infoConversacion"> <a href="">
                        <img class="imgperfilchica" src="<?php echo FRONT_ROOT;?>Upload/imgfotoperfilmujer.jpg">
                            <div class="contenedorNombre"><span class="nombreUsuarioChat">Sandra</span></div>
                        </a></div>
                        <div class="infoConversacion"> <a href="">
                        <img class="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                            <div class="contenedorNombre"><span class="nombreUsuarioChat">Juan</span></div>
                        </a></div>
                        <div class="infoConversacion"> <a href="">
                        <img class="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                            <div class="contenedorNombre"><span class="nombreUsuarioChat">Pedro</span></div>
                        </a></div>
                        <div class="infoConversacion"> <a href="">
                        <img class="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                            <div class="contenedorNombre"><span class="nombreUsuarioChat">Nombre</span></div>
                        </a></div>
                

                </div>

                <div class="conversacion">


                    <div class="headerConversacion">
                        <img class="imgperfilchica" src="<?php echo FRONT_ROOT;?>Upload/imgfotoperfilmujer.jpg">
                        <div class="contenedorNombre"><span class="nombreUsuarioChat">Sandra</span></div>
                        <button class="formButton" type="submit" style="align-self:center; position:relative;margin-bottom:1.2em;margin-right:1em">Ver Perfil</button>

                    </div>


                    <div class="cuerpoConversacion">

                    <div class="mensajeChat propio" ><span>Qué hacés capo todo bien?</span></div>
                    <div class="mensajeChat propio"><span>te cuido el rrope?</span></div>
                    <div class="mensajeChat propio"><span>santa fe 3000</span></div>
                    <div class="mensajeChat ajeno"><span>messi</span></div>
                    
                    </div>


                    <div class="cajaComentarios">
                    <textarea name="mensaje" 
                    placeholder="Ingrese su Mensaje." required></textarea>

                    <button class="formButton" type="submit" >Enviar</button>
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


  window.scrollTo(0, 200);


if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}


</script>


<?php require 'footer.php' ?>