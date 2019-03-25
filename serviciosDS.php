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
		    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
		    <div class="dropdown-menu">
				<a class="dropdown-item" href="serviciosDW.php">Diseño web</a>
				<a class="dropdown-item active" href="#">Desarrollo de software</a>
				<a class="dropdown-item" href="serviciosDG.php">Diseño gráfico</a>
		    </div>
		</li>		
		<li class="nav-item">
			<a class="nav-link" href="contactenos.php">Contáctenos</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="registro.php">Registro</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="logeo.php">Logeo</a>
		</li>
	</ul>

	<div>
		<img src="img/bannerDS.png" class="d-block w-100" alt="...">
	</div>

	<div align="center">
		<table border="1" width="900">
			<p>
				Nuestro equipo está comprometido en desarrollar herramientas únicas y enfocadas en las necesidades de nuestros clientes.<br>
				Los desarrollos realizados están a la vanguardia tecnológica, esto nos permite ofrecer todo tipo de soluciones que son escalables y robustas.<br>
				Nuestra base es el modelo tradicional de Desarrollo de Software (Evaluación de necesidades, estudio de viabilidad, diseño, desarrollo, <br>
				pruebas, implementación, capacitación, garantía de soporte y mejoras). <br>
				Desarrollamos en lenguajes de programación tales como: PHP, JAVA, .NET, PHYTON, C#, JavaScript, Assembly language (ASL) <br>
				manejamos los siguientes motores de base de datos: MYSQL, MS SQL Server, PostgreSQL y Oracle. <br>
				Especialistas en Frameworks como: Zend Framework, Phalcon, Yii, Codeigniter, Symfony2, Laravel.
			</p>
		</table>
	</div>      
</body>
</html>