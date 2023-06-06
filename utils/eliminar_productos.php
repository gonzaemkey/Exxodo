<?php
$errores = '';
$enviado=true;

if (isset($_POST['submit'])) {
	$Nombre_prod = $_POST['nombre_prod'];
	
	
   	

   	if (empty($Nombre_prod)) { 
		$errores .= 'Por favor ingresa un nombre par el nuevo producto <br />';
		$enviado=false;
	}



	else{ //si todo ok


	//conectamos con la base de datos que se llama 'prueba_datos'	
				include "../funciones/conexion.php";


				$sql = "SELECT * FROM productos"; //Traemos los elementos de la base de datos
	
				$connect = $conexion->query($sql); //La conexión se ejecuta
	
				if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
					$found=false;
					while($fila = $connect->fetch_assoc()){
				
						if($fila['nombre_prod']==$Nombre_prod){
							$found=true;
						
							//echo  "Hola ". $fila[$Nombre_prod'] . ' este usuario ya se encuentra registrado<br />';
					 	break;
						}

					}
					if($found==true){
				
						$sql1 = "DELETE FROM productos WHERE nombre_prod = '$Nombre_prod'";
						$connect = $conexion->query($sql1);
							
						if($conexion->affected_rows >= 1){ 
									echo "EL producto $Nombre_prod ha sido eliminado de la base de datos";
									//session_start(); //Iniciamos una sesión del cliente
									// session_destroy();


//									$_SESSION['nombre'] = 'Vane';
						} 
					}
					else{echo  
						"
						<script>
							alert('El producto $Nombre_prod no existe dentro de la base de datos');
						</script>
						";
						//header("location: index2.view.php");
					}	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	
	}

    require 'eliminar_productos.view.php';




 



?>