<?php

    include "../funciones/conexion.php";
    session_start();

    $nombre = $_GET['nombre'];
    $posicion;
    $stringProductos = '';

    $productos = explode('/', $_SESSION['productos']);
    
    for( $i = 0; $i < count($productos)-1; $i++){
  
      $productos[$i] = explode('-', $productos[$i]);

      if($productos[$i][0] != $nombre){
        $stringProductos .= $productos[$i][0].'-'. $productos[$i][1].'/';
      }

  
  }


  if(count($productos) == 1 && $productos[0][0] == $nombre) $stringProductos = '';

  $_SESSION['productos'] = $stringProductos;

  header('Location: carrito.view.php');


?>