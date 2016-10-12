<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Estudiante.php';
    session_start();
    $usuario = $_SESSION["usuario"];
    echo $usuario->getNombre();
?>