<?php

include "../funciones/conexion.php";

$totalPrecio = 0;

for( $i = 0; $i < count($productos)-1; $i++){

    $nombre = $productos[$i][0];
    $unidades = $productos[$i][1];

    $sql = "SELECT (precio_prod * '$unidades') as precio FROM productos where nombre_prod = '$nombre'";

    $connect = $conexion->query($sql);

    $precioProducto = $connect->fetch_assoc();

    $totalPrecio = $totalPrecio + $precioProducto['precio'];

    
	
}

?>