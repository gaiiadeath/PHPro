<?php 
class email{
	function enviar($paraquien, $asunto, $mensaje, $name, $secondName, $lastName, $secLastName, $email, $password){
		$cabeceras =  'From: bryanstiv10@gmail.com' . "\r\n";
   		$cabeceras .= 'Reply-To: bryanstiv10@gmail.com' . "\r\n";
   		$cabeceras .= 'X-Mailer: PHP/' . phpversion();
 		$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";

		$mensaje = plantilla($paraquien, $asunto, $mensaje);

		mail($emailRecibe, $asunto, $mensaje, $emailEnvia);
		header("Location:email.php")
	}

	function plantilla($paraquien, $asunto, $mensaje, $name, $secondName, $lastName, $secLastName, $email, $password){
		$paraquien = "$name $lastName <$email>";
        $asunto = "Registro Exitoso";
        $mensaje = "
          Hola $name <br>
          Tu registro ha sido exitoso. Bienvenido a nuestro Sitio Web ¡PHPro! <br><br>

          A continuación, una copia de los datos que has suministrado: <br><br>

          Nombres: $name $secondName <br>
          Apellidos: $lastName $secLastName <br>
          Email: $email <br>
          <br>

          Te esperamos pronto. <br><br>

          El equipo de PHPro";





?>
		<!DOCTYPE html>
		<html>
		<head>
			<title>Correo PHPro</title>
			<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		</head>
		<body>
			<div class="cuerpoEmail" align="center">
				<table>
					<tr>
						<!-- encabezado -->
						<td width="500px" height="180px" style="background-color: #8EB0F3">	
							<center>
								<a href="../index.php"><img src="../img/Logo.png" width="120"></a>
							</center>
							<p align="center" style="font-size: 2em; font-family: Helvetica; color: #0A265B"><strong>¡Bienvenid@!</strong></p>
						</td>
					</tr>

					<tr>
						<!-- cuerpo -->
						<td width="500px" height="300px">
							<p style="margin-left: 2em">
								Acá viene el mensaje que queremos mostrar
							</p>
						</td>
					</tr>

					<tr>
						<!-- pie -->
						<td width="500px" height="80px" style="background-color: #0A265B">
							<p align="center" style="font-family: Helvetica; color: white">
								<strong>PHP</strong>ro  |  Pensando en un futuro
							</p>
						</td>
					</tr>
				</table>
			</div>
		</body>
		</html>
<?php






	}
}	
?>