<?php 
class email{
	function enviar($paraquien, $asunto, $mensaje){
		$cabeceras =  'From: bryanstiv10@gmail.com' . "\r\n";
   		$cabeceras .= 'Reply-To: bryanstiv10@gmail.com' . "\r\n";
   		$cabeceras .= 'X-Mailer: PHP/' . phpversion();
 		$cabeceras .= 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf8' . "\r\n";

		mail($emailRecibe, $asunto, $mensaje, $emailEnvia);
		header("Location:index.php");
	}
}	
?>