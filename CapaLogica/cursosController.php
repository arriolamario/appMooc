<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Estudiante.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Profesor.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/Clases/Administrador.php';
    session_start();

    function CargarBarraDerecha(){
        if($_SESSION["login"]){
          $usario = $_SESSION["usuario"];
          $idRol = $usario->getIdRol();
          switch($idRol){
                case '1':
                    menuAdmministrador();
                    break;
                case '2':
                    menuProfesor();
                    break;
                case '3':
                    menuEstudiante();
                    break;
            }
        }
    }


    function CargarBarraIzquierda(){
        if($_SESSION["login"]){
            $usario = $_SESSION["usuario"];
            $nombre = $usario->getNombre();
            $apellido = $usario->getApellido();

            echo "<li><a><div> $apellido $nombre</div></a> </li>";
            echo "<li><a onclick=\"LogOut()\"><div class=\"glyphicon glyphicon-log-out\" data-toggle=\"modal\" data-target=\"#myModalLogout\"> Salir</div></a></li>";

        }else{
          echo "<li><a><div class=\"glyphicon glyphicon-user\" data-toggle=\"modal\" data-target=\"#myModalRegistrar\"> Registrar</div></a></li>";
		  echo "<li><a><div class=\"glyphicon glyphicon-log-in\" data-toggle=\"modal\" data-target=\"#myModalIniciar\"> Iniciar Sesion</div></a></li>";
        }
    }



    function menuAdmministrador(){
        echo " <li class='dropdown'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Menu
                        <span class='caret'></span></a>
                        <ul class='dropdown-menu'>
                        <li><a href='#'>Administradores</a></li>
                        <li><a href='#'>Profesores</a></li>
                        <li><a href='#'>Estudiantes</a></li> 
                        <li><a href='#'>Cursos</a></li> 
                        </ul>
                    </li>";
    }

    function menuProfesor(){
        
    }
    
    function menuEstudiante(){
        
    }


?>