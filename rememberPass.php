<?php 
class email{
	function enviar($paraquien, $asunto, $mensaje, $motivo){
		$paraquien = $paraquien;
		$asunto = $asunto;
		$mensaje = $mensaje;
		$motivo = $motivo;

		$cabeceras =  'From: bryanstiv10@gmail.com' . "\r\n";
   		$cabeceras .= 'Reply-To: bryanstiv10@gmail.com' . "\r\n";
   		$cabeceras .= 'X-Mailer: PHP/' . phpversion();
 		$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";

		$mensaje = plantilla($paraquien, $asunto, $mensaje, $motivo);
		mail($emailRecibe, $asunto, $mensaje, $emailEnvia);
		header("Location:index.php");
	}

	function plantilla($paraquien, $asunto, $mensaje, $motivo){
		$paraquien = $paraquien;
		$asunto = $asunto;
		$mensaje = $mensaje;
		$motivo = $motivo;
		
		if (strtoupper($motivo)=="CONTACTO") {
			$Encabezado = "¡Gracias por su interes!";
			$Cuerpo = "$mensaje";
		} elseif (strtoupper($motivo)=="REGISTRO") {
			$Encabezado = "¡Bienvenid@ a PHPro!";
			$Cuerpo = "$mensaje";
		} elseif (strtoupper($motivo)=="RECORDAR") {
			$Encabezado = "Recordatorio de contraseña";
			$Cuerpo = "$mensaje";
		}
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
							<p align="center" style="font-size: 2em; font-family: Helvetica; color: #0A265B"><strong> <?php echo "$Encabezado"; ?> </strong></p>
						</td>
					</tr>

					<tr>
						<!-- cuerpo -->
						<td width="500px" height="300px">
							<p style="margin-left: 2em">
								<?php echo "$Cuerpo"; ?>
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