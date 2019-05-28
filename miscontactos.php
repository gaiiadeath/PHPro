<?php 
session_start();
if (isset($_SESSION['logueo'])) {
  $email = $_SESSION['user'];
  $rol = $_SESSION['rol'];
  //include("includes/layout/header.php");
  include("conn/clases.php");
  $sql = "SELECT * FROM contacto ORDER BY fecha";
  $db = new db();
  $result = $db->db_sql($sql);
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
  <body>
  <div class="container form-group">
  <?php
  $i = 0;
  ?>
  <style>
    th, td {
        border: 1px solid #acacac;
        padding: 10px;
    }
  </style>

  <div class="container" >
  <br> <br>
  <h1>Mensajes</h1>
  <br><br>
      <table>
        <tr>
          <th>Número mensaje</th>
          <th>Asunto</th>
          <th>Fecha recibido</th>
          <th>Ver detalles</th>
        </tr>
    <?php while ($contacto = $result->fetch_assoc()){ 
      $i++?>
        <tr>
          <td><?php echo $i ?></td>
          <td><?php echo $contacto['asunto'] ?></td>
          <td><?php echo $contacto['fecha']?></td>
          <td>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="<?php echo "#Modal$i"?>">
              + Detalles
            </button>
          </td>
        </tr>    
        
          <!-- Modal -->
          <div class="modal fade" id="<?php echo "Modal$i"?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo "Mensaje Id: ".$contacto['contacto_Id'] ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                 Mensaje #: <?php echo $i ?> <br>
                 Asunto: <?php echo $contacto['asunto'] ?> <br>
                 Fecha: <?php echo $contacto['fecha'] ?> <br>
                 Mensaje: <br>
                 <?php echo $contacto['mensaje'] ?><br>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        </table>
    </div>
  </body>
  </html>
<?php 
}else {
  echo "sesión cerrada";
} ?>