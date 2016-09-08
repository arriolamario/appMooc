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
    // echo "$query <br>";
    // echo "$columna <br>";
    // echo "$valores <br>";
    return $query;
}

?>