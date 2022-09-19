function desplegarMenu(){

    var boton = document.getElementById('menuIcon');
    var menu = document.getElementById('unfoldableMenu');
    
    boton.addEventListener('click',function(){
        if(menu.style.left ==='6em'){
    
            menu.style.left = '-15em';
    
        }else{
    menu.style.left = '6em';}
    
    })
    
    }

    /*
function desplegarMenu(){

    var boton = document.getElementById('menuIcon');
    var menu = document.getElementById('unfoldableMenu');
    
    boton.addEventListener('click',function(){
        if(menu.style.display ==="none"){
    
            menu.style.display = "block"; ///no lo despliega, aparece/desaparece
    
        }else{
    menu.style.display = "none";}
    
    })
    
    }*/




