<?php 

	session_start();
	$_SESSION['usuario_id']=$fila['Id'];
	
	$sql = "SELECT * FROM pedidos where id_usuario = '$_SESSION['usuario_id']' and estado = 'Incompleto' ";

	$connect = $conexion->query($sql);

	if($connect->num_rows){ 
				
		$pedido = $connect->fetch_assoc();
		$_SESSION['id_pedido'] = $pedido['id'];
		$_SESSION['productos'] = $pedido['productos'];

	} else {

		$insertar = "INSERT INTO pedidos(id_usuario, precio, productos, estado) values('$_SESSION['usuario_id']', 0, '', 'Incompleto') ";

		$connect = $conexion->query($insertar);

		$connect = $conexion->query($sql);
		$pedido = $connect->fetch_assoc();
		$_SESSION['id_pedido'] = $pedido['id'];
		$_SESSION['productos'] = $pedido['productos'];

	}
	

	
?>