<!DOCTYPE html>
<html>
<head>
	<title>PHPro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/phproStyle.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div align="center" style="margin-top: 15px">
		<header>
			<img src="img/Logo.png" width="150">
		</header>    
	</div>
	
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a class="nav-link" href="index.php">Inicio</a>
		</li>
		<li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Nosotros</a>
		    <div class="dropdown-menu">
				<a class="dropdown-item" href="NosotrosEquipo.php">Equipo PHPro</a>
				<a class="dropdown-item" href="NosotrosIntegrantes.php">Integrantes</a>
		    </div>
		</li>
		<li class="nav-item dropdown">
		    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
		    <div class="dropdown-menu">
				<a class="dropdown-item" href="serviciosDW.php">Diseño web</a>
				<a class="dropdown-item" href="serviciosDS.php">Desarrollo de software</a>
				<a class="dropdown-item" href="serviciosDG.php">Diseño gráfico</a>
		    </div>
		</li>	
		<li class="nav-item">
			<a class="nav-link active" href="contactenos.php">Contáctenos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="registro.php">Registro</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logeo.php">Logeo</a>
		</li>
	</ul>	
	
	<?php
		include("conn/clases.php");
		$db = new db();

		if (isset($_GET['accion'])) {
			if ((is_null($email) || empty($email))
				&& ()
				&& ()
				&& ()
				&& ()
				&& ()
				) {
				
			}

			$email = $_POST['email'];
			$nombre1 = $_POST['nombre1'];
			$nombre2 = $_POST['nombre2'];
			$apellido1 = $_POST['apellido1'];
			$apellido2 = $_POST['apellido2'];
			$ciudad = $_POST['ciudad'];
			$asunto = $_POST['asunto'];
			$mensaje = $_POST['mensaje'];

			$sql = 	"INSERT INTO contacto ('email', 'nombre1', 'nombre2', 'apellido1', 'apellido2', 'ciudad', 'asunto', 'mensaje', 'fecha')
					VALUES (".$email.", ".$nombre1.", ".$nombre2.", ".$apellido1.", ".$apellido2.", ".$ciudad.", ".$asunto.", ".$mensaje." , "..")";
		}
		echo $sql;
	?>

	<div id="formulario">
		<form action="?accion" method="post">
			<div class="form-group">
				<label for="email">Correo</label>
				<input type="email" class="form-control" id="email" placeholder="ejemplo@dominio.com" name="email">
			</div>
			<div class="form-group">
				<label for="nombre1">Primer Nombre</label>
				<input type="text" class="form-control" id="nombre1" placeholder="Juan" name="nombre1">
			</div>
			<div class="form-group">
				<label for="nombre2">Segundo Nombre</label>
				<input type="text" class="form-control" id="nombre2" placeholder="Carlos" name="nombre2">
			</div>
			<div class="form-group">
				<label for="apellido1">Primer Apellido</label>
				<input type="text" class="form-control" id="apellido1" placeholder="Toro" name="apellido1">
			</div>
			<div class="form-group">
				<label for="apellido2">Segundo Apellido</label>
				<input type="text" class="form-control" id="apellido2" placeholder="Mesa" name="apellido2">
			</div>
			<div class="form-group">
				<label for="ciudad">Ciudad</label>
				<input type="text" class="form-control" id="ciudad" placeholder="Medellín" name="ciudad">
			</div>
			<div class="form-group">
				<label for="asunto">Asunto</label>
				<input type="text" class="form-control" id="asunto" placeholder="Solicito servicio" name="asunto">
			</div>
			<div class="form-group">
				<label for="mensaje">Mensaje</label>
				<textarea class="form-control" id="mensaje" rows="3" placeholder="Acá se especifica lo solicitado" name="mensaje"></textarea>
			</div>

			<button type="submit" class="btn btn-primary">Enviar</button>
		</form>
	</div>
</body>
</html>