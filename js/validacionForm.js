function validarRegistro(){
    var Errores = new Array();
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    var isValido = true;
    var cant = 0;
    
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
    msg += item +"\n";
    return msg;
}