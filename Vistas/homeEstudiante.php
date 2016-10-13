<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Estudiante.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Administrador.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Profesor.php';
    session_start();
    $usuario = $_SESSION["usuario"];
    echo $usuario->getNombre();
?>