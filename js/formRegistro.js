
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
        let nombre = document.getElementById('Rnombre').value;
        let pais = document.getElementById('Rpais').value;
        let email = document.getElementById('Rcorreo').value;
        let usuario = document.getElementById('Rcuenta').value;
        let ciudad = document.getElementById('Rciudad').value;
        let direccion = document.getElementById('Rdireccion').value;
        let cp = document.getElementById('Rcp').value;
        let recuperar = document.getElementById('Rrecuperar').value;
        
    
        const regNombre = /^[a-zA-ZÁ-ÿ\s]{3,50}$/;
        const regUser = /^[a-zA-Z0-9]{4,10}$/;
    
        if( nombre!='' && pais!='' && email!='' && usuario!='' && direccion!='' && cp!='' && recuperar!=''){
            if(regNombre.test(nombre) && regUser.test(usuario)){
                return true;
            }
        }
        return false;
    
}

document.getElementById('validar').addEventListener('click', function (){
    const error = document.getElementById('failed');
 
    if(validarContra() && validarCampos()){
        document.getElementById('enviar').classList.remove('d-none');
        error.innerText='';
    }else{
        error.innerText='Hay campos incompletos o con valores incorrectos'
    }



});


