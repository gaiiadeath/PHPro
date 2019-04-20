<?php 
include("includes/layout/header.php");
include("conn/clases.php");

if(isset($_POST["submit"])){
  if(empty($_POST["name"])){
    $nameError = "<br>Por favor ingrese su primer nombre";
    echo $nameError;
  }
  if(empty($_POST["lastName"])){
    $lastNameError = "<br>Por favor ingrese su primer apellido";
    echo $lastNameError;
  }
  if(empty($_POST["email"])){
    $emailError = "<br>Por favor ingrese un correo";
    echo $emailError;
  }
  if(empty($_POST["password"])){
    $passwordError = "<br>Por favor ingrese una contraseña";
    echo $passwordError;
  }
  if(isset($emailError) || isset($passwordError) || isset($nameError) || isset($lastNameError)){
    echo "<br><br> Todos campos con * son obligatorios por lo cual no se creó el registro";
  }else{
    $name = $_POST["name"];
    $secondName = $_POST["secName"];
    $lastName = $_POST["lastName"];
    $secLastName = $_POST["secLastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    if(empty(ValidarUsuario($email))){
      RegisterUser($name, $secondName, $lastName, $secLastName, $email, $password);
    }
  }
}

function ValidarUsuario($email){
  $sql = "SELECT * FROM usuarios WHERE email = '".$email."'";
  
  $db = new db();
  $result = $db->db_sql($sql);
  $row = $result->fetch_assoc();

  if(!is_null($row)){
    echo "El correo ya se registró.";
    return "1";
  }
}

function RegisterUser($name, $secondName, $lastName, $secLastName, $email, $password){
  $password = EncryptPass($password);
  $sql = "INSERT INTO usuarios (email, password, nombre1, nombre2, apellido1, apellido2, rol, fecha_registro, estado, acceso, fecha_acceso) 
          values('$email', '$password', '$name', '$secondName', '$lastName', '$secLastName', '1',CURRENT_TIMESTAMP, '1', '0', CURDATE())";
  $db = new db();
  $result = $db->db_sql($sql);
  if(!$result){
    echo "Error al registrar el usuario ". $result;
    return;
  }
  echo "Usuario Registrado con éxito";
  if(is_object($result)){
    $row = $result->fetch_assoc();
    return $row;
  }
}

function EncryptPass($pass){
  return password_hash($pass, PASSWORD_DEFAULT);
}

?>
<body>
    <div class="container">
  <div class="row">
  <div class="col-12">
    <br>
    <h2>Registro</h2>
    <br>
    <br>
    <form action="registro.php" method="Post">
    <div class="row">
      <div class="form-group col-6">
        <label for="name">* Primer Nombre</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Nombre">
      </div>
      <div class="form-group col-6">
        <label for="secName">Segundo Nombre</label>
        <input type="text" class="form-control" id="secName" name="secName" aria-describedby="emailHelp" placeholder="Nombre">
      </div>
    </div>
      <div class="row">
        <div class="form-group col-6">
          <label for="lastName">* Primer Apellido</label>
          <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="emailHelp" placeholder="Apellido">
        </div>

        <div class="form-group col-6">
          <label for="secLastName">Segundo Apellido</label>
          <input type="text" class="form-control" id="secLastName" name="secLastName" aria-describedby="emailHelp" placeholder="Apellido">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-6">
          <label for="email">* Dirección de Correo</label>
          <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Correo" name="email">
          <small id="emailHelp" class="form-text text-muted">La dirección de correo es secreta</small>
        </div>
        <br>
        <div class="form-group col-6">
          <label for="password">* Contraseña</label>
          <input type="password" class="form-control" id="password" placeholder="Contraseña" name="password">
        </div>
      </div>
      <div>
        <p style="color: red">Todos los señalados con * son obligatorios</p>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
    </form>
    </div>
    </div>
  </div>
</body>
</html>