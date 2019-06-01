<?php 
session_start();
if (isset($_SESSION['logueo'])) {
  $email = $_SESSION['user'];
  $rol = $_SESSION['role'];
  //include("includes/layout/header.php");
  include("conn/clases.php");
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
          <label type="text" for="email" class="label" id="label"><?php echo $_SESSION['user'] ?></label>
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

  <?php
  $db = new db();
  $sql = "SELECT * FROM `usuarios`";
  $result = $db->db_sql($sql);
  ?>

  <style>
  th, td {
      border: 1px solid #acacac;
      padding: 10px;
  }
  </style>

  <div class="container" >
  <br> <br>
  <h1>Administración de Usuarios</h1>
  <br> <br>
  <table>
      <tr>
          <th>id</th>
          <th>Nombre</th>
          <th>Email</th>
          <th>Rol</th>
          <th>Estado</th>
          <th>Acceso</th>
          <th>Último Acceso</th>
          <th>Activar/Desactivar</th>
      </tr>

  <?php 
  $count = 0;
  while($row = $result->fetch_assoc()): 
      $count++;
  ?>
  <tr>
      <td><?php echo $count; ?></td>
      <td><?php echo $row['nombre1'] . " "
      . (isset($row['nombre2']) ? $row['nombre2']: "" ) . " "
      . (isset($row['apellido1']) ? $row['apellido1']: "" ) . " "
      . (isset($row['apellido2']) ? $row['apellido2']: "" ) . " "
      ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['rol']; ?></td>
      <td><?php echo ($row['estado']== 1 ? "Activo" : "Inactivo"); ?></td>
      <td><?php echo ($row['acceso']== 1 ? "Si" : "No" ); ?></td>
      <td><?php echo $row['fecha_acceso']; ?></td>
      <td><button class="btn btn-danger changeUser" data-email="<?php echo $row['email']; ?>" data-state="<?php echo $row['estado'];?>">
          <?php echo ($row['estado']== 1 ? "Desactivar" : "Activar"); ?>
      </button></td>
      </tr>
  <?php endwhile;?>
  </table>


  <script>

  function ChangeUser(){
      $(".changeUser").click(function() {
          var email = $(this).data('email');
          var state = $(this).data('state');
          ChangeStUser(email, state)
      });
  };

  function ChangeStUser(user, state){
      $.ajax({
          type: 'POST',    
          url:'/cambiarestadousuario.php',
          data:'user='+ user+'&state='+ state,
          success: function(msg){
              location.reload();
          },
          error: function(msg){
              alert('Ocurrió un error ' + msg);
              console.log(msg);
          }
      });
  };
  ChangeUser();
      
  </script>


  </div>
<?php
}else {
  echo "Sesión cerrada";
}
?>