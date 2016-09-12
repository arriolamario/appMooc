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


function insert($tabla, $datos){
    // INSERT INTO table (col1, col2)
    // VALUES ('COL1', 'COL2');
    $query = armarQueryInsertar($tabla, $datos);
    // echo "query $query <br>";
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

function delete($tabla, $datos){
    $query = "DELETE FROM $tabla WHERE " . $datos["columna"] . " = " . $datos["valor"] .";";
    // echo "$query";
    $conn = getConexion();
    mysqli_begin_transaction($conn);
    if(mysqli_query($conn, $query)){
        if (mysqli_affected_rows($conn)>0) {
            // echo "se borro correctamente";
            $retorno = array("success" => true, "retorno" => "Se borro correctamente el " . $datos["valor"]);
        }
        else{
            $retorno = array("success" => true, "retorno" => "No se borro porque no se encontro el " . $datos["valor"]);
        }
        mysqli_commit($conn);
    }
    else{
        // echo "error en la consulta";
        $msg = mysqli_error($conn);
        $nro = mysqli_errno($conn);
        mysqli_rollback($conn);
        $mensaje = "Error numero $nro mensaje $msg";
        $retorno = array("success" => false, "retorno" => $mensaje);
    }
    closeConexion();
    return $retorno;
}

function update($table, $datos, $where){
    $query = armarQueryUpdate($table, $datos, $where);
    
    $conn = getConexion();
    
    mysqli_begin_transaction($conn);
    
    if(mysqli_query($conn, $query)){
        
        if(mysqli_affected_rows($conn) > 0){
            // echo 'se actualizo correctamente <br>';
            $retorno = array("success" => true, "retorno" => 'se actualizo correctamente <br>');
        }else{
            // echo 'no se actualizo <br>';
            $retorno = array("success" => true, "retorno" => 'no se actualizo <br>');
        }
        mysqli_commit($conn);
    }else{
        // echo "error en la consulta";
        $msg = mysqli_error($conn);
        $nro = mysqli_errno($conn);
        mysqli_rollback($conn);
        $mensaje = "Error numero $nro mensaje $msg";

        $retorno = array("success" => false, "retorno" => $mensaje);
    }
    closeConexion();
    return $retorno;
}

function select($table, $datos){
    $query = "SELECT * FROM $table WHERE " . $datos["columna"] . " = " . $datos["valor"] . ";";
    // echo $query;

    $conn = getConexion();

    $resultado = mysqli_query($conn, $query);
    
    closeConexion();
    
    return $resultado;
}

function login($email, $password)
// insertar("usuario", array("id" => array("tipo" => "numero", "valor" => 1), "nombre" => array("tipo" => "string", "valor" => "mario"), "apellido" => array("tipo" => "string", "valor" => "arriola")));

// PRUEBA DE BORRADO
// $resp  = borrar("usuarios",array("columna" => "id", "valor" => 17));

// if ($resp["success"]) {
//     echo $resp["retorno"];
// }
// else {
//     echo $resp["retorno"];
// }
// array("nombre" => "'mario'", "estado" => "1");
// array("id" => "3");d


// actualizar("usuarios",array("nombre" => "'mario'", "estado" => "1"),array("id" => "3", "nombre" => "'lautaro'"));

// select("usuarios", array('columna' => "id", "valor" => 5 ));

?>