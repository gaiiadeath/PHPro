<?php 
include("includes/layout/header.php");
include("conn/clases.php");

if(isset($_POST["submit"])){
  if(!isset($_POST["email"])){
    $emailError = "Por favor ingrese un correo";
    printError($emailError);
  }
  if(!isset($_POST["password"])){
    $passwordError = "Por favor ingrese una contraseña";
    printError($passwordError);
  }
  if(!isset($_POST["name"])){
    $nameError = "Por favor ingrese un nombre";
    printError($nameError);
  }
  if(!isset($_POST["lastName"])){
    $lastNameError = "Por favor ingrese un apellido";
    printError($lastNameError);
  }
  if(isset($emailError) || isset($passwordError) || isset($nameError) || isset($lastNameError)){
    printError("Ocurrió un error en el registro");
  }else{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $lastName = $_POST["lastName"];
    $password = $_POST["password"];
    $semester = $_POST["semester"];
    registerUser($name, $lastName, $email, $password, $semester);
  }
}

function RegisterUSer($name, $lastName, $email, $password, $semester){
  $password = EncryptPass($password);
  $sql = "INSERT INTO Registro (`name`, `lastName`, `email`, `password`, `semester`) values('$name', '$lastName', '$email', '$password', '$semester')";
  $db = new db();
  $result = $db->db_sql($sql);
  if(!$result){
  echo "Usuario Registrado con éxito";
  return;
  }
  $row = $result->fetch_assoc();
  echo "Usuario Registrado con éxito";
  return $row;
}

function EncryptPass($pass){
  return password_hash($pass, PASSWORD_DEFAULT);
}

?>
<body>
    <div class="container">
    <div class="row">
<div class="col-4">
    <h2>Formulario de Registro</h2>
    <br>
    <br>
<form action="registro.php" method="Post">
<div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="lastName">Apellido</label>
    <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="emailHelp" placeholder="Apellidos">
  </div>
  <div class="form-group">
    <label for="email">Dirección de Correo</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresa el Correo" name="email">
    <small id="emailHelp" class="form-text text-muted">La dirección de correo es secreta</small>
  </div>
  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" id="password" placeholder="contraseña" name="password">
  </div>
  <div class="form-group">
    <label for="semester">Semestre actual</label>
    <select class="form-control" id="semester" name="semester">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
</form>
</div>
</div>
</div>
</body>
</html>