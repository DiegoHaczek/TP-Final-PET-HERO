<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

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
                    <label for="tamano"><strong><span>Tamaño</span></strong></label><br>
                    <label for="grande" class="labelcheckbox"><span>Grande</span></label>
                    <input id="radio" type="radio" name="tamano"  value="grande">
                    <label for="mediano" class="labelcheckbox"><span>Mediano</span></label>
                    <input id="radio" type="radio" name="tamano"  value="mediano">
                    <label for="chico" class="labelcheckbox"><span>Chico</span></label>
                    <input id="radio" type="radio" name="tamano"  value="chico">
                </fieldset>

                <fieldset>
                    <label for="especie"><strong><span>Especie</span></strong></label><br>
                    <label for="perro" class="labelcheckbox"><span>Perro</span></label>
                    <input id="radio" type="radio" name="especie"  value="perro">
                    <label for="gato" class="labelcheckbox"><span>Gato</span></label>
                    <input id="radio" type="radio" name="especie"  value="gato">

                    <br>
                    <label for="raza"><strong><span>Raza</span></strong></label><br>
                    <select name="raza" id="raza">
                        <option value="">--Elige una opción--</option>
                        <option value="">--Razas pequeñas--</option>
                        <option value="chihuahua">Chihuahua</option>
                        <option value="pomerano">Pomerano</option>
                        <option value="terrier">Terrier</option>
                        <option value="caniche">Caniche</option>
                        <option value="salchicha">Dachshund</option>
                        <option value="">--Razas Medianas--</option>
                        <option value="ovejero">Ovejero</option>
                        <option value="dalmata">Dálmata</option>
                        <option value="beagle">Beagle</option>
                        <option value="bordercollie">Border Collie</option>
                        <option value="bulldog">Bulldog</option>
                        <option value="husky">Husky</option>
                        <option value="pastor">Pastor</option>
                        <option value="">--Razas Grandes--</option>
                        <option value="rottweiler">Rottweiler</option>
                        <option value="dogo">Dogo</option>
                        <option value="pitbull">Pitbull</option>
                        <option value="labrador">Labrador</option>
                        <option value="golden">Golden Retriever</option>
                        <option value="galgo">Galgo</option>
                    </select>

                    <br>
                    <select name="raza" id="raza">
                        <option value="">--Elige una opción--</option>
                        <option value="abisinio">Abisinio</option>
                        <option value="bengala">Bengala</option>
                        <option value="bombay">Bombay</option>
                        <option value="british">British</option>
                        <option value="persa">Persa</option>
                        <option value="siames">Siamés</option>
                        <option value="comun">Común</option>
                        <option value="esfinge">Esfinge</option>
                        <option value="oriental">Oriental</option>
                    </select>
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