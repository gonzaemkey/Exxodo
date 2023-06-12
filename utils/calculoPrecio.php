<?php

include "../funciones/conexion.php";

$totalPrecio = 0;

for( $i = 0; $i < count($productos)-1; $i++){ //hacemos un bucle para calcular el precio de cada producto, y luego juntarlo todo

    $nombre = $productos[$i][0];
    $unidades = $productos[$i][1];

    $sql = "SELECT (precio_prod * '$unidades') as precio FROM productos where nombre_prod = '$nombre'"; //hacemos la query

    $connect = $conexion->query($sql);

    $precioProducto = $connect->fetch_assoc(); //guardamos el precio de cada producto

    $totalPrecio = $totalPrecio + $precioProducto['precio']; //se van concatenando

    
	
}

?>