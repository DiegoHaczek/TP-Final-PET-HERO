<?php require 'header.php'?>
<?php require 'visitornav.php'?>

    <a name="home"></a>
    <main class="content">

    <?php if ($alert!="") {?>

    <div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

    <?php } ?>

        <div id="homeContainer">
            <div id="homeContent" class="">

           <h2><p>Bienvenido a PET HERO</p></h2> 

           <div class="contenedorTexto"><br>
           <span>Este sitio está destinado a comunicar Dueños de
            mascotas con Guardianes que puedan cuidar de ellas durante
            el tiempo requerido por una tarifa a convenir. 
           </span><br><br>
           <span>¡Puedes generar reviews y compartir tus experiencias
            con otros dueños!
           </span></div>

                <div class="botonera">
                    <a href="<?php echo FRONT_ROOT."Home/registroDueno"?>"><button class="buttonHome">Regístrate como Dueño</button></a>
                    <a href="<?php echo FRONT_ROOT."Home/registroGuardian"?>"><button class="buttonHome">Regístrate como Guardián</button></a>
                </div>
                <button class="buttonHome" id="botonRegistro">Loguearse</button>

            </div>

            <div id="formularioLogin"   class="homeoculto">

                <form id="login" action="<?php echo FRONT_ROOT."Home/Login"?>" method="post">
                    
                    <fieldset class="formHeader">
                    <h3><p>Ingrese sus Datos</p></h3>
                    </fieldset>

                    <fieldset>
                    <input type="email" name="mail" placeholder="Email" autocomplete="off" required></input>
                    <input type="password" name="password" placeholder="Password" autocomplete="off"required></input>
                    
                    <div id="botoneraForm">
                        <button class="formButton" type="submit" >Ingresar</button>
                        <button class="formButton" type="reset" >Limpiar Campos</button></div>

                    </fieldset>
                        <button id="goback"  type="button"><span id="backward">Volver al Home</span></button>

                </form>
            </div>
            
            <div id="formularioguardian"></div>
        </div>

        <a name="servicios"></a>
        <div class="contenedorLista"> 
            <ul>

                <li class="listContent">
                    <img class="listIcon" src="<?php echo IMG_PATH;?>catdog.png">
                    <div class="contenedorTexto">
                        <span>Completa el perfil de tu mascota y <strong>PET HERO</strong> te  mostrará 
                            los Guardianes que mejor se ajusten a sus necesidades.</span></div>
                </li>
                <li class="listContent">
                    <img class="listIcon" src="<?php echo IMG_PATH;?>personhome.png">
                    <div class="contenedorTexto">
                        <span>Regístrate como <strong>Guardián</strong>: dinos qué tipos de mascotas quieres cuidar,
                             tu disponibilidad y paga. <br> !Nosotros haremos el resto! </span></div>
                </li>
                <li class="listContent">
                    <img class="listIcon" src="<?php echo IMG_PATH;?>hombremujer.png">
                    <div class="contenedorTexto">
                        <span>Redacta reviews sobre los Guardianes que hayas contratado y ayuda a otros <strong>Dueños</strong> a
                           tener una mejor experiencia.
                        </div>
                </li>
            
            </ul>
        </div>
        
        <a name="galeria"></a>
        <div id="sliderHeader">
            <div class="contenedorTexto">
                <span><strong>Nuestra Galeria:</strong></span>
        <br><span><a href="#home">¡Únete  ya mismo </a>y empieza a formar parte de esta gran comunidad!</span></div>
        </div>
        <div class="contenedorSlider">
            <div class="slider">
                <img id="imgSlider" class="active" src="https://i.postimg.cc/j2q6LpyL/mascotas0.jpg">
                <img id="imgSlider" src="https://i.postimg.cc/7Y6MDyxR/mascotas1.jpg">
                <img id="imgSlider" src="https://i.postimg.cc/sDNPg0xg/mascotas2.jpg">
                <img id="imgSlider" src="https://i.postimg.cc/MKFBPYjr/mascotas4.jpg">
            </div>
            <nav class="slider-nav">
              <ul>
                <li class="arrow">
                  <button class="previous">
                    <span>
                        <img class="arrowIcon" id="left" src="<?php echo IMG_PATH;?>rightarrow.png">
                    </span>
                  </button>
                </li>
                <li class="arrow">
                  <button class="next">
                    <span>
                        <img class="arrowIcon" src="<?php echo IMG_PATH;?>rightarrow.png">
                    </span>
                  </button>
                </li>
              </ul>
            </nav>
          </div>
        
    </main>

    <script>



if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}

</script>

    <?php require 'footer.php'?>