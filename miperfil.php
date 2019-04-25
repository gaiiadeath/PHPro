<?php 
include("includes/layout/header.php");
include("conn/clases.php");

if (isset($_POST['newPassbtn'])) {
    if(isset($_GET['email'])){
        $email = $_GET['email'];
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $db = new db();
        $result = $db->db_sql($sql);
        if(is_object($result)){
            $row = $result->fetch_assoc();
            $pass = $_POST["currPass"];
            $old_pass = $row["password"];
            $new_pass = $row["newPass"];
            if(password_verify($pass, $old_pass)){
                $pass_hash= password_hash($new_pass, PASSWORD_DEFAULT);
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
    }
}

if (isset($_POST["updateData"])) {
    if(isset($_GET['email'])){
        $email = $_GET['email'];
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
}

if(isset($_GET['email'])){
    $email = $_GET['email'];
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $db = new db();
    $result = $db->db_sql($sql);
  
    if(is_object($result)){
      $row = $result->fetch_assoc();

    $email = $row['email'];
    $nombre1 = $row['nombre1'];
    $nombre2 = $row['nombre2'];
    $apellido1 = $row['apellido1'];
    $apellido2 = $row['apellido2'];
    $fecha_registro = $row['fecha_registro'];
    $estado = $row['estado']? "Activo": "Inactivo";
    $fecha_acceso = $row['fecha_acceso'];
    }
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
                        <h4>Fecha Acceso: </h4>
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