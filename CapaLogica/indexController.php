<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Estudiante.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Administrador.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Profesor.php';
    session_start();

    function CargarBarraIzquierda(){
        
    }


    function CargarBarraDerecha(){
        if($_SESSION["login"]){
            $usario = $_SESSION["usuario"];
            $idRol = $usario->getIdRol();
            $nombre = $usario->getNombre();
            $apellido = $usario->getApellido();
            
            switch($idRol){
                case '1':
                    echo "<li><a><div> Administrador </div></a></li>";
                    break;
                case '2':
                    echo "<li><a><div> Profesor </div></a></li>";
                    break;
                case '3':
                    echo "<li><a><div> Estudiante </div></a></li>";
                    break;
            }
            echo "<li><a><div> $apellido $nombre</div></a> </li>";
            echo "<li><a onclick=\"LogOut()\"><div class=\"glyphicon glyphicon-log-out\" data-toggle=\"modal\" data-target=\"#myModalLogout\"> Salir</div></a></li>";

        }else{
          echo "<li><a><div class=\"glyphicon glyphicon-user\" data-toggle=\"modal\" data-target=\"#myModalRegistrar\"> Registrar</div></a></li>";
		  echo "<li><a><div class=\"glyphicon glyphicon-log-in\" data-toggle=\"modal\" data-target=\"#myModalIniciar\"> Iniciar Sesion</div></a></li>";
        }
    }


    
?>