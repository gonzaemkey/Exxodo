<?php
$errores = '';
$enviado=true;

if (isset($_POST['submit'])) {
	$Nombre_prod = $_POST['nombre_prod'];
	
	
   	

   	if (empty($Nombre_prod)) { 
		$errores .= 'Por favor ingresa un nombre par el nuevo producto <br />';
		$enviado=false;
	}



	else{ 


				include "../funciones/conexion.php";


				$sql = "SELECT * FROM productos"; 
	
				$connect = $conexion->query($sql); 
	
				if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
					$found=false;
					while($fila = $connect->fetch_assoc()){
				
						if($fila['nombre_prod']==$Nombre_prod){
							$found=true;
						
							
					 	break;
						}

					}
					if($found==true){
				
						$sql1 = "DELETE FROM productos WHERE nombre_prod = '$Nombre_prod'";
						$connect = $conexion->query($sql1);
							
						if($conexion->affected_rows >= 1){ 
									echo "
									<script>
										alert('El producto $Nombre_prod ha sido eliminado de la base de datos');
									</script>
									";
						} 
					}
					else{
						echo "
						<script>
							alert('El producto $Nombre_prod no existe dentro de la base de datos');
						</script>
						";
					}	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	
	}

    require 'eliminar_productos.view.php';




 



?>