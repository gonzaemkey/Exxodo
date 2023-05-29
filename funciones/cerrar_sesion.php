<?php 
    session_start();

    $sql = "UPDATE pedidos SET productos = '$_SESSION['productos']' WHERE id = '$_SESSION['id_pedido']'";

    $connect = $conexion->query($sql);

    //echo "Hola has cerrado sesión";
    session_destroy();
    header('location: ../utils/index2.php');
    
?>