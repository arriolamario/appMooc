<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Estudiante.php';
if(isset($_POST["registrar"]))
{
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fechaNacimiento = $_POST["fechaNac"];
    $provincia = $_POST["provincia"];
    $localidad = $_POST["localidad"];

    $usuario = new Estudiante($nombre, $apellido, $email, $password, $provincia, $localidad, $documento, $fechaNacimiento);

    $res = $usuario->grabar();
    if($res) header('Location: homeEstudiante.php');
}



?>