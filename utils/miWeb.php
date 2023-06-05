<?php

include "../funciones/conexion.php";
		
$sql = "SELECT * FROM productos"; //Traemos los elementos de la base de datos

$connect = $conexion->query($sql); //La conexión se ejecuta

$lista  = array();

while($fila = $connect->fetch_assoc()){

    array_push($lista, $fila);

}
    
require 'miWeb.view.php'; //llamamos a la web en html

//include "cerrar_sesion.php";


?>