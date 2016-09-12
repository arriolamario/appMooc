<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/conexion.php';
function($email, $password){
    $resultado = select($table, $datos);
    $retorno;
    if(mysqli_num_rows($resultado) == 1){
        $fila = mysqli_fetch_assoc($resultado);
        if($fila["tipoU"])
    }else{
        $retorno = false;
    }

    return $retorno;
}
?>