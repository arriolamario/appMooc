<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Estudiante.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaDatos/conexion.php';
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


    public function login($email, $password){
        $parametros["email"] = "'$email'";
        $parametros["password"] = "'$password'";

        $result = select($this->tabla, $parametros);
        if($result){
            $idRol;
            while($fila = mysqli_fetch_assoc($result)){
                $idRol = $fila["idRol"];
            }

            switch ($idRol) {
                case '1': //
                    # code...
                    break;
                case '2':
                    # code...
                    break;
                case '3':
                    # code...
                    break;
                default:
                    # code...
                    break;
            }
        }
    }



?>