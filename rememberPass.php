<?php 
include('includes/layout/header.php');
include("conn/clases.php");

$passAleatoria = "";
$passEnctipt = "";
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
} 

function validarCorreo($email){
  $db = new db();
  $sql = "SELECT email FROM usuarios WHERE email = '$email'";
  $result = $db->db_sql($sql);
  if ($result->num_rows == 1) {
    //usuario encontrado
    $passAleatoria = generateRandomString();
    $passEnctipt = password_hash($passAleatoria, PASSWORD_DEFAULT);


    $sql = "UPDATE usuarios SET password = '$passEnctipt' WHERE email = '$email'";
    $db->db_sql($sql);
    return $passAleatoria;
  }
}

if (isset($_POST['Enviar'])) {
	if (!empty($_POST['email'])) {
    $passAleatoria = validarCorreo($_POST['email']);
    if(!is_null($passAleatoria)){
      //Enviar correo
      $paraquien = $_POST['email'];
      $asunto = "Recuperación de contraseña";
      $mensaje = "
        La contraseña temporal es $passAleatoria<br>
        Nuevamente te esperamos pronto. <br><br>

        El equipo de PHPro";
      $db = new db();
      $db->enviar($paraquien,$asunto,$mensaje);
      echo $mensaje;      
?>
			<div class="alert alert-success container">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>La contraseña ha sido enviada satisfactoriamente <?php echo "al correo ". $_POST['email'] ?></p>
			</div>
<?php    
      } else {
      ?>
      <div class="alert alert-success container">
          <p>El correo <?php echo $_POST['email'] . " no es valido" ?></p>
      </div>
      <?php
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Logeo</title>

  <!--JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <!--SOPORTE DE BOTAS DE MARCO para el estilo de la pagina-->
  <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  
  <!--Los iconos tipo Solid de Fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!--Nuestro css-->
  <link rel="stylesheet" type="text/css" href="css/index.css" th:href="@{/css/index.css}">
</head>

<body>
  <div class="modal-dialog text-center">
    <div class="col-sm-8 main-section">
      <div class="modal-content">
        <div>
          <p class="text" id="correo">Digite su correo y posteriomente le enviaremos la nueva contraseña</p>
        </div>
        <form class="col-12" method="POST">
          <div class="form-group" id="user-group">
            <input type="email" class="form-control" placeholder="ejemplo@correo.com" name="email" id="email" required="true">
          </div>
          <button type="submit" class="btn btn-primary" name="Enviar" id="Enviar">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>