//Observaciones: recuerda, esto se ejecuta en el navagador. Las rutas al servidor deben ser absolutas
//               tipo "http://"... 

const service_comment = "../backend/comentario_service.php";

async function doPostComentario(){
    
    var nombre = document.getElementById('nombre').value;
    var comentario = document.getElementById('comentario').value;

    const params = new URLSearchParams();
    params.append('noticia_id', '1'); //HARDCODEADO POR EL MOMENTO
    params.append('nombre', nombre);
    params.append('comentario', comentario);
    
    var respuesta =  await axios.post(service_comment, params);
        
    if(respuesta.data==""){
        return;
    }    
    
    var nuevoComentario = document.createElement('div');
    nuevoComentario.className = "comentario";
    nuevoComentario.innerHTML = respuesta.data;

    var contenedor = document.getElementById('contenedor-comentarios');
    contenedor.insertBefore(nuevoComentario ,  contenedor.firstChild);
    
    
}

