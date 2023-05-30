<?php 
    session_start();

    $productos = $_SESSION['productos'];
    $pedido = $_SESSION['id_pedido'];

    $sql = "UPDATE pedidos SET productos = '$productos' WHERE id = '$pedido'";

    $conexion = new mysqli('localhost', 'root', '', 'tfg');

    $connect = $conexion->query($sql);

    //echo "Hola has cerrado sesión";
    session_destroy();
    header('location: ../utils/index2.php');
    
?>