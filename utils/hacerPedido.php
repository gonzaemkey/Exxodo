<?php

include '../funciones/conexion.php';


    session_start();

    $id = $_SESSION['usuario_id'];
    $totalPrecio = $_GET['precio'];
    $pedido = $_SESSION['id_pedido'];
    $productos = $_SESSION['productos'];

    
    $sql="UPDATE pedidos SET precio = '$totalPrecio', estado = 'Preparacion', productos = '$productos' where id = '$pedido' ";

    $connect = $conexion->query($sql);
    
	$insertar = "INSERT INTO pedidos(id_usuario, precio, productos, estado) values('$id', 0, '', 'Incompleto') ";

    $connect = $conexion->query($insertar);

    $sql1 = "SELECT * FROM pedidos where id_usuario = '$id' and estado = 'Incompleto' ";

	$connect = $conexion->query($sql1);
	$pedido = $connect->fetch_assoc();
	$_SESSION['id_pedido'] = $pedido['id'];
	$_SESSION['productos'] = $pedido['productos'];


    echo "
        <script>
            alert('El pedido se ha realizado con éxito');
            window.location.href = 'miWeb.php';
        </script>
    ";

    // header('Location: miWeb.php');
    


?>