<?php require 'header.php' ?>
<?php require 'usernav.php'?>
<?php require_once 'validate-session.php'?> 

<main class="content">

    <div id="mainContainer" class="">

                
                    
                <section style="width:50em; height:30em">
                
                    
                    <div class="sectioncontent">

                    <summary><span><strong> Mis Mascotas </span></strong></summary>
                    <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Tamaño</span></th><th><span>Edad</span></th></tr>
                        <tr class="espacio"><td></td></tr>
                        
                        <tr><td>
                        <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                        </td><td><span>Roman</span></td><td><span>Chico</span></td><td><span>4</span></td>
                        <td><button class="formButton" type="submit" >Ver Perfil</button>
                        <button class="formButton" type="submit">Eliminar</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td>
                        <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                        </td><td><span>Pichicho</span></td><td><span>Chico</span></td><td><span>6</span></td>
                        <td><button class="formButton" type="submit" >Ver Perfil</button>
                        <button class="formButton" type="submit">Eliminar</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td>
                        <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                        </td><td><span>Tomi</span></td><td><span>Grande</span></td><td><span>2</span></td>
                        <td><button class="formButton" type="submit" >Ver Perfil</button>
                        <button class="formButton" type="submit">Eliminar</button></td></tr>
                        <tr class="espacio"><td></td></tr>


                        </table>

                        <a href="<?php echo FRONT_ROOT."Home/registroMascota"?>">
                        <button style="position:relative; bottom:24em; left:14.7em" class="buttonHome">Agregar Mascota</button></a>

                    </div>
                     </section>


    </div>

</main>



<?php require 'footer.php' ?>