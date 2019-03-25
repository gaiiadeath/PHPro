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
				<a class="dropdown-item" href="serviciosDS.php">Desarrollo de software</a>
				<a class="dropdown-item active" href="#">Diseño gráfico</a>
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
		<img src="img/bannerDG.png" class="d-block w-100" alt="...">
	</div>

	<div id="listaDG" align="center">
		<table border="1" width="900">
			<p>
				El diseño gráfico es uno de los puntos fuertes de nuestro estudio. Websmultimedia ofrece un amplio abanico de servicios gráficos <br>
				creativos entre los que destacamos: <br><br>
			</p>
		</table>
		<ul>
			<strong>
			<li>Diseño logotipos</li>
			<li>Diseño catálogo</li>
			<li>Diseño tarjeta</li>
			<li>Diseño corporativo</li>
			<li>Diseño de folletos</li>
			<li>Diseño cartel</li>
			<li>Diseño etiquetas</li>
			<li>Publicidad en exterior</li>
			<li>Diseño flyer</li>
			<li>Ilustración</li>
		</strong>
		</ul>
	</div>     
      
</body>
</html>