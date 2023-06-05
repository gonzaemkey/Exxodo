<?php
$errores = '';
$enviado=true;

if (isset($_POST['submit'])) {
	$Nombre_prod = $_POST['nombre_prod'];
	$Precio_prod = $_POST['precio_prod'];
	$Foto_prod = $_FILES['imagen']['name']; //Guarda el nombre de la iamgen
	
   	

   	if (empty($Nombre_prod)) { 
		$errores .= 'Por favor ingresa un nombre par el nuevo producto <br />';
		$enviado=false;
	}


	if(empty($Precio_prod)){
		$errores .= "Por favor, ingrese el precio para el nuevo producto <br />";
		$enviado=false;
	}

    if(empty($Foto_prod)){
		$errores .= "Por favor, ingrese una foto para el nuevo producto  <br />";
		$enviado=false;
	}
	

	if($enviado==false){ //lanzamos los errores que hayan podido ocurrir
		echo "$errores";
	}

	else{ //si todo ok


				include "../funciones/conexion.php";


				$sql = "SELECT * FROM productos"; //Traemos los elementos de la base de datos
	
				$connect = $conexion->query($sql); //La conexión se ejecuta
	
				if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
					$found=false;
					while($fila = $connect->fetch_assoc()){
				
						if($fila['nombre_prod']==$Nombre_prod){
							$found=true;
						
					 	break;
						}

					}
					if($found==false){

						$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '../../htdocs/TFG//fotos/'; 

	    				move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$Foto_prod);//mover imagen a directorio temporal

						$sql = "INSERT into productos(nombre_prod,precio_prod,foto_prod) VALUES ('$Nombre_prod','$Precio_prod','$Foto_prod')";

						$connect = $conexion->query($sql);
							
						if($conexion->affected_rows >= 1){ 
									echo "
									<script>
										alert('El producto $Nombre_prod ha sido registrado con éxito');
									</script>
									";
						} 
					}
					else{
						echo "
									<script>
										alert('El producto $Nombre_prod ya se encuentra registrado');
									</script>
									";
					}	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	
	}

    require 'edicion_productos.view.php';




 



?>