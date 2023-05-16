<?php 

	session_start();
	$_SESSION['usuario']=$Email;
	$usuario=$_SESSION['usuario'];

	 	

	echo  "Hola ". $usuario . ", has iniciado sesión.<br />";

	// if(($usuario==null) || ($usuario=='')){ 
	// 	echo '
	// 	<script>
	// 		alert("Acceso denegado.");
	// 		window.location = "index.php";
	// 	</script>	
	// ';
	// 	die();
 //    }
?>