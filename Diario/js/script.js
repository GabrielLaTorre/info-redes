/* para el funcionamiento del banner interactivo de la portada */

window.addEventListener('load', function () {

     var img_s = document.getElementsByClassName('img-s');
     var img_g = document.getElementById('img-gr');
     var slideIndex = 0;
     var i;
     
     setInterval(function () {
          console.log(slideIndex, img_s.length);
          img_g.setAttribute('src', img_s[slideIndex].getAttribute('src'));     
        
          slideIndex++;
          if (slideIndex >= img_s.length){
               slideIndex = 0;
          }
     },4000);
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
