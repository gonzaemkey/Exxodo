<?php
$errores = '';
$enviado=true;
if (isset($_POST['submit'])) {
	$Nombre = $_POST['Nombre'];
	$Apellido = $_POST['Apellido'];
    $Email = $_POST['Email'];
   	$Pass = $_POST['Password'];
	
   	

   	if (!empty($Nombre)) { 

		$Nombre = filter_var($Nombre, FILTER_SANITIZE_SPECIAL_CHARS);
		
	} else {
		$errores .= 'Por favor ingresa un nombre <br />';
		$enviado=false;
	}

	if (!empty($Email)) { 
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

	

	if($enviado==false){
		echo "$errores";
	}

	else{ 
				include "funciones/conexion.php";


				$sql = "SELECT * FROM usuarios"; 
				$connect = $conexion->query($sql); 
	
				if($connect->num_rows){ 
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
						echo "
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

require 'index.view.php'; 


?>