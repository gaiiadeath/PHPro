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
	}

?>