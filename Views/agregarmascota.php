<?php require 'header.php' ?>
<?php require 'usernav.php'?>
<?php require_once 'validate-session.php'?> 

<main class="content">

<div id="formContainer">

    <form id="editarmascota" action="<?php echo FRONT_ROOT."Mascota/Add"?>" class="activo">

        <fieldset class="formHeader">
            <h3><p>Agregar Mascota</p></h3>
        </fieldset>

                <fieldset>
                        <label for="informacionbasica"><span><strong>Información Básica</strong></span></label>
                    <input type="text" name="nombre" placeholder="Nombre de la Mascota" required>
                    <input type="number" class="number" name="edad" placeholder="Edad de la Mascota" min="0"  max="20" required>
                </fieldset>

                <fieldset>
                    <label for="tipoperro"><strong><span>Tipo de Perro</span></strong></label><br>
                    <label for="grande" class="labelcheckbox"><span>Grande</span></label>
                    <input id="radio" type="radio" name="tipoperro"  value="grande">
                    <label for="mediano" class="labelcheckbox"><span>Mediano</span></label>
                    <input id="radio" type="radio" name="tipoperro"  value="mediano">
                    <label for="chico" class="labelcheckbox"><span>Chico</span></label>
                    <input id="radio" type="radio" name="tipoperro"  value="chico">
                </fieldset>

                <fieldset>
                    <label for="consideraciones"><span><strong>Consideraciones / Cuidados especiales</strong></span></label>
                    <textarea name="indicaciones" id="indicaciones" placeholder="Ingrese aquí información sobre consideraciones o cuidados especiales." required></textarea>
                </fieldset>
                
                <fieldset><label for="fichamedica"><strong><span>Foto de la Mascota</span></strong></label><br>
                     <input type="file" id="fichamedica" name="fichamedica" accept="image/*" required>
                </fieldset>

                <fieldset><label for="fichamedica"><span><strong>Video de la Mascota </strong> (Opcional)</span></label><br>
                     <input type="file" id="fichamedica" name="fichamedica" accept="video/*">
                </fieldset>


                <fieldset><label for="fotomascota"><strong><span>Ficha Médica</span></strong></label><br>
                     <input type="file" id="fotomascota" name="fotomascota" accept="image/*" required>
                </fieldset>

                     <div id="botoneraForm">
                     <button class="formButton" type="submit" >Guardar Info</button>
                     <button class="formButton" type="reset" >Limpiar Campos</button></div>

                     <a href="<?php echo FRONT_ROOT."Home"?>"><button id="goback"  type="button"><span id="backward">Volver al Home</span></button></a>
    

    </form>

</div>

</main>



<?php require 'footer.php' ?>