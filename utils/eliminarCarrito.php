<?php

    include "../funciones/conexion.php";
    session_start();

    $nombre = $_GET['nombre']; // tenemos el nombre del producto por el query parameter
    $posicion;
    $stringProductos = '';

    $productos = explode('/', $_SESSION['productos']); //separamos los productos y sus cantidades de array SESSION
    
    for( $i = 0; $i < count($productos)-1; $i++){//bucle for para recorrerlos todos
  
      $productos[$i] = explode('-', $productos[$i]); //separamos tambien el producto de su cantidad

      //si el nombre de la posición no  concuerda con el que queremos eliminar, se añade al $stringproductos para guardarlo despues
      if($productos[$i][0] != $nombre){
        $stringProductos .= $productos[$i][0].'-'. $productos[$i][1].'/';
      }

  
  }

// si en array de  productos es de longitud 1 o es solo el producto a eliminar, se vacia
  if(count($productos) == 1 && $productos[0][0] == $nombre) $stringProductos = ''; 
  
  $_SESSION['productos'] = $stringProductos;//guardamos el nuevo string en el array SESSION

  header('Location: carrito.view.php');


?>