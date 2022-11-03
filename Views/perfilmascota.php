<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<!-- incluyo bootstrap-->
<link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet"/>

<main class="content">

<?php if ($alert!="") {?>

<div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

<?php } ?>

    <div id="mainContainer" class="" style="min-height:10em;width:75em;">

                
        <section style="min-height:35em;width:52em;padding:3em 0 4em 0;position:relative;z-index: 1 !important">
                        
                        <summary><span style=" position:relative; bottom:2em;"><strong> Perfil </span></strong></summary>
                        <div class="sectioncontent" style="height:26em">

                            <div class="profilecard" id="perfilguardian" style="">

                                <div class="mainprofileinfo" >
                                <img class="imgperfilgrande" src="<?php echo FRONT_ROOT.$perfilMascota['foto_perfil'];?>" style="border: 1px solid gray">
                                <span style="margin-top:-2.5em;"><?php echo $perfilMascota['nombreMascota'];?></span>
                                <span style="margin-top:-3em;"><?php echo $perfilMascota['edad'].' años';?></span>
                                    <span></span>
                                </div>

                                <div class="secondaryprofileinfo">

                                    <div class="infopersonal">
                                        <span> Información Guardian</span>
                                        <div class="separador"></div>
                                        <span>Nombre: <strong><?php echo $perfilMascota['nombre_dueno']?></strong></span>
                                        <span>Mail: <strong><?php echo $perfilMascota['email']?></strong></span>
                                    </div>

                                    <div class="infoguardian">

                                        <span>Información Mascota</span>
                                        <div class="separador"></div>
                                        <span>Tamaño Mascota: <strong><?php echo $perfilMascota['tamano']?></strong></span>
                                        <span>Raza: <strong><?php echo ucwords($perfilMascota['raza']); ?></strong></span>
                                        <span>Consideraciones: </span>
                                           
                                       

                                    </div>
                                </div>
                            </div>
                            <button id="solicitar" class="formButton" style="padding:0.3em 1em; position:relative; left:16.2em; bottom:5.2em;">Ver Ficha Médica</button>

                        </div>

                        

        </section>


        <section id="fichamedica" class="fichamedicaoculta" style="width:65em;padding-bottom:4em;">
            <div class="sectioncontent" style="">

                <summary style="margin:2em 0;"><span ><strong> Ficha Médica </span></strong></summary>

                <img class="imgperfilgrande" src="<?php echo FRONT_ROOT.$perfilMascota['ficha_medica'];?>" style="border: 1px solid gray">

                    
                    
        </section>


        <a href="<?php echo FRONT_ROOT."Home/Index"?>">
        <button id="goback" type="button" style="position:relative; right:1.5em; "><span id="backward">Volver al Home</span></button></a>

             
 
</main>

<style>

    label{margin-top:1em;margin-left:1em;}

</style>

<?php require 'datepickervista.php' ?>


<script>



let verFichaMedica = document.getElementById('solicitar');
let contenedorFichaMedica = document.getElementById('fichamedica');



verFichaMedica.addEventListener('click',function(){


    if($("#fichamedica").hasClass("fichamedicaoculta")){

        $("#fichamedica").removeClass("fichamedicaoculta");
        $("#fichamedica").addClass("desplegada");

        setTimeout(function(){

            window.scroll({left: 0, top: document.body.scrollHeight, behavior: "smooth"});

        },330)
        
    }

})


if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}


</script>


<?php require 'footer.php' ?>