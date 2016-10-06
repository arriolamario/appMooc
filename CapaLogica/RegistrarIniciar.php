<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Alumno.php';
if(isset($_POST["registrar"]))
{
    $apellido = $_POST["apellido"];
    $nombre = $_POST["nombre"];
    $documento = $_POST["documento"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $fechaNacimiento = $_POST["fechaNac"];

    $alumno = new Alumno($nombre, $apellido, $email, $password, $documento);

    $res = $alumno->grabar();
    if($res){
        echo "Se registro";
    }else{
        echo "No se registro";
    }
}



?>