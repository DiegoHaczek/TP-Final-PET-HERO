<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

    <div id="mainContainer" class="" style="width:75em">


    <section style="width:52em;padding:3em 0 4em 0">
                        
                        <summary><span style=" position:relative; bottom:1.5em;"><strong> Mi Perfil </span></strong></summary>
                        <div class="sectioncontent">

                            <div class="profilecard" id="perfildueño">

                                <div class="mainprofileinfo">
                                    <img class="imgperfilgrande" src="<?php echo IMG_PATH;?>avatardefault.png">
                                    <span><?php echo $usuario->getNombre();?></span>
                                    <span><?php echo $usuario->getApellido();?></span>
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
                                        <span>Cantidad Mascotas: <strong>0</strong> </span>
                                        <span>Cantidad Reservas Completadas: <strong>0</strong></span>
                                        

                                        <button class="formButton" style="padding:0.3em 1em; position:relative; top:8.3em; right:2.7em">Editar</button>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                
                    
                    <section style="width:50em; height:30em">
                
                    
                <div class="sectioncontent">

                <summary><span style=" position:relative; bottom:-1.5em;"><strong> Mis Mascotas </span></strong></summary>
                <table>
                    
                    <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Tamaño</span></th><th><span>Edad</span></th></tr>
                    <tr class="espacio"><td></td></tr>
                    
                    <tr><td>
                    <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                    </td><td><span>Roman</span></td><td><span>Chico</span></td><td><span>4</span></td>
                    <td><button class="formButton" type="submit" >Ver Perfil</button>
                    <button class="formButton" type="submit">Eliminar</button></td></tr>
                    <tr class="espacio"><td></td></tr>


                    </table>

                    <a href="<?php echo FRONT_ROOT."Home/registroMascota"?>">
                    <button style="position:relative; bottom:24em; left:14.7em" class="buttonHome">Agregar Mascota</button></a>

                </div>
                 </section>

                 <section style="width:50em; height:7em">
                
                    
                    <div class="sectioncontent">

                    <summary><span><strong> Mis Reservas </span></strong></summary>
                        
                    <a href="<?php echo FRONT_ROOT."Guardian/ShowListView"?>">
                    <button style="" class="buttonHome">Ver Guardianes</button></a>


                        

                    </div>
                     </section>


    </div>

</main>



<?php require 'footer.php' ?>