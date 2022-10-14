<header><h1><p><br>Pet Hero</p></h1>
       
       <nav id="navBar">
         
          <div id="navBarContent">


                <div id="contactIcons">
                <a href="#"><img class="icon" src="<?php echo IMG_PATH;?>facebook.png"></a>
                <a href="#"><img class="icon" src="<?php echo IMG_PATH;?>instagram.png"></a>
                <a href="#"> <img class="icon" src="<?php echo IMG_PATH;?>twitter.png"></a>
                </div>

                    
                <div id="userInfo">
                <img class="imgperfilchica" src="<?php echo IMG_PATH;?>avatardefault.png">
                </div>

                <span>Bienvenido, <?php echo ucwords($_SESSION['loggedUser']);?> </span>

                <div id="contenedorIcono">
                <span id="linea1" class=""></span>
                <span id="linea2" class=""></span>
                <span id="linea3" class=""></span>
                <div id="animacionIcono" class="oculto" ></div>

               </div>
                
                </div>

               <div id="unfoldableMenu">
                   <ul>

                       <li><a href="<?php echo FRONT_ROOT."Home/Index"?>"><span class="textmenu">Home</span></a></li>
                       
                       <?php if($_SESSION['type']=='g'){?>
                       <li><a href="#"?><span class="textmenu">Mi Perfil</span></a></li> 
                       <?php } ?>

                       <?php if($_SESSION['type']=='d'){?>
                       <li><a href="<?php echo FRONT_ROOT."Mascota/ShowListView"?>"><span class="textmenu">Mis Mascotas</span></a></li> 
                       <?php } ?>
                       
                       <li><a href="#"><span class="textmenu">Mis Reservas</span></a></li>

                       <?php if($_SESSION['type']=='d'){?>
                       <li><a href="<?php echo FRONT_ROOT."Guardian/ShowListView"?>"><span class="textmenu">Guardianes</span></a></li>
                       <?php } ?>


                       <li><a href="<?php echo FRONT_ROOT."Home/Logout"?>"><span class="textmenu">Cerrar Sesión</span></a></li>

                   </ul>
               </div>
           </div>
       </nav>
   </header>