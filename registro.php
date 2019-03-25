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
    $secondName = $_POST["secName"];
    $lastName = $_POST["lastName"];
    $secLastName = $_POST["secLastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    registerUser($name, $secondName, $lastName, $secLastName, $email, $password);
  }
}

function RegisterUSer($name, $secondName, $lastName, $secLastName, $email, $password){
  $password = EncryptPass($password);
  $sql = "INSERT INTO usuarios (`email`, `password`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `fecha_registro`) 
          values('$email', '$password', '$name', '$secondName', '$lastName', '$secLastName', CURRENT_TIMESTAMP)";
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
        <h2>Formulario de Registro</h2>
        <br>
        <br>
    <form action="registro.php" method="Post">
    <div class="row">
        <div class="form-group col-6">
          <label for="name">Primer Nombre</label>
          <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Primer Nombre">
        </div>
        <div class="form-group col-6">
          <label for="secName">Segundo Nombre</label>
          <input type="text" class="form-control" id="secName" name="secName" aria-describedby="emailHelp" placeholder="Segundo Nombre">
        </div>
    </div>
      <div class="row">
        <div class="form-group col-6">
          <label for="lastName">Primer Apellido</label>
          <input type="text" class="form-control" id="lastName" name="lastName" aria-describedby="emailHelp" placeholder="Apellidos">
        </div>

        <div class="form-group col-6">
          <label for="secLastName">Segundo Apellido</label>
          <input type="text" class="form-control" id="secLastName" name="secLastName" aria-describedby="emailHelp" placeholder="Apellidos">
        </div>
      </div>
      <div class="row">
      <div class="form-group col-6">
        <label for="email">Dirección de Correo</label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Ingresa el Correo" name="email">
        <small id="emailHelp" class="form-text text-muted">La dirección de correo es secreta</small>
      </div>
      <br>
      <div class="form-group col-6">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control" id="password" placeholder="contraseña" name="password">
      </div>
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Enviar</button>
    </form>
    </div>
    </div>
  </div>
</body>
</html>