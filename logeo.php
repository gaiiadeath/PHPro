<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/phproStyle.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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

  <title>PHPro</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/phproStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
      <a class="nav-link" target="blank" href="index.php">Inicio</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link  dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Nosotros</a>
        <div class="dropdown-menu">
        <a class="dropdown-item " target="blank" href="NosotrosEquipo.php">Equipo PHPro</a>
        <a class="dropdown-item" target="blank" href="NosotrosIntegrantes.php">Integrantes</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
        <div class="dropdown-menu">
        <a class="dropdown-item" target="blank" href="serviciosDW.php">Diseño web</a>
        <a class="dropdown-item" target="blank" href="serviciosDS.php">Desarrollo de software</a>
        <a class="dropdown-item" target="blank" href="serviciosDG.php">Diseño gráfico</a>
        </div>
    </li> 
    <li class="nav-item">
      <a class="nav-link" target="blank" href="contactenos.php">Contáctenos</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" target="blank" href="registro.php">Registro</a>
    </li>
  </ul>
  </ul>
</head>

<?php
include("conn/clases.php");

if (isset($_POST["Salir"])) {
  $email = $_POST["emailLog"];
  $sec = new seguridad();
  $sec->salir($email);
}

if(isset($_POST["Ingresar"])){
  $email = $_POST["email"];
  $password = $_POST["password"];

  $db = new db();
  $db->db_ingresar($email, $password);
  if(isset($_SESSION['logueo'])){

    if(password_verify($password, $_SESSION['password']) && $email == $_SESSION['user']){ ?>
      <header>
        <ul class="nav nav-tabs" id="cuenta">
          <li>
            <label type="text" for="email" class="label" id="label"><?php echo $_SESSION['user'] ?></label>
          </li>         
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="miperfil.php">Mi perfil</a>
              <a class="dropdown-item" href="miscontactos.php">Mis contactos</a>
              <?php if($_SESSION['role'] == 1): ?>
                  <a class="dropdown-item" href="administracion.php">Administración</a>
             <?php endif; ?>
              </div>
          </li>
          <li>
            <form method="POST">
              <input type="email" name="emailLog" id="emailLog" class="form-control" value="<?php echo $_SESSION['user'] ?>">
              <button type="submit" class="btn btn-primary" name="Salir" id="Salir" style="height:42px; width:100px">Salir  <i class="fas fa-sign-out-alt"></i></button>
            </form>     
          </li>
        </ul> 
      </header>
    <?php 
    }elseif($email == $_SESSION['user']){ ?>
      <div class="alert alert-warning container" id="mensajeRecuperar contraseña" align="center">
        <form method="POST">
          <input type="email" name="recuperarPass" id="recuperarPass" style="display: none" value="<?php echo $email ?>">        
          <p>La contraseña no es válida. <br> Si desea recuperarla, por favor dé clic en:</p>
          <a href="rememberPass.php">Recuperar contraseña</a>
        </form>
      </div>
    <?php }else{ ?>
      <div class="alert alert-warning container" id="mensaje">
        <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
        <p>El usuario no está registrado<br> Por favor <a href="logeo.php">inténtelo de nuevo</a> o<a href="registro.php"> regístrese como nuevo usuario</a></p>
      </div>
    <?php }
  }
}else{ ?>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/phproStyle.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

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
        <div class="col-12 user-img">
          <img src="img/login.png"/>
        </div>
        <form class="col-12" method="POST">
          <div class="form-group" id="user-group">
            <input type="email" class="form-control" placeholder="Nombre de usuario" name="email" id="email">
          </div>
          <div class="form-group" id="contrasena-group">
            <input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">
          </div>
          <button type="submit" class="btn btn-primary" name="Ingresar" id="Ingresar"><i class="fas fa-sign-in-alt"></i>  Ingresar</button>
        </form>
        <div class="col-12 forgot">
          <a href="rememberPass.php">Recordar contraseña</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<?php
}
?>