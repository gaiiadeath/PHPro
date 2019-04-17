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
		    <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Nosotros</a>
		    <div class="dropdown-menu">
				<a class="dropdown-item active" href="#">Equipo PHPro</a>
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
		<?php
			include("conn/clases.php");
			$db = new db();

			$sql = "SELECT * FROM perfilequipo WHERE idequipo = 'PPI620304'";
			$result = $db->db_sql($sql);
			$row = $result->fetch_assoc();
		?>
		<!-- Imprimir ruta de imágen de equipo -->
		<?php
			echo "<img src='img/" . $row['foto'] . "' class='d-block w-100' alt='...'>";
		?>

	</div>

	<div align="center">
		

		<table id="TablaEquipo" border="1" width="900">
			<tr>
				<td id="FilaPrincipal">Identificación</td>
				<td> <?php echo $row['idequipo']; ?></td>
			</tr>

			<tr>
				<td id="FilaPrincipal">ID de equipo</td>
				<td> <?php echo $row['idequipo']; ?></td>
			</tr>

			<tr>
				<td id="FilaPrincipal">Nombre Equipo</td>
				<td> <?php echo $row['nombre']; ?></td>
			</tr>

			<tr>
				<td id="FilaPrincipal">Descripción del perfil del Equipo</td>
				<td> <?php echo $row['perfil']; ?></td>
			</tr>

			<tr>
				<td id="FilaCol" colspan="2" align="center">Habilidades</td>
			</tr>
			<tr>
				<td id="FilaPrincipal">Habilidad 1</td>
				<td> <?php echo $row['habilidad01']; ?>% de habilidad</td>
			</tr>
			<tr>
				<td id="FilaPrincipal">Habilidad 2</td>
				<td> <?php echo $row['habilidad02']; ?>% de habilidad</td>
			</tr>
			<tr>
				<td id="FilaPrincipal">Habilidad 3</td>
				<td> <?php echo $row['habilidad03']; ?>% de habilidad</td>
			</tr>
			<tr>
				<td id="FilaPrincipal">Habilidad 4</td>
				<td> <?php echo $row['habilidad04']; ?>% de habilidad</td>
			</tr>
			<tr>
				<td id="FilaPrincipal">Habilidad 5</td>
				<td> <?php echo $row['habilidad05']; ?>% de habilidad</td>
			</tr>
			
			<tr>
				<td id="FilaCol" colspan="2" align="center">Información de contacto del equipo</td>
			</tr>
			<tr>
				<td id="FilaPrincipal">Correo</td>
				<td> <?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td id="FilaPrincipal">Número de contato</td>
				<td> <?php echo $row['telefono']; ?></td>
			</tr>
		</table>
	</div>	
      
</body>
</html>