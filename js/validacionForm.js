function validarFormRegistrar(){
    var Errores = new Array();
    var apellido = document.getElementById("apellido").value;
    var nombre = document.getElementById("nombre").value;
    var documento = document.getElementById("documento").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var isValido = true;
    var cant = 0;
    if(apellido === null || apellido.length === 0) {
        Errores[cant++] = 'Campo apellido obligatorio';
        isValido = false;
    }
    if(nombre === null || nombre.length === 0) {
        Errores[cant++] = 'Campo nombre obligatorio';
         isValido = false;
    }
    if(documento === null || documento.length === 0) {
        Errores[cant++] = 'Campo documento obligatorio';
         isValido = false;
    }
    if(email === null || email.length === 0) {
        Errores[cant++] = 'Campo email obligatorio';
         isValido = false;
    }
    if(password === null || password.length === 0) {
        Errores[cant++] = 'Campo password obligatorio';
         isValido = false;
    }
    if(confirmPassword != password) {
        Errores[cant++] = 'No coinciden las contraseñas';
         isValido = false;
    }

    if(!isValido){
        var listaErrores = "";
        for (i = 0; i < Errores.length; i++) { 
            listaErrores += Errores[i] + "<br/>";
        }
        // documento.getElementById("CartelError").style.display = block;
        document.getElementById("CartelError").innerHTML = listaErrores;
    }

    return isValido;

}

function AgregarErrores(item){
    var msg = "";
    msg += itemi +"\n";
    return msg;
}