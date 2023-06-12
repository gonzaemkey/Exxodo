<?php

include '../funciones/conexion.php';


    session_start();//iniciamos  sesión

    $id = $_SESSION['usuario_id']; //traemos el id del usuario que esta con la sesión iniciada
    $totalPrecio = $_GET['precio']; //el precio que ya hemos calculado
    $pedido = $_SESSION['id_pedido']; //el id del pedido
    $productos = $_SESSION['productos']; //el array productos

    //actualizamos el pedido del cliente, cambiando su estado, y añadiendole los productos definitivos del array SESSION productos
    $sql="UPDATE pedidos SET precio = '$totalPrecio', estado = 'Preparacion', productos = '$productos' where id = '$pedido' ";

    $connect = $conexion->query($sql);//se realiza la  query
    
    //añadimos un nuevo pedido, vacio y con el estado incompleto al cliente actal, para que pueda realizar otro pedido
	$insertar = "INSERT INTO pedidos(id_usuario, precio, productos, estado) values('$id', 0, '', 'Incompleto') ";

    $connect = $conexion->query($insertar);//se realiza la  query

    //traemos la información del  nuevo pedido para guardarla en el array SESsION
    $sql1 = "SELECT * FROM pedidos where id_usuario = '$id' and estado = 'Incompleto' "; 

	$connect = $conexion->query($sql1);//se realiza la  query
	$pedido = $connect->fetch_assoc();

    // se guardan los nuevos datos
	$_SESSION['id_pedido'] = $pedido['id'];
	$_SESSION['productos'] = $pedido['productos'];

    //se avisa de ue se ha realizado
    echo "
        <script>
            alert('El pedido se ha realizado con éxito');
            window.location.href = 'miWeb.php';
        </script>
    ";
    


?>