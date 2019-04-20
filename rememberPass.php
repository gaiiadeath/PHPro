<?php 
include('includes/layout/header.php');

if (isset($_POST['Enviar'])) {
	if (!empty($_POST['email'])) {?>
			<div class="alert alert-success container">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<p>La contraseña ha sido enviada satisfactoriamente</p> <?php echo "al correo ". $_POST['email'] ?>
			</div>
	<?php }
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