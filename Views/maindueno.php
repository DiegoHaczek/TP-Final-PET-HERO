<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

<?php if ($alert!="") {?>

<div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

<?php } ?>

    <div id="mainContainer" class="" style="width:75em">


    <section style="width:52em;padding:3em 0 4em 0">
                        
                        <summary><span style=" position:relative; bottom:1.5em;"><strong> Mi Perfil </span></strong></summary>
                        <div class="sectioncontent">

                            <div class="profilecard" id="perfildueño">

                                <div class="mainprofileinfo">

                                    <?php if ($usuario->getFotoPerfil()){ ?>

                                    <img class="imgperfilgrande" src="<?php echo FRONT_ROOT.$usuario->getFotoPerfil();?>" style="border: 1px solid gray">

                                    <?php }else{ ?>

                                    <img class="imgperfilgrande" src="<?php echo IMG_PATH;?>avatardefault.png">

                                        <?php } ?>
                                    <span><?php echo ucwords($usuario->getNombre());?></span>
                                    <span><?php echo ucwords($usuario->getApellido());?></span>
                                </div>

                                <div class="secondaryprofileinfo">

                                    <div class="infopersonal">
                                        <span> Información Personal</span>
                                        <div class="separador"></div>
                                        <span> Edad: <strong><?php echo $usuario->getEdad();?></strong></span>
                                        <span> Email: <strong><?php echo $usuario->getMail();?></strong></span>
                                    </div>

                                    <div class="infoguardian">

                                        <span>Información Dueño</span>
                                        <div class="separador"></div>
                                        <span>Cantidad Mascotas: <strong><?php echo $cantidadMascotas; ?></strong> </span>
                                        <span>Cantidad Reservas Completadas: <strong>0</strong></span>
                                        

                                        <button class="formButton" style="padding:0.3em 1em; position:relative; top:8.3em; right:2.7em">Editar</button>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                
                    
                    <section style="width:50em; height:12em">
                
                    
                <div class="sectioncontent">

                <summary><span style=" position:relative; bottom:-1.5em;"><strong> Mis Mascotas </span></strong></summary>
                
                

                <a href="<?php echo FRONT_ROOT."Home/registroMascota"?>"><button style="" class="buttonHome">Agregar Mascota</button></a>

                <br>
    
                <a href="<?php echo FRONT_ROOT."Mascota/ShowListView"?>"><button style="" class="buttonHome">Ver Mascotas</button></a>

                </div>
                 </section>

                 <section style="width:50em; height:8em">
                
                    
                    <div class="sectioncontent">

                    <summary><span style=" position:relative; bottom:-1.5em;"><strong> Mis Reservas </span></strong></summary>
                        
                    <a href="<?php echo FRONT_ROOT."Guardian/ShowListView"?>">
                    <button style="" class="buttonHome">Ver Guardianes</button></a>

                    
                    </div>
                     </section>


    </div>

</main>

<script>


if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}

</script>

<?php require 'footer.php' ?>