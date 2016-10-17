<?php
	include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaLogica/cursosController.php';
	include_once $_SERVER['DOCUMENT_ROOT'] . '/appMooc/CapaLogica/RegistrarIniciar.php';
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
	<script src="../js/ProvinciaLocalidad.js"></script>
	<script src="../js/LoginError.js"></script>

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
						<li><a href="#">Home</a></li>
						<li class="active"><a href="#">Cursos</a></li>
						<?php CargarBarraDerecha(); ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php CargarBarraIzquierda(); ?>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<div id="container">
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
								<input required type="text" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo Electronico" value="">
							</div>
							<div class="form-group">
								<input required type="password" name="password" id="clave" tabindex="2" class="form-control" placeholder="Contraseña">
							</div>
							<div class="form-group text-center">
								<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
								<label for="remember"> Recuérdame</label>
							</div>
						</div>
						<div class="modal-footer">
							<div class="form-group">
								<div class="col-sm-6 col-sm-offset-3">
									<input type="submit" name="iniciar" id="iniciar" tabindex="4" class="form-control btn btn-login" value="Acceder">
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
</body>
</html>