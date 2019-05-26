<?php 
include("conn/clases.php");

if(!isset($_POST)) return;

$user = $_POST['user'];
$state = 1 - $_POST['state'];



$db = new db();
$sql = "UPDATE `usuarios` SET `estado`='$state' WHERE `email`='$user'";
$result = $db->db_sql($sql);


echo "Efectivamente se cambió $user a el estado $state";


?>