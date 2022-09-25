<?php require 'header.php' ?>
<?php require 'visitornav.php'?>


<main class="content">

<div id="formContainer">



                <form id="registroguardian" action="" class="activo">
                    
                    <fieldset class="formHeader">
                    <h3><p>Registrarse como Guardián</p></h3>
                    </fieldset>

                    <fieldset>
                    <input type="text" name="username" placeholder="Username" autocomplete="off" required></input>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required></input>
                    <input type="password" name="passwordconfirm" placeholder="Confirmar Password" autocomplete="off" required></input>
                    <input type="email" name="email" placeholder="Email" autocomplete="off" required></input>
                    <input type="checkbox" id="checkbox" required></input> <span>He leido y acepto los <a href="#"> términos y condiciones</a></span>

                    
                    <div id="botoneraForm">
                       <button class="formButton" type="submit" > <a href="editarperfil.php">Ingresar</button></a>
                        <button class="formButton" type="reset" >Limpiar Campos</button></div>

                    </fieldset>
                        <a href="index.php"><button id="goback"  type="button"><span id="backward">Volver al Home</span></button></a>

                </form>
 

</div>

<div class="contenedorInfo" id="infoRegistro"><div class="contenedorTexto"><span>Regístrate y completa tu <strong>Perfil</strong> para poder empezar a recibir reservas. <br><br>
 Brindar un buen servicio te hará tener una <strong>Reputación</strong> más alta y mejores ofertas.</span></div></div>

</main>



<?php require 'footer.php' ?>