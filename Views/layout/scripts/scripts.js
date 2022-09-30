
function animacionMenu(){

  var boton = document.getElementById('contenedorIcono');
  var animacion =document.getElementById('animacionIcono');
  boton.addEventListener ('mouseover',function(){   

      if (animacion.className="oculto"){

          animacion.classList.toggle('visible');

        }else{
              animacion.classList.toggle('oculto');
          }
})

boton.addEventListener ('mouseout',function(){
  
      animacion.classList.toggle('visible');
      animacion.classList.toggle('oculto'); 
      
})
}

function desplegarMenu(){

  var boton = document.getElementById('contenedorIcono');
  var linea1 = document.getElementById('linea1');
  var linea2 = document.getElementById('linea2');
  var linea3 = document.getElementById('linea3');
  var menu = document.getElementById('unfoldableMenu')
 
  boton.addEventListener ('click',function(){
   
      linea1.classList.toggle('animacionLinea1')
      linea2.classList.toggle('animacionLinea2')
      linea3.classList.toggle('animacionLinea3')
      
      if (menu.className==""){
      menu.classList.toggle('desplegado')
      var animation = function (){
          menu.classList.toggle('rebote');
        }
        setTimeout(animation,850)
  }else{

      menu.className="desplegado";
      setTimeout(function(){
      menu.className="";
      },600)
  }
    })
  }

function stickyNavbar(){

window.onscroll = function() {stickyNavBar()}

var navbar = document.getElementById('navBar');
var sticky = navbar.offsetTop;

function stickyNavBar(){

if (window.scrollY >= sticky) {
    navbar.classList.add("sticky");

}else{
    navbar.classList.remove("sticky");
}

}}

function desplazarHome(){
  
var formulario = document.getElementById('formularioLogin');
var content = document.getElementById('homeContent');
var boton = document.getElementById('botonRegistro');
var botonGoback = document.getElementById('goback');
var contenedor = document.getElementById('homeContainer');

boton.addEventListener('click',desplazar)
botonGoback.addEventListener('click',desplazar)


function desplazar(){


if (content.className=="desplazado"){
  setTimeout(function(){
content.classList.toggle("desplazado");
  },300)}else{

    content.classList.toggle("desplazado");

  }

contenedor.classList.toggle("expanded");
formulario.classList.toggle("homeoculto");
formulario.classList.toggle("homevisible");

}}

function imageSlider(){

const items = document.querySelectorAll('img#imgSlider');
const itemCount = items.length;
const nextItem = document.querySelector('.next');
const previousItem = document.querySelector('.previous');
let count = 0;

function showNextItem() {
  items[count].classList.remove('active');

  if(count < itemCount - 1) {
    count++;
  } else {
    count = 0;
  }

  items[count].classList.add('active');
  console.log(count);
}

function showPreviousItem() {
  items[count].classList.remove('active');

  if(count > 0) {
    count--;
  } else {
    count = itemCount - 1;
  }

  items[count].classList.add('active');
  console.log(count);
}

function keyPress(e) {
  e = e || window.event;
  
  if (e.keyCode == '37') {
    showPreviousItem();
  } else if (e.keyCode == '39') {
    showNextItem();
  }
}

nextItem.addEventListener('click', showNextItem);
previousItem.addEventListener('click', showPreviousItem);
document.addEventListener('keydown', keyPress);
}


