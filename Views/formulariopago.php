<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

<?php if ($alert!="") {?>

<div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

<?php } ?>

<div id="formContainer">

    <form id="editarperfil" action="<?php echo FRONT_ROOT."Cupon/submitFormulario"?>" method="post" class="activo" style="height: 32em">
        <fieldset class="formHeader">
            <h3><p>Formulario de Pago</p></h3>
        </fieldset>

                <fieldset>
                    <label for="datostarjeta" ><strong><span>Datos Tarjeta</span></strong></label><br>
                   
                    <input type="text" id="numerotarjeta" name="numerotarjeta" placeholder="Número de Tarjeta" minlength="12" maxlength="12" required>

                    <input type="text" id="vencimientotarjeta" name="vencimientotarjeta" placeholder="Fecha de Vencimiento         'dd/mm'" minlength="5" maxlength="5" required>

                    <input type="text" class="number" id="cvv" name="cvv" placeholder="CVV" minlength="3" maxlength="3" required>

                </fieldset>

                    <input type="number" name="idCupon" value="<?php echo $idCupon;?>" style="display:none"></input>
                    <input type="number" name="idReserva" value="<?php echo $idReserva;?>" style="display:none"></input>

                    <div id="botoneraForm" style="position:relative;margin-left:7em">
                        <button class="formButton" type="submit">Pagar</button>
                        <button class="formButton" type="reset" >Limpiar Campos</button></div>    

    </form>

    <a href="../index.php"><button id="goback"  type="button" style="transform:translate(-2em)"><span id="backward" >Volver al Home</span></button></a>

</div>

</main>

<script>


if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}


</script>


<?php require 'footer.php' ?>