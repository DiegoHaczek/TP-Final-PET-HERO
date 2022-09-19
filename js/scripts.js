function desplegarMenu(){

  var boton = document.getElementById('menuIcon');
  var menu = document.getElementById('unfoldableMenu');
  
  boton.addEventListener('click',function(){
      

    menu.classList.toggle('desplegado');
  
  })
  
}
/*
function desplegarMenu(){

  var boton = document.getElementById('menuIcon');
  var menu = document.getElementById('unfoldableMenu');
  
  boton.addEventListener('click',function(){
      if(menu.style.left ==='6em'){
  
          menu.style.left = '-15em';
  
      }else{
  menu.style.left = '6em';}
  
  })
  
}*/

function animation(){

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

content.classList.toggle("desplazado");
contenedor.classList.toggle("expanded");
formulario.classList.toggle("oculto");
formulario.classList.toggle("visible");


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


