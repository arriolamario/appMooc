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
    if($res) {
        session_start();
        $_SESSION["login"] = true;
        $_SESSION["usuario"] = $usuario;
        header('Location: homeEstudiante.php');
    }
}

if(isset($_POST["iniciar"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $u = new Usuario($email, $password);
}



?>