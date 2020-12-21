document.getElementById('validar').addEventListener('click', function (){
    const error = document.getElementById('failed');

    if(validarContra() && validarCampos()){
        document.getElementById('enviar').classList.remove('d-none');
        error.innerText='';
    }else{
        error.innerText='Hay campos incompletos o con valores incorrectos'
    }



});

function validarContra(){
    const c1 = document.getElementById('contra').value;
    const c2 = document.getElementById('recontra').value;
    const msg = document.getElementById('msg');
    
    if(c1 === c2){
        msg.innerHTML = '';
        return true;
    }else{
        msg.innerHTML = '';
        msg.innerHTML = 'No hay coincidencia entre contraseñas';
        return false;
    }
}

function validarCampos(){
    const nombre = document.getElementById('nombre').value;
    const pais = document.getElementById('pais').value;
    const email = document.getElementById('correo').value;
    const usuario = document.getElementById('usuario').value;
    const ciudad = document.getElementById('ciudad').value;
    const direccion = document.getElementById('direccion').value;
    const cp = document.getElementById('cp').value;
    const recuperar = document.getElementById('recuperar').value;
    

    const regNombre = /^[a-zA-ZÁ-ÿ\s]{3,50}$/;
    const regUser = /^[a-zA-Z0-9]{4,10}$/;

    if( nombre!='' && pais!='' && email!='' && usuario!='' && ciudad!='' && direccion!='' && cp!='' && recuperar!=''){
        if(regNombre.test(nombre) && regUser.test(usuario)){
            return true;
        }
        else{
        }
    }
    return false;

}

