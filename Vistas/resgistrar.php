<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaLogica/registrar.php';
?>

<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>	App Mooc</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" href="../css/login.css" type="text/css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/login.js"></script>
	<script src="../js/validacionForm.js"></script>
</head>
<body>
    <div id="header">
        <div class="clearfix">
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">App Mooc</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Cursos</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrar </a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion </a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div id="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <form id="register-form" action="#" method="post" role="form" onsubmit="return validarFormRegistrar()">
                    <div class="form-group">
                        <input type="text" name="apellido" id="apellido" tabindex="1" class="form-control" placeholder="Apellido" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Nombre" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="documento" id="documento" tabindex="1" class="form-control" placeholder="Documento" value="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo Electronico" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar Contraseña">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="error" id="CartelError"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6 col-sm-offset-3">
                            <input type="submit" name="registrar" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registrar">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
    <div id="footer">
    </div>
</body>
</html>