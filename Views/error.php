<?php require_once 'validate-session.php'?> 

<?php require 'header.php' ?>
<?php require 'usernav.php'?>

<main class="content">

<?php if ($alert!="") {?>

<div id="alert" class="<?php echo $alert['tipo'] ?>"><span><strong><?php echo $alert['mensaje']?></strong></span></div>

<?php } ?>

    <div id="mainContainer" class="" style="min-height:20em;min-width:75em;">

                
        <section style="min-height:10em;min-width:30em;padding:3em 0 4em 0;position:relative;z-index: 1 !important">
                        
                        <h1><span style=" position:relative; right:1em;"><strong> Error 404 </span></strong></h1>
                        
        </section>

</main>


<script>


if (!$("#alert").hasClass("")){

$("#alert").animate({bottom:"3%"},{duration:800}).delay(1000).animate({bottom:"-8%"},{duration:800});

}


</script>


<?php require 'footer.php' ?>