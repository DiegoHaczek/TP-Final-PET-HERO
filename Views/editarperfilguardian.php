<?php require 'header.php' ?>
<?php require 'visitornav.php'?>


<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<!-- incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>main.css">  <!--lo sobreescribo con mi css (que ya incluí en el header) porque me lo modifica-->
<link rel="stylesheet" href="<?php echo CSS_PATH;?>override.css">

<main class="content">

<div id="formContainer">

    <form id="editarperfil" action="<?php echo FRONT_ROOT."Guardian/EditProfile"?>" method="post" class="activo">
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

                <fieldset>
                <label title="Selecciona entre Disponibilidad Plena o Personalizada" for="disponibilidad"><strong><span>Disponibilidad</span></strong></label><br>
                <label for="plena" ><span>Plena</span></label>
                <input   type="radio" name="disponibilidad" id="plena" value="plena" checked required>
                <label for="finesdesemana" ><span>Fines de Semana</span></label>
                <input   type="radio" name="disponibilidad" id="finesdesemana" value="finesdesemana"><br>
                <label for="personalizada" ><span>Personalizada</span></label>
                <input  class="" type="radio" name="disponibilidad" id="personalizada" >
                 
                <div class="container" style="width:100%"><!-- ubicarlo dentro de 'container' -->
                    <input style="border: 1px solid rgba(64, 114, 8, 0.1) !important; border-radius: 3%; background-color:
                     rgba(235, 241, 146, 0.733); margin-left:-1em; margin-top:0.1em;"
                      type="text" class="form-control date" placeholder="Selecciona fechas disponibles" name="disponibilidad" id="calendario" autocomplete="off"
                     data-date-start-date="0d" data-date-end-date="+1m"  required disabled readonly><br>  <!-- setearle que 1.empiece a partir de hoy
                                                                                                                            2.termine en un mes
                                                                                                                            4. required ANTES del readonly (re, dis,read)
                                                                                                                            3. readonly para que no se pueda editar por teclado-->

                </div>
                </fieldset>

                <fieldset>
                    <label for="tipoperro"><strong><span>Tipo de Perro:</span></strong></label><br>
                    <label for="grande" class="labelcheckbox"><span>Grande</span></label>
                    <input id="checkbox" type="checkbox" name="tipoperro[]" id="grande" value="Grande">
                    <label for="mediano" class="labelcheckbox"><span>Mediano</span></label>
                    <input id="checkbox" type="checkbox" name="tipoperro[]" id="mediano" value="Mediano">
                    <label for="chico" class="labelcheckbox"><span>Chico</span></label>
                    <input id="checkbox" type="checkbox" name="tipoperro[]" id="chico" value="Chico">
                </fieldset>
                

                <fieldset>
                    <label for="remuneracion"><strong><span>Remuneración</span></strong></label><br>
                    <input type="number" name="remuneracion" class="number" placeholder="$ARS" min="400"></input>
                    <span>(Calculada en pesos argentinos por día.)</span>
                </fieldset>
              
                    <div id="botoneraForm">
                        <button class="formButton" type="submit">Guardar Info</button>
                        <button class="formButton" type="reset" >Limpiar Campos</button></div>
                    
                        <a href="../index.php"><button id="goback"  type="button"><span id="backward" >Volver al Home</span></button></a>
    

    </form>

</div>

</main>


<?php require 'datepicker.php' ?>
<?php require 'footer.php' ?>