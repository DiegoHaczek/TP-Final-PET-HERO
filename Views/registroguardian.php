<?php require 'header.php' ?>
<?php require 'visitornav.php'?>


<main class="content">

<div id="formContainer">


                <form id="registroguardian" action="<?php echo FRONT_ROOT."Guardian/Add"?>" class="activo" method = "post">
                    
                    <fieldset class="formHeader">
                    <h3><p>Registrarse como Guardián</p></h3>
                    </fieldset>

                    <fieldset>
                    <input type="email"    name="mail" placeholder="Email" autocomplete="off" required></input>
                    <input type="password" id = "password" name="password" placeholder="Password" autocomplete="off" required></input>
                    <input type="password" id = "passwordconfirm" name="passwordconfirm" placeholder="Confirmar Password" autocomplete="off" style="margin-bottom:1em;"required></input>
                    <input type="checkbox" id = "checkbox" required></input> <span style="margin-left:-0.5em;">He leido y acepto los <a href="#"> términos y condiciones</a></span>
                    <!--<input type="hidden"   id = "tipo" name = "tipo" value = "dueno"></input> -->
                    
                    <div id="botoneraForm" style="margin-top:0em;">
                       <button class="formButton" type="submit" > Ingresar</button>
                        <button class="formButton" type="reset" >Limpiar Campos</button></div>

                    </fieldset>
                    <a href="<?php echo FRONT_ROOT."Home"?>"><button id="goback"  type="button"><span id="backward">Volver al Home</span></button></a>

                </form>
 

</div>

<div class="contenedorInfo" id="infoRegistro"><div class="contenedorTexto"><span>Regístrate y completa tu <strong>Perfil</strong> para poder empezar a recibir reservas. <br><br>
 Brindar un buen servicio te hará tener una <strong>Reputación</strong> más alta y mejores ofertas.</span></div></div>

</main>



<?php require 'footer.php' ?>