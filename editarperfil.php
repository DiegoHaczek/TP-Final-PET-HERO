<?php require 'header.php' ?>

<main class="content">

<div id="formContainer">

    <form id="editarperfil" action="" class="activo">
    <fieldset class="formHeader">
                    <h3><p>Editar Mi Perfil</p></h3>
                    </fieldset>

                    <fieldset>
                    <label for="informacionpersonal"><strong><span>Información Personal</span></strong></label><br>
                    <input type="text" id="nombre" name="nombre" placeholder="Nombre">
                    <input type="text" id="apellido" name="apellido" placeholder="Apellido">
                    <input type="number" class="number" id="edad" name="edad" placeholder="Edad" min="18">

                    </fieldset>

                    <fieldset>
                    <label for="fotoperfil"><strong><span>Foto de Perfil</span></strong></label><br>
                     <input type="file" id="fotoperfil" name="fotoperfil" accept="image/*">
                    </fieldset>

                    <fieldset>
                    <label for="disponibilidad"><strong><span>Disponibilidad</span></strong></label>
                    <input type="date" name="disponibilidad" required></input>
                    </fieldset>

                    <fieldset>
                <label for="tipoperro"><strong><span>Tipo de Perro:</span></strong></label><br>
                <label for="grande" class="labelcheckbox"><span>Grande</span></label>
                <input id="checkbox" type="checkbox" name="tipoperro" id="grande" value="grande">
                <label for="mediano" class="labelcheckbox"><span>Mediano</span></label>
                <input id="checkbox" type="checkbox" name="tipoperro" id="mediano" value="mediano">
                <label for="chico" class="labelcheckbox"><span>Chico</span></label>
                <input id="checkbox" type="checkbox" name="tipoperro" id="chico" value="chico">
                </fieldset>
                

                <fieldset>
                <label for="remuneracion"><strong><span>Remuneración</span></strong></label><br>
                    <input type="number" name="remuneracion" class="number" placeholder="$ARS" required min="400"></input>
                    <span>(Calculada en pesos argentinos por día.)</span>
                </fieldset>
              
                    <div id="botoneraForm">
                        <button class="formButton" type="submit" ><a href="main.php">Guardar Info</a></button>
                        <button class="formButton" type="reset" >Limpiar Campos</button></div>
                    

                        <a href="index.php"><button id="goback"  type="button"><span id="backward">Volver al Home</span></button></a>
    

    </form>

</div>

</main>



<?php require 'footer.php' ?>