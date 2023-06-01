<?php

function comprueba($Nombre){
	$conexion = new mysqli('localhost', 'root', '', 'tfg');
	$sql = "SELECT * FROM usuarios"; //Traemos los elementos de la base de datos
	//$sql= "SELECT * from Usuarios WHERE Nombre=’$Nombre’";
	$connect = $conexion->query($sql); //La conexión se ejecuta
	
		if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
	
			while($fila = $connect->fetch_assoc()){
				
				if($fila['Nombre']==$Nombre){

				echo  "Hola ". $fila['Nombre'] . '<br />';
				//aquí podemos hacer un require o un include de otra página donde el usuario pueda hacer cosas.
				//O redirigirle a la página de Login
				}
			}	
		}
		else {
			echo 'No hay datos en la base de datos';
		}

}	




?>