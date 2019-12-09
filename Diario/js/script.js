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

 async function funcionLoca(){

    var datos = await axios.get("https://newsapi.org/v2/top-headlines?country=ar&apiKey=b19f312ca38140d0a4b9e36eb6275e00");

    var arraydatos = [];
    arraydatos = datos.data.articles;
    
    arraydatos.map( async (art) => {
        var contenido = art.content + art.content + art.content
        + art.content+ art.content+ art.content+ art.content+ art.content+ art.content+ art.content
        + art.content;

        const params = new URLSearchParams();
        params.append('titulo', art.title);
        params.append('subtitulo', art.description);
        params.append('contenido', contenido);
        params.append('genero_id', "1");
        params.append('autor_id', "1");
        params.append('imagen', art.urlToImage);
   
   
       var respuesta =  await axios.post("carga_noticias_falsas.php",params);
   
       console.log(respuesta.data);

    });

    window.location.assign( window.location.href );
    
 }
