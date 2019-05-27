<?php 
class seguridad{
include("conn/clases.php");

function logueo_sesiones(){

	                $_SESSION['logueo'] = true;
                    $_SESSION['usuario'] = $datos['nombre1'];
                    $_SESSION['tiempo_logueo'] = time();
                    $_SESSION['tiempo_permitido'] = 20; 
                    setcookie('email',$email,time()+10);
                    $tiempo_actual = time();
}

function logueo_autorizado($sql){
$_SESSION['logueo'] = true;
$db = new db();
$sql = "SELECT estado FROM `usuarios`";
$result = $this->db_sql($sql);
if ($result==1){
			echo "Usuario activo<br>";
			$_SESSION['logueo'] = logueo_sesiones();
			$this->db_open();
	        session_star();
		    }else{
		    	inactividad();
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

		function salir(){
         

		}
}
 ?>

