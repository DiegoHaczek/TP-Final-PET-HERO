<!--Coloco aca lo que requiere el datepicker para funcionar, asi no lo incluyo en toda la aplicacion ni en la vista-->

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script  src="../js/datepicker.js"></script>

<script> //javascript

let calendario = document.getElementById('calendario'); //logica para deshabilitar el datepicker cuando no esta seleccionado el radio

let personalizada = document.getElementById('personalizada');
let plena =document.getElementById('plena');
let finesdesemana =document.getElementById('finesdesemana');

personalizada.addEventListener('click',function(){
  
    $("#calendario").prop( "disabled", false );
})

plena.addEventListener('click',function(){
  
    $('.date').datepicker('setDates', [""]);
    $("#calendario").prop( "disabled", true );
})

finesdesemana.addEventListener('click',function(){

    $('.date').datepicker('setDates', [""]);
    $("#calendario").prop( "disabled", true );
})
    
</script>
