<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaLogica/RegistrarIniciar.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaLogica/Funciones/getProvinciaLocalidad.php';
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>	App Mooc</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
	<link rel="stylesheet" href="../css/login.css" type="text/css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<script src="../js/jquery-3.1.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/validacionForm.js"></script>
	<script src="../js/funciones.js"></script>
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
					<li><a><div class="glyphicon glyphicon-user" data-toggle="modal" data-target="#myModalRegistrar"> Registrar</div></a></li>
					<li><a><div class="glyphicon glyphicon-log-in" data-toggle="modal" data-target="#myModalIniciar"> Iniciar Sesion</div></a></li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div id="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
				<li data-target="#myCarousel" data-slide-to="5"></li>
				<li data-target="#myCarousel" data-slide-to="6"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="../images/carrousel/html.jpg">
				</div>
				<div class="item">
					<img src="../images/carrousel/java.jpg">
				</div>
				<div class="item">
					<img src="../images/carrousel/CSharp.png">
				</div>
				<div class="item">
					<img src="../images/carrousel/jquery.png">
				</div>
				<div class="item">
					<img src="../images/carrousel/nodejs.jpg">
				</div>
				<div class="item">
					<img src="../images/carrousel/php.jpg">
				</div>
				<div class="item">
					<img src="../images/carrousel/sql-server.png">
				</div>
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
		<div id="myModalRegistrar" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-3">
								<h4>Registrar</h4>
							</div>
						</div>
					</div>
					<form id="register-form" action="#" method="post" role="form" onsubmit="return validarRegistro()">
						<div class="modal-body">
							<div class="form-group">
								<input required type="text" name="apellido" id="apellido" tabindex="1" class="form-control" placeholder="Apellido" value="">
							</div>
							<div class="form-group">
								<input required type="text" name="nombre" id="nombre" tabindex="1" class="form-control" placeholder="Nombre" value="">
							</div>
							<div class="form-group">
								<input required type="number" name="documento" id="documento" tabindex="1" class="form-control" placeholder="Documento" value="">
							</div>
							<div class="form-group">
								<input required type="date" name="fechaNac" id="fechaNac" tabindex="1" class="form-control" placeholder="Fecha Nacimiento" value="">
							</div>
							<div class="form-group">
								<select name="provincia" id="SelectProvincia" tabindex="1"	class="form-control" aria-placeholder="Provincia" onchange="CargarLocalidades()">
								</select>
							</div>
							<div class="form-group">
								<select name="localidad" id="localidad" tabindex="1" class="form-control" aria-placeholder="Localidad">
								</select>
							</div>
							<div class="form-group">
								<input required type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo Electronico" value="">
							</div>
							<div class="form-group">
								<input required type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
							</div>
							<div class="form-group">
								<input required type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar Contraseña">
							</div>
							<div class="form-group">
								<div class="row">
									<div class="error" id="CartelError"></div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div class="form-group">
								<div class="col-sm-6 col-sm-offset-3">
									<input type="submit" name="registrar" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Registrar">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>		
		<div id="myModalIniciar" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<div class="form-group">
							<div class="col-sm-6 col-sm-offset-3">
								<h4>Iniciar Secion</h4>
							</div>
						</div>
					</div>
					<form id="login-form" action="#" method="post" role="form" onsubmit="return validarFormIniciarSesion()">
						<div class="modal-body">
							<div class="form-group">
								<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Correo Electronico" value="">
							</div>
							<div class="form-group">
								<input type="password" name="password" id="clave" tabindex="2" class="form-control" placeholder="Contraseña">
							</div>
							<div class="form-group text-center">
								<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
								<label for="remember"> Recuérdame</label>
							</div>
						</div>
						<div class="modal-footer">
							<div class="form-group">
								<div class="col-sm-6 col-sm-offset-3">
									<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Acceder">
								</div>
							</div>                    
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div id="footer">
				
	</div>
	<script> CargarProvincias() </script>
</body>
</html>