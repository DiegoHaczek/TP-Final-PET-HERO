<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

    <div id="mainContainer" class="">
                
                <section>
                       
                    <div class="sectioncontent">

                    <summary><span><strong> Lista de Guardianes </span></strong></summary>
                    <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Tarifa diaria</span></th><th><span>Tipo de Perro</span></th> 
                         <th><span>Disponibilidad</span></th></tr>
                        <tr class="espacio"><td></td></tr>
                        
                        <?php foreach($GuardianList as $guardian){ ?>
                

                            <tr><td>
                            <img  class ="imgperfilchica" src="<?php echo FRONT_ROOT.$guardian->getFotoPerfil();?>">
                        </td><td><span><?php echo ucwords($guardian->getNombre()); ?></span></td><td><span><?php echo $guardian->getRemuneracion(); ?></span></td>
                        <td><span><?php echo $guardian->getTamano(); ?></span></td>
                        <td><span><?php if($guardian->getDisponibilidad()=='Plena'||$guardian->getDisponibilidad()=='Fines De Semana')
                                                    {echo $guardian->getDisponibilidad();}
                                                                else{echo 'Personalizada';} ?></span></td>


                        <td>
                        <a href="<?php echo FRONT_ROOT ?>Guardian/ShowProfile/<?php echo $guardian->getId() ?>"><button class="formButton" type="submit" >Ver Perfil</button></a></td></tr>
                        <tr class="espacio"><td></td></tr>
                        
                                <?php } ?>
                        </table>

                    </div>
                     </section>

                     <a href="<?php echo FRONT_ROOT."Home"?>">
                     <button id="goback" type="button"><span id="backward">Volver al Home</span></button></a>


    </div>

</main>



<?php require 'footer.php' ?>