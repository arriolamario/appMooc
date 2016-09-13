<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Administrador.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Alumno.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Profesor.php';
function login($email, $password){
    $resultado = select("usuarios",getArray($email, $password));
    $retorno;
    if(mysqli_num_rows($resultado) == 1){
        $usuario;
        $fila = mysqli_fetch_assoc($resultado);
        if($fila["estado"] == 0){ return array("success" => false, "mensaje" => "Usuario inabilitado");} 
        if($fila["tipoUsuario"] == "ADMINISTRADOR"){$usuario = new Administrador($fila["id"]);}
        if($fila["tipoUsuario"] == "ALUMNO"){$usuario = new Alumno($fila["id"]);}
        if($fila["tipoUsuario"] == "PROFESOR"){$usuario = new Profesor($fila["id"]);}
        $retorno = array("success" => true, "usuario" => $usuario);
    }else{
        $retorno = array("success" => false, "mensaje" => "Login incorrecto");
    }

    return $retorno;
}

function getArray($email, $password)
{
    return array("email" => "'$email'",
                 "password" => "'$password'"
                );
}
?>