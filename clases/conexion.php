<?php
$mysqli = false;

function getConexion(){
    global $mysqli;
    //CASA
    // $servidor = "localhost";
    // $usuario = "mario";
    // $contraseña = "";
    // $basedatos = "appmooc";
    
    //SMARTIX
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";
    $basedatos = "appmooc";
    
    if($mysqli){
        // echo 'devolvemos la conexion creada<br>';
        return $mysqli;
    } 
    // echo 'creamos la conexion <br>';
    $mysqli = mysqli_connect($servidor, $usuario, $contraseña, $basedatos);
    if (!$mysqli) {
        die('Error de Conexión (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }
    return $mysqli;
}

function closeConexion(){
    global $mysqli;
    if($mysqli != false){
        if (mysqli_close($mysqli)) {
            // echo 'se cerro correctamente la conecion';
        }else{
            // echo 'error al cerrar la conexion';
        }
    }else{
        // echo 'esta cerrada no se cierra';
    }
    $mysqli = false;
}


?>