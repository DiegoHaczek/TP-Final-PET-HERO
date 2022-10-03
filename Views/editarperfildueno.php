<?php require 'header.php' ?>
<?php require 'header.php' ?>
<?php require 'visitornav.php'?>


<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet"/><!-- incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>main.css">  <!--lo sobreescribo con mi css (que ya incluí en el header) porque me lo modifica-->
<link rel="stylesheet" href="<?php echo CSS_PATH;?>override.css">

<main class="content">

<div id="formContainer">

    <form id="editarperfil" action="<?php echo FRONT_ROOT."Dueno/EditProfile"?>" method="post" class="activo">
        <fieldset class="formHeader">
            <h3><p>Editar Mi Perfil</p></h3>
        </fieldset>

                <fieldset>
                    <label for="informacionpersonal" ><strong><span>Información Personal</span></strong></label><br>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre">
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido">
                    <input type="number" class="number" id="edad" name="edad" placeholder="Edad" min="18" max="90">
                </fieldset>

                <fieldset>
                    <label for="fotoperfil"><strong><span>Foto de Perfil</span></strong></label><br>
                     <input type="file" id="fotoperfil" name="fotoperfil" accept="image/*">
                </fieldset>
              
                    <div id="botoneraForm">
                        <button class="formButton" type="submit" style="transform: scale(1.45);" >Guardar Info</button>
                        <button class="formButton" type="reset" style="transform: scale(1.45); margin-left:4em" >Limpiar Campos</button></div>
                    
                        <a href="../index.php"><button id="goback"  type="button"><span id="backward" >Volver al Home</span></button></a>
    

    </form>

</div>

</main>


<?php require 'datepicker.php' ?>
<?php require 'footer.php' ?>