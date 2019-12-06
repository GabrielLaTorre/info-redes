function desplegarForm(){
    var div_oculto = document.getElementById("form-oculto");
    if( div_oculto.classList.contains('oculto') ){
        div_oculto.classList.remove('oculto');
    }else{
        div_oculto.classList.add('oculto');
    }
}

//prevista para la imagen de perfil
function previewFile() {
    var preview = document.getElementById('img-edit');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();
  
    reader.onloadend = function () {
      preview.src = reader.result;
    }
  
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.src = "";
    }
  }


  //para manejar el borrado de registro
  async function borrarRegistro( id ){

    const params = new URLSearchParams();
    params.append('id', id); //HARDCODEADO POR EL MOMENTO

    var respuesta =  await axios.post("#", params);

    if(respuesta.status == 200){
      window.location.assign( window.location.href );
    }

  }
