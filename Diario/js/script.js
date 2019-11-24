/* para el funcionamiento del banner interactivo de la portada */
function show(ruta){ 
    var img_grande = document.getElementById("img-grande"); 
    img_grande.setAttribute("src", ruta);    
}

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
