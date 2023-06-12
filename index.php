<?php
$errores = '';
$enviado=true;
// Comprobamos que el formulario haya sido enviado con las variables que hayamos puesto en index.view, deben llamarse igual!
if (isset($_POST['submit'])) {
	$Nombre = $_POST['Nombre'];
	$Apellido = $_POST['Apellido'];
    $Email = $_POST['Email'];
   	$Pass = $_POST['Password'];
	
   	

   	if (!empty($Nombre)) { //podemos combrobar con el apellido también

		$Nombre = filter_var($Nombre, FILTER_SANITIZE_SPECIAL_CHARS);//limpia o verifica que es un texto
		//echo $Nombre;
		
	} else {
		$errores .= 'Por favor ingresa un nombre <br />';
		$enviado=false;
	}

	if (!empty($Email)) { //comprobamos que es un email válido y que lo ha enviado
		$Email = filter_var($Email, FILTER_SANITIZE_EMAIL);

		if (!filter_var($Email, FILTER_VALIDATE_EMAIL)){
			$errores .= 'Por favor ingresa un correo valido <br />';
			$enviado=false;
		} 

	} else {
		$errores .= 'Por favor ingresa un correo <br />';
		$enviado=false;
	}

	if(empty($Pass)){
		$errores .= "Por favor, ingrese una contraseña <br />";
		$enviado=false;
	}else{
		$Pass = crypt($Pass,'rl');
	}

	// if(!empty($Pass)){

	// }else{
	// 	$errores .= "Por favor, ingrese una contraseña <br />";
	// 	$enviado=false;

	// }

	if($enviado==false){ //lanzamos los errores que hayan podido ocurrir
		echo "$errores";
	}

	else{ //si todo ok


	//conectamos con la base de datos	
				include "funciones/conexion.php";


				$sql = "SELECT * FROM usuarios"; //Traemos los elementos de la base de datos
	
				$connect = $conexion->query($sql); //La conexión se ejecuta
	
				if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
					$found=false;
					while($fila = $connect->fetch_assoc()){
				
						if($fila['Nombre']==$Nombre && $fila['Email']==$Email){
							$found=true;
						
					 	break;
						}

					}
					if($found==false){
				
						$sql1 = "INSERT INTO usuarios(Nombre,Apellido,Email,Contraseña) VALUES ('$Nombre','$Apellido','$Email','$Pass')";
						$connect = $conexion->query($sql1);
							
						if($conexion->affected_rows >= 1){ 
									echo "
									<script>
										alert('Hola, $Nombre te has registrado con éxito.')
									</script>
									";
									
						} 
					}
					else{
						echo  
						"
						<script>
							alert('Hola $Nombre este usuario ya se encuentra registrado, pulse el botón de Log In')
						</script>
						";
					}	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	
	}

require 'index.view.php'; //llamamos a la web en html
