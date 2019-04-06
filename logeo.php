<?php 
include("includes/layout/header.php");
include("conn/clases.php");

if(isset($_POST["Ingresar"])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $db = new db();
  $result = $db->db_sql($sql);

  if(is_object($result)){
    $row = $result->fetch_assoc();
    if(password_verify($password, $row['password'])){ ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Bienvenido!</strong> <?php echo "<br>". $row['nombre1'] . " " . $row['apellido1'] ?>
      </div>
    <?php }else{ ?>
      <div class="alert alert-warning alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p>El usuario o contraseña son inválidos.<br> Por favor inténtelo nuevamente o<a href="registro.php"> regístrese como nuevo usuario</a></p>        
      </div>
    <?php }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


  <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container">
      <br>
      <h2>Ingresar</h2>
      <div class="row">
        <div class="col-4">
          <br>
          <br>
          <form action="logeo.php" method="post">
            <div class="form-group">
              <label for="email">Dirección de Correo</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresa el Correo" name="email" required="true" autofocus="true">
              <small id="emailHelp" class="form-text text-muted">La dirección de correo es secreta</small>
            </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control" id="password" placeholder="contraseña" name="password" required="true">
            </div>
            <button type="submit" class="btn btn-primary" name="Ingresar">Ingresar</button>
          </form>
        </div>
      </div>
    </div>
</body>
</html>