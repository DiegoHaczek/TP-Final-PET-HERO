<?php require 'header.php' ?>

<main class="content">

<div id="mainContainer">



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
                        <button class="formButton" type="submit" >Ingresar</button>
                        <button class="formButton" type="reset" >Limpiar Campos</button></div>

                    </fieldset>
                        <a href="index.php"><button id="goback"  type="button"><span id="backward">Volver al Home</span></button></a>

                </form>
 

</div>

<a name="servicios" id="registro"></a>
        <div class="contenedorLista"> 
            <ul>

                <li class="listContent">
                    <img class="listIcon" src="resources/catdog.png">
                    <div class="contenedorTexto">
                        <span>Completa el perfil de tu mascota y <strong>PET HERO</strong> te  mostrará 
                            los Guardianes que mejor se ajusten a sus necesidades.</span></div>
                </li>
                <li class="listContent">
                    <img class="listIcon" src="resources/personhome.png">
                    <div class="contenedorTexto">
                        <span>Regístrate como <strong>Guardián</strong>: dinos qué tipos de mascotas quieres cuidar,
                             tu disponibilidad y paga. <br> !Nosotros haremos el resto! </span></div>
                </li>
                <li class="listContent">
                    <img class="listIcon" src="resources/hombremujer.png">
                    <div class="contenedorTexto">
                        <span>Redacta reviews sobre los Guardianes que hayas contratado y ayuda a otros <strong>Dueños</strong> a
                           tener una mejor experiencia.
                        </div>
                </li>
            
            </ul>
        </div>
</main>



<?php require 'footer.php' ?>