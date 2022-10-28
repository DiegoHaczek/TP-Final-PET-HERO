<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

    <div id="mainContainer" class="" style="width:70em;">

                
                    
                <section style="width:60em; min-height:10em">
                
                    
                    <div class="sectioncontent" >

                    <summary><span><strong> Mis Mascotas </span></strong></summary>
                    <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Especie</span></th><th><span>Edad</span></th><th><span>Tamaño</span></th><th><span>Raza</span></th></tr>
                        <tr class="espacio"><td></td></tr>

                        <?php foreach($MascotaList as $mascota) { ?>
                            
                            <?php if($mascota->getIdDueno()==$_SESSION["id"]) { ?>
                            <tr><td>
                            <img  class ="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png"></td><td><span><?php echo ucwords($mascota->getNombre()); ?> </span> </td>
                            <td> <span> <?php echo ucwords($mascota->getEspecie()); ?> </span> </td>  <td> <span> <?php echo $mascota->getEdad(); ?></span> </td> 
                            <td> <span> <?php echo ucwords($mascota->getTamano()); ?></span> </td>  <td> <span> <?php echo ucwords($mascota->getRaza()); ?></span> </td>  
                            <td> <button class="formButton" type="submit" >Ver Perfil</button></td><td> 
                            <form id="" action="<?php echo FRONT_ROOT."Mascota/Remove"?>" class="activo">
                            <input type="number" value="<?php echo $mascota->getId();?>" name="id_mascota" style="display:none">
                            <button class="formButton" type="submit" >Eliminar</button></td></tr>

                            <tr class="espacio"><td></td></tr>

                            <?php }?>
                            <?php } ?>

                        </table>

                    </div>
                     </section>

                     <a href="<?php echo FRONT_ROOT."Home"?>">
                     <button id="goback" style="position:relative; right:2em;" type="button"><span id="backward">Volver al Home</span></button></a>


    </div>

</main>



<?php require 'footer.php' ?>