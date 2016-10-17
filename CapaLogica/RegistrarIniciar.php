<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Estudiante.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Administrador.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Profesor.php';

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
        Redirecionar($usuario);
    }
}

if(isset($_POST["iniciar"])){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $usuario = login($email,$password);
    if($usuario){
        Redirecionar($usuario);
    }else{
        echo "<script>alert(\"Login Incorrecto\")</script>";
    }
}


function login($email, $password){
    $parametros["email"] = "'$email'";
    $parametros["password"] = "'$password'";

    $result = select("usuario", $parametros);
    $retorno = false;
    if($result){
        if(mysqli_num_rows($result) > 0 ){
            while($fila = mysqli_fetch_assoc($result)){
                $idRol = $fila["idRol"];
                $idUsuario = $fila["id"];
            }

            switch ($idRol) {
                case '1': 
                    $retorno = new Administrador($idUsuario);
                    break;
                case '2':
                    $retorno = new Profesor($idUsuario);
                    break;
                case '3':
                    $retorno = new Estudiante($idUsuario);
                    break;
                default:
                    $retorno = false;
                    break;
            }
        }else{
            $retorno = false;
        }
    }
    return $retorno;
}


function Redirecionar($usuario){
    session_start();
    $_SESSION["login"] = true;
    $_SESSION["usuario"] = $usuario;
    header('Location: index.php');
}

function LogOut(){
    $_SESSION["login"] = false;
    $_SESSION["usuario"] = null;
}




?>