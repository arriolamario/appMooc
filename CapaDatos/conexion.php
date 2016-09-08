<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/appMooc/Funciones/funciones.php');
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


function insertar($tabla, $datos){
    // INSERT INTO table (col1, col2)
    // VALUES ('COL1', 'COL2');
    $query = armarQueryInsertar($tabla, $datos);
    $retorno;
    $conn = getConexion();
    // echo "query: $query <br>";
    mysqli_begin_transaction($conn);
    if(mysqli_query($conn, $query)){
        // echo 'se agrego correctamente <br>';
        $id = mysqli_insert_id ($conn);
        mysqli_commit($conn);
        $retorno = array("success" => true, "retorno" => $id);
    }
    else{
        // echo 'error <br>';
        $msg = mysqli_error($conn);
        $nro = mysqli_errno($conn);
        mysqli_rollback($conn);
        $retorno = array("success" => false, "retorno" => "Error numero $nro mensaje $msg");
    }
    closeConexion();
    return $retorno;
}

// insertar("usuario", array("id" => array("tipo" => "numero", "valor" => 1), "nombre" => array("tipo" => "string", "valor" => "mario"), "apellido" => array("tipo" => "string", "valor" => "arriola")));
?>