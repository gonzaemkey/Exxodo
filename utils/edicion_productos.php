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
					if($found==false){

						$carpeta_destino = $_SERVER['DOCUMENT_ROOT'] . '../../htdocs/php2daw/tema5 bbdd/Usuarios registrados/fotos/'; 

	    				move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$Foto_prod);//mover imagen a directorio temporal

						$sql = "INSERT into productos(nombre_prod,precio_prod,foto_prod) VALUES ('$Nombre_prod','$Precio_prod','$Foto_prod')";

						$connect = $conexion->query($sql);
							
						if($conexion->affected_rows >= 1){ 
									echo "El producto $Nombre_prod ha sido registrado con éxito.";
									//session_start(); //Iniciamos una sesión del cliente
									// session_destroy();


//									$_SESSION['nombre'] = 'Vane';
						} 
					}
					else{echo  
						"El producto ". $Nombre_prod . ' ya ha sido registrado <br />';
						//header("location: index2.view.php");
					}	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	
	}

    require 'edicion_productos.view.php';




 



?>