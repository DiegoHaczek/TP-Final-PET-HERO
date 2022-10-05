<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<!-- incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>

<main class="content">

    <div id="mainContainer" class="">

                
    <section style="width:52em;padding:3em 0 4em 0">
                        
                        <summary><span style=" position:relative; bottom:2em;"><strong> Mi Perfil </span></strong></summary>
                        <div class="sectioncontent">

                            <div class="profilecard">

                                <div class="mainprofileinfo">
                                    <img class="imgperfilgrande" src="<?php echo IMG_PATH;?>avatardefault.png">
                                    <span>Nombre</span>
                                    <span>Apellido</span>
                                    <span>Reputacion</span>
                                    <span>7/10</span>
                                </div>

                                <div class="secondaryprofileinfo">

                                    <div class="infopersonal">
                                        <span> Información Personal</span>
                                        <div class="separador"></div>
                                        <span> Edad:</span>
                                        <span> Email:</span>
                                    </div>

                                    <div class="infoguardian">

                                        <span>Información Guardián</span>
                                        <div class="separador"></div>
                                        <span>Tipo de Perro:</span>
                                        <span>Remuneración por Día:</span>
                                        <span>Disponibilidad:</span>
                                           
                                        <?php //include "../procesos/calculardisponibilidad.php" ?>

                                        <div class="container" style="width:26%;">
                                                <input style="border: 1px solid rgba(64, 114, 8, 0.1); position:relative; top:14.5em; right:20.6em; !important; border-radius: 3%; background-color:
                                                rgba(235, 241, 146, 0.733);"
                                            type="text" class="form-control date" placeholder="Ver fechas" name="fechas" id="calendario" autocomplete="off"
                                            data-date-start-date="0d" data-date-end-date="+1m" value="" required readonly><br> 
                                            </div>

                                        <button class="formButton" style="padding:0.3em 1em; position:relative; top:9em; right:3em">Editar</button>
                                        

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section>
                    <div class="sectioncontent">

                    <summary><span><strong> Próximas Reservas </span></strong></summary>
                    <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre Dueño</span></th><th><span>Nombre</span></th><th><span>Tamaño</span></th> 
                        <th><span>Días</span></th><th><span>Fecha</span></th></tr>
                        <tr class="espacio"><td></td></tr>
                        
                        <tr><td>
                        <img  class ="imgperfilchica" src="https://www.hola.com/imagenes/mascotas/20190820147813/razas-perros-pequenos-parecen-grandes/0-711-550/razas-perro-pequenos-grandes-m.jpg">
                        </td><td><span>Juan Ramirez</span></td><td><span>Black</span></td><td><span>Grande</span></td><td><span>3</span></td><td><span>06/9</span></td>
                        <td><button class="formButton" type="submit" >Cancelar</button><button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td><img  class ="imgperfilchica" src="https://www.purina-latam.com/sites/g/files/auxxlc391/files/styles/large/public/quiero%20sacar%20una%20buena%20fotografia%20de%20mi%20perro%201_0.png">
                        </td><td><span>Pedro Perez</span></td><td><span>Pluto</span></td><td><span>Mediano</span></td><td><span>5</span></td><td><span>07/10</span></td>
                        <td><button class="formButton" type="submit" >Cancelar</button><button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td><img class="imgperfilchica" src="https://www.hola.com/imagenes/mascotas/20210917196118/razas-perro-de-campo-y-de-ciudad/0-994-933/perro-campo-m.jpg"></td>
                        <td><span>Leo Jara</span></td><td><span>Cachito</span></td><td><span>Mediano</span></td><td><span>11</span></td><td><span>21/9</span></td>
                        <td><button class="formButton" type="submit" >Cancelar</button><button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td><img  class ="imgperfilchica" src="https://dojiw2m9tvv09.cloudfront.net/32548/product/coolingmattecuadradaazul-cama7229.jpg"></td>
                        <td><span>Marcelo Funes</span></td><td><span>Tomi</span></td><td><span>Chico</span></td><td><span>4</span></td><td><span>1/10</span></td>
                          <td>  <button class="formButton" type="submit" >Cancelar</button><button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        </table>

                    </div>
                     </section>

                           
               <section>
                    <div class="sectioncontent">
                            
                        <summary><span><strong>Reservas Pendientes</strong></span></summary>
                        <table>
                        
                        <tr> <th><span>Foto</span></th> <th><span>Nombre Dueño</span></th><th><span>Nombre</span></th><th><span>Tamaño</span></th> 
                        <th><span>Días</span></th><th><span>Fecha</span></th></tr>
                        <tr class="espacio"><td></td></tr>
                        
                        <tr><td>
                        <img  class ="imgperfilchica" src="https://www.hola.com/imagenes/mascotas/20190820147813/razas-perros-pequenos-parecen-grandes/0-711-550/razas-perro-pequenos-grandes-m.jpg">
                        </td><td><span>Juan Ramirez</span></td><td><span>Black</span></td><td><span>Grande</span></td><td><span>3</span></td><td><span>06/9</span></td>
                        <td><button class="formButton" type="submit" >Aceptar</button><button class="formButton" type="submit" >Cancelar</button>
                        <button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td><img  class ="imgperfilchica" src="https://www.purina-latam.com/sites/g/files/auxxlc391/files/styles/large/public/quiero%20sacar%20una%20buena%20fotografia%20de%20mi%20perro%201_0.png">
                        </td><td><span>Pedro Perez</span></td><td><span>Pluto</span></td><td><span>Mediano</span></td><td><span>5</span></td><td><span>07/10</span></td>
                        <td><button class="formButton" type="submit" >Aceptar</button><button class="formButton" type="submit" >Cancelar</button>
                        <button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td><img class="imgperfilchica" src="https://www.hola.com/imagenes/mascotas/20210917196118/razas-perro-de-campo-y-de-ciudad/0-994-933/perro-campo-m.jpg"></td>
                        <td><span>Leo Jara</span></td><td><span>Cachito</span></td><td><span>Mediano</span></td><td><span>11</span></td><td><span>21/9</span></td>
                        <td><button class="formButton" type="submit" >Aceptar</button><button class="formButton" type="submit" >Cancelar</button>
                        <button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        <tr><td><img  class ="imgperfilchica" src="https://dojiw2m9tvv09.cloudfront.net/32548/product/coolingmattecuadradaazul-cama7229.jpg"></td>
                        <td><span>Marcelo Funes</span></td><td><span>Tomi</span></td><td><span>Chico</span></td><td><span>4</span></td><td><span>1/10</span></td>
                          <td>  <button class="formButton" type="submit" >Aceptar</button><button class="formButton" type="submit" >Cancelar</button>
                          <button class="formButton" type="submit" >Ver info Completa</button></td></tr>
                        <tr class="espacio"><td></td></tr>

                        </table>
                        
                    </div>
                    </section>

    </div>

</main>

<?php require 'datepickervista.php' ?>


<script>

$('.date').datepicker('setDatesDisabled',fechasNoDisponiblesJS);  //funcion de datepicker que setea fechas no disponibles
                                                                    //el dueño solo puede elegir de entre las fechas seleccionadas por el guardian
    </script>


<?php require 'footer.php' ?>