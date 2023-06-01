<?php 

require 'conexion.php';

	session_start();
	$_SESSION['usuario_id']=$fila['Id'];
	$id = $_SESSION['usuario_id'];
	
	$sql1 = "SELECT * FROM pedidos where id_usuario = '$id' and estado = 'Incompleto' ";

	$connect = $conexion->query($sql1);

	if($connect->num_rows){ 
				
		$pedido = $connect->fetch_assoc();
		$_SESSION['id_pedido'] = $pedido['id'];
		$_SESSION['productos'] = $pedido['productos'];

	} else {


		$insertar = "INSERT INTO pedidos(id_usuario, precio, productos, estado) values('$id', 0, '', 'Incompleto') ";

		$connect = $conexion->query($insertar);

		$connect = $conexion->query($sql1);
		$pedido = $connect->fetch_assoc();
		$_SESSION['id_pedido'] = $pedido['id'];
		$_SESSION['productos'] = $pedido['productos'];

	}

	echo "
		<script>
			alert(' ".$pedido['id']." ');
		</script>
	";
	

	
?>