<?php

function armarQueryInsertar($tabla, $datos){
    $query = "INSERT INTO $tabla ";
    $columna = " (";
    $valores = "VALUES (";
    $primero = true;
    foreach ($datos as $col => $value) {
        if ($primero) {
            $columna = "$columna$col";
            $primero = !$primero;
            $valores = "$valores$value";
        }else{
            $columna = "$columna, $col";
            $valores = "$valores, $value";
        }
    }
    $columna = "$columna)";
    $valores = "$valores)";
    $query = "$query $columna $valores;";
    // echo "$query <br>";
    // echo "$columna <br>";
    // echo "$valores <br>";
    return $query;
}

function armarQueryUpdate($table, $datos, $where){
    $query = "UPDATE $table SET ";
    $primero = true;
    foreach ($datos as $col => $valor) {
        if ($primero) {
            $query = "$query $col = $valor";
            $primero = !$primero;
        } else {
            $query = "$query, $col = $valor";
        }
    }
    $primero = !$primero;
    foreach ($where as $col => $valor) {
        if ($primero) {
            $query = "$query WHERE $col = $valor"; 
            $primero = !$primero;
        } else {
            $query = "$query AND  $col = $valor";
        }
    }
    $query = "$query;";
    return $query;
}

?>