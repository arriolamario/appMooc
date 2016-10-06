<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';

function getProvincias(){
    $result = select('provincia');

    while ($fila = mysqli_fetch_assoc($result)) 
    {
        $codigo = $fila["id"];
        $provincia = $fila["nombre"];

        echo "<option value='$codigo'>$provincia</option>";
    } 
}
?>