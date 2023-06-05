<?php

$conexion = new mysqli('localhost', 'root', '', 'tfg');


			if ($conexion->connect_errno){
				die('Lo siento hubo un problema con el servidor');
			} 
            
?>