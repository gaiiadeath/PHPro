<?php
session_start();
include("conn/clases.php");

if (isset($_SESSION['logueo'])) {
  $email = $_SESSION['email'];
  $password = $_SESSION['password'];
  $nombre1 = $_SESSION['nombre1'];
  $nombre2 = $_SESSION['nombre2'];
  $apellido1 = $_SESSION['apellido1'];
  $apellido2 = $_SESSION['apellido2'];
  $fecha_registro = $_SESSION['fecha_registro'];
  $estado = $_SESSION['estado'];
  $fecha_acceso = $_SESSION['fecha_acceso'];
  $rol = $_SESSION['rol'];
  $acceso = $_SESSION['acceso'];

  if (isset($_POST['newPassbtn'])) {
    $pass = $_POST["currPass"];
    $old_pass = $row["password"];
    $new_pass = $_POST["newPass"];
    if(password_verify($pass, $old_pass)){
        $pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);
        $sql = "UPDATE usuarios SET password = '$pass_hash' WHERE email = '$email'";
        $result = $db->db_sql($sql);
        ?>
        <div class="alert alert-success container">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>La contraseña ha sido cambiada con éxito </strong>
        </div>
        <?php
    }
  }

  if (isset($_POST["updateData"])) {
    $edad = $_POST ["edad"];
    $sexo = $_POST["sexo"];
    $profesion = $_POST["profesion"];
    $db = new db();
    $sql = "UPDATE usuarios SET edad = '$edad', sexo = '$sexo', profesion='$profesion' WHERE email = '$email'";
    $result = $db->db_sql($sql);
    ?>
        <div class="alert alert-success container">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>La información adicional se ha modificado con éxito </strong>
        </div>
    <?php
  }

?>
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
          <a class="nav-link dropdown-toggle" target="blank" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Servicios</a>
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

  <?php if(isset($email)): ?>
  <header>
          <ul class="nav nav-tabs" id="cuenta">
            <li>
              <label type="text" for="email" class="label" id="label"><?php echo $email ?></label>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="miperfil.php">Mi perfil</a>
                <a class="dropdown-item" href="miscontactos.php">Mis contactos</a>
                <?php if($rol == 1): ?>
                    <a class="dropdown-item" href="administracion.php">Administración</a>
                <?php endif; ?>                
              </div>
            </li>
            <li>
              <form action="logeo.php" method="POST">
                <input type="email" name="emailLog" id="emailLog" class="form-control" value="<?php echo $email ?>">
                <button type="submit" class="btn btn-primary" name="Salir" id="Salir" style="height:42px; width:100px">Salir  <i class="fas fa-sign-out-alt"></i></button>
              </form>     
            </li>
          </ul> 
        </header>
  <?php endif; ?>
  <body>
  <div class="container form-group">
<?php
    if(isset($email)){?>
        <div class="row">
            <div class="col-10">
                <h4>Correo: </h4>
                <p><?php echo $email ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h4>Primer Nombre: </h4>
                <p><?php echo $nombre1 ?></p>
            </div>
            <div class="col-6">
                <h4>Segundo Nombre: </h4>
                <p><?php echo $nombre2 ?></p>
                </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h4>Primer Apellido: </h4>
                <p><?php echo $apellido1 ?></p>
            </div>
            <div class="col-6">
                <h4>Segundo Apellido: </h4>
                <p><?php echo $apellido2 ?></p>
                </div>
        </div>
        <div class="row">
            <div class="col-4">
                <h4>Fecha registro: </h4>
                <p><?php echo $fecha_registro ?></p>
            </div>
            <div class="col-4">
                <h4>Estado: </h4>
                <p><?php echo $estado ?></p>
            </div>
            <div class="col-4">
                <h4>Fecha último Acceso: </h4>
                <p><?php echo $fecha_acceso ?></p>
                </div>
        </div>

        <button class="btn btn-info" onclick="showNewPassForm()">Modificar contraseña</button>

        <script>
            function showNewPassForm(){
                $("#newpassform").show();
            }

            function hideNewPassForm(){
                $("#newpassform").hide();
            }
        </script>

        <div id="newpassform" class="moda modificar-pass" style="position: absolute;top: 0;background: #ededed;padding: 25px;border-radius: 7px; display:none;">
        <form method="POST">
            <h3>Formulario de modificación de contraseña</h3>
            <div class="form-group">
            <label for="currPass">Contraseña Actual</label>
            <input type="password" name="currPass" id="currPass" class="form-control">        
            </div>

            <div class="form-group">
            <label for="newPass">Contraseña Nueva</label>
            <input type="password" name="newPass" id="newPass" class="form-control">
            </div>
            <button type="submit" class="btn btn-danger" name="newPassbtn" id="newPassbtn">Enviar</button>
            </form>
            <button class="btn btn-info" onclick="hideNewPassForm()">Cancelar</button>
        </div>

            <h3>Información complementaria</h3>

            <form method="POST">
            <div class="form-group">
            <label for="edad">Edad</label>
                <input type="number" class="form-control" name="edad" id="edad">
                </div>
                <div class="form-group">
            <label for="sexo">Sexo</label>
                <select name="sexo" id="sexo">
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
                </div>
                <div class="form-group">
            <label for="profesion">Profesion</label>
                <input type="text" name="profesion" id="profesion" class="form-control">
                </div>
                <button class="btn btn-info" name="updateData" id="updateData">Enviar</button> 
            </form>
          <?php }?>          
        </div>
      </div>
    </div>
  </body>
  </html>
<?php
}else{
  echo "Sesión cerrada";
}

?>