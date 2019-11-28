/* para el funcionamiento del banner interactivo de la portada */

window.addEventListener('load', function () {
     let container = document.getElementById('banner-container');
     var img_s = document.getElementsByClassName('img-s');

     var img_g = document.getElementById('img-gr');

     function autoSlide() {
          img_g.setAttribute('src', img_s[1].getAttribute('src'));
     };
     //autoSlide();
})


/*function show(ruta){ 
    var img_grande = document.getElementById("img-grande"); 
    img_grande.setAttribute("src", ruta);    
}*/


 /* para esconder el menu*/
function hideWhenClick(){
    var menu = document.getElementById('menu-lateral');
    var fondo = document.getElementById('fondo');

   if(menu.classList.contains('mostrar')){
        fondo.classList.remove('mostrar-fondo');
        menu.classList.remove('mostrar');
   }else{
        fondo.classList.add('mostrar-fondo');
        menu.classList.add('mostrar');
   };

}
