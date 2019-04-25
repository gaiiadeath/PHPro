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
			$sql = "SELECT * FROM usuarios WHERE email = $email";
			$result = $this->db_sql($sql);
			if ($result->num_rows == 1) {
				echo "Usuario encontrado<br>";
				$datos = $result->fetch_assoc();

				if(password_verify($password, $datos['password'])){
					echo "Contraseña correcta<br>";
					$_SESSION['$logueo'] = true;
					$sql = "UPDATE usuarios SET acceso = 1, fecha_acceso = NOW()";
				}else{
					echo "Contraseña incorrecta<br>";
					session_destroy();
				}
			} else {
				echo "Usuario no encontrado<br>";
			}
		}
	}

?>