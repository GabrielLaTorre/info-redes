function desplegarForm(){
    var div_oculto = document.getElementById("form-oculto");
    if( div_oculto.classList.contains('oculto') ){
        div_oculto.classList.remove('oculto');
    }else{
        div_oculto.classList.add('oculto');
    }
}
