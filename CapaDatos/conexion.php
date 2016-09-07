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


function insertar($tabla, $datos){
    // INSERT INTO table (col1, col2)
    // VALUES ('COL1', 'COL2');
    $query = "INSERT INTO $tabla ";
    $columna = " (";
    $valores = "VALUES (";
    $primero = true;
    foreach ($datos as $col => $value) {
        if ($primero) {
            $columna = "$columna$col";
            $primero = !$primero;
            if ($value["tipo"] == "string") {
                $valores = "$valores'" . $value["valor"] . "'";
            }elseif ($value["tipo"] == "numero") {
                $valores = "$valores" . $value["valor"] . "";
            }
        }else{
            $columna = "$columna, $col";
            if ($value["tipo"] == "string") {
                $valores = "$valores, '" . $value["valor"] . "'";
            }elseif ($value["tipo"] == "numero") {
                $valores = "$valores, " . $value["valor"] . "";
            }
        }
    }
    $columna = "$columna)";
    $valores = "$valores)";
    $query = "$query $columna $valores;";
    echo "$query <br>";
    echo "$columna <br>";
    echo "$valores <br>";
}

insertar("usuario", array("id" => array("tipo" => "numero", "valor" => 1), "nombre" => array("tipo" => "string", "valor" => "mario"), "apellido" => array("tipo" => "string", "valor" => "arriola")));
?>