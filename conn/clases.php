<?php
error_reporting(E_ERROR | E_NOTICE);

class db
{
	private $connect;

	function db_open()
	{
		$this->connect = new mysqli("localhost", "root", "", "website201901");
		$this->connect->set_charset("utf8");

		if ($this->connect->connect_error) {
			echo "Fallo en la conexión. Error número "
			. $this->connect->connect_errno . " ("
			. $this->connect->connect_error . ")";
		}
	}

	function db_close()
	{
		$this->connect->close();
	}

	function db_sql($sql)
	{	
		$this->db_open();
		$this->result = $this->connect->query($sql);
		if($this->connect->connect_errno || $this->connect->error){
			echo "Hubo error: ". $this->connect->connect_errno ."  ". $this->connect->error;
		}
		$this->db_close();
		return $this->result;
	}

	function db_ingresar($email, $password){
		$sql = "SELECT * FROM usuarios WHERE email = '$email'";
		$result = $this->db_sql($sql);
		if ($result->num_rows == 1) {
			//echo "Usuario encontrado<br>";
			$datos = $result->fetch_assoc();
			if(password_verify($password, $datos['password'])){
				$seguridad = new seguridad();
				$sql = "UPDATE usuarios SET acceso = 1, fecha_acceso = NOW()";
				$estado = $seguridad->logueo_autorizado($datos['estado'], $sql);
				if ($estado == true) {
					$seguridad->logueo_sesiones($datos);
				}
			}
		}
	}
}


class seguridad
{

	function logueo_sesiones($datos){
		session_start();
	    $_SESSION['logueo'] = true;
	    $_SESSION['user'] = $datos['email'];
	    $_SESSION['password'] = $datos['password'];
	    $_SESSION['role'] = $datos['rol'];
	    $_SESSION['tiempo_logueo'] = time();
	    $_SESSION['tiempo_permitido'] = 20;
	    setcookie('email',$datos['email'],time()+10);
	    $tiempo_actual = time();
	}

	function logueo_autorizado($estado, $sql){
		if ($estado == 1){
			$db = new db();
			$db->db_sql($sql);
		    return true;
	    }else{
	    	return false;
		}
	}

	function inactividad($sql){
		$_SESSION['logueo'] = logueo_sesiones();
		if(isset($_SESSION['logueo']) && $_SESSION['logueo'] == true){
			$tiempo_inactivo = $tiempo_actual-$_SESSION['tiempo_logueo'];
			if ($tiempo_inactivo > $_SESSION['tiempo_permitido']) {
				echo "Sesion cerrada por inactividad <br>";
				session_destroy();
			}else{
				echo "Sesion Activa <br>";
				$_SESSION['tiempo_logueo'] = time();
			}
		}
	}

	function pass_aleatorio() {
		$str = "012345679aAbBcCdDeEfFgGhHiIjJkKlLmMnNoOpPqQrRsStTuUvVwWhHyYzZ,;._-";
		$shuffled = str_shuffle($str);
		
		$randomString = substr($shuffled, -6);
		return $randomString;
	}

	function salir($email){
		$db = new db();
		$sql = "UPDATE usuarios SET acceso = '0' WHERE email = '$email'";
		$result = $db->db_sql($sql);
		session_unset();
		session_destroy();
	}
}	
?>