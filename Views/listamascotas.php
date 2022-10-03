<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

    <div id="mainContainer" class="">

                
                    
                <section>
                
                    
                    <div class="sectioncontent">

                    <summary><span><strong> Mis Mascotas </span></strong></summary>
                    <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Tamaño</span></th><th><a href="<?php echo FRONT_ROOT."Home/registroMascota"?>"><button class="formButton">Agregar Mascotas</button></a></th></tr>
                        <tr class="espacio"><td></td></tr>
                        
                        <tr><td>
                        <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                        </td><td><span>Roman</span></td><td><span>Chico</span></td>
                        <td><button class="formButton" type="submit" >Ver Perfil</button><button class="formButton" type="submit" >Editar Perfil</button>
                        <button class="formButton" type="submit">Eliminar</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td>
                        <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                        </td><td><span>Pichicho</span></td><td><span>Chico</span></td>
                        <td><button class="formButton" type="submit" >Ver Perfil</button><button class="formButton" type="submit" >Editar Perfil</button>
                        <button class="formButton" type="submit">Eliminar</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td>
                        <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                        </td><td><span>Tomi</span></td><td><span>Grande</span></td>
                        <td><button class="formButton" type="submit" >Ver Perfil</button><button class="formButton" type="submit" >Editar Perfil</button>
                        <button class="formButton" type="submit">Eliminar</button></td></tr>
                        <tr class="espacio"><td></td></tr>


                        </table>

                    </div>
                     </section>


    </div>

</main>



<?php require 'footer.php' ?>