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

//para manejar la zona de comentarios
async function doPostComentario(){
    
     var nombre = document.getElementById('nombre').value;
     var comentario = document.getElementById('comentario').value;
 
     const params = new URLSearchParams();
     params.append('noticia_id', '1'); //HARDCODEADO POR EL MOMENTO
     params.append('nombre', nombre);
     params.append('comentario', comentario);
     
     var respuesta =  await axios.post("#", params);
         
     if(respuesta.data==""){
         return;
     }    
     
     var nuevoComentario = document.createElement('div');
     nuevoComentario.className = "comentario";
     nuevoComentario.innerHTML = respuesta.data;
 
     var contenedor = document.getElementById('contenedor-comentarios');
     contenedor.insertBefore(nuevoComentario ,  contenedor.firstChild);
     
     
 }
