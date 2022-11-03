<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

    <div id="mainContainer" class="" style="width:80em; border-radius:35px;">

                
                    
                <section style="width:68em; min-height:10em">
                
                    
                    <div class="sectioncontent" >

                    <summary><span><strong> Mis Reservas </span></strong></summary>
                    <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre</span></th><th><span>Nombre Guardián</span></th><th><span>Estado</span></th> 
                        <th><span>Días</span></th><th><span>Fecha Inicio</span></th><th><span>Fecha Fin</span></th></tr>
                        <tr class="espacio"><td></td></tr>

                        <?php foreach($reservas as $reserva) { ?>

                        <?php $dateInicio=date_create_from_format('Y-m-d',$reserva['r.fecha_inicio']);
                        $dateFinal=date_create_from_format('Y-m-d',$reserva['r.fecha_final']);
                        $diasReserva=date_diff($dateInicio,$dateFinal)->d+1; ?>

                        
                        <tr><td><img  class ="imgperfilchica" src="<?php echo FRONT_ROOT.$reserva["m.foto_perfil"]?>"></td><td><span><?php echo $reserva["m.nombre"]; ?></span></td>
                        <td><span><?php echo $reserva["g.nombre"]; ?></span></td><td><span><?php echo $reserva["r.estado"]; ?></span></td><td><span><?php echo $diasReserva; ?></span></td>
                        <td><span><?php echo $reserva["r.fecha_inicio"]; ?></span></td><td><span><?php echo $reserva["r.fecha_final"]; ?></span></td>

                        <form action="<?php echo FRONT_ROOT."Reserva/updateEstado"?>">

                        <input type="number" name="idReserva" value="<?php echo $reserva["r.id_reserva"];?>" style="display:none"></input>
                        <input type="text" name="estado" value="Cancelada" style="display:none"></input>

                        <?php if($reserva["r.estado"]=='Pendiente') { ?>
                        
                        <td><button class="formButton" type="submit">Cancelar</button> 

                        <?php }else{ echo "<td>";}?>

                        

                        </form>

                        <tr class="espacio"><td></td></tr>

                        <?php }?>    

                        </table>

                    </div>
                     </section>

                     <a href="<?php echo FRONT_ROOT."Home"?>">
                     <button id="goback" style="position:relative; right:2em;" type="button"><span id="backward">Volver al Home</span></button></a>


    </div>

</main>



<?php require 'footer.php' ?>