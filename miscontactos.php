<?php 
include("includes/layout/header.php");
include("conn/clases.php");
if(isset($_GET['email'])){
    $email = $_GET['email'];
    $sql = "SELECT * FROM contacto";
    $db = new db();
    $result = $db->db_sql($sql);
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
</head>
<header>
        <ul class="nav nav-tabs" id="cuenta">
          <li>
            <label type="text" for="email" class="label" id="label"><?php echo $email ?></label>
          </li>
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="miperfil.php?email=<?php echo $email ?>">Mi perfil</a>
              <a class="dropdown-item" href="miscontactos.php?email=<?php echo $email ?>">Mis contactos</a>
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
<body>
<div class="container form-group">
<?php
  while ($contacto = $result->fetch_assoc()){ ?>
      <div class="row">
        <div class="col-10">
          <br><br>
            <h4>Contacto: </h4>
            <p><?php echo $contacto['contacto_Id'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-6">
            <h4>Asunto: </h4>
            <p><?php echo $contacto['asunto'] ?></p>
        </div>
        <div class="col-6">
            <h4>Fecha: </h4>
            <p><?php echo $contacto['fecha'] ?></p>
        </div>
      </div>
      <div>
        <a href="#victorModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Ver mensaje</a>
      </div>
    
      <!-- Modal / Ventana / Overlay en HTML -->
      <div id="victorModal" class="modal fade">
        <div class="modal-dialog">
          <div class="row modal-content">
            <div class="modal-body">
              <div class="col-10">
                <h4>Contacto: </h4>
                <p><?php echo $contacto['contacto_Id'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <h4>Asunto: </h4>
                <p><?php echo $contacto['asunto'] ?></p>
              </div>
              <div class="col-6">
                <h4>Fecha: </h4>
                <p><?php echo $contacto['fecha'] ?></p>
              </div>
            </div>
            <div>
              <h4>Mensaje: </h4>
              <p><?php echo $contacto['mensaje'] ?></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
        <?php }?>
  </div>
</body>
</html>