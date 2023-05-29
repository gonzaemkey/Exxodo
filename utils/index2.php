<?php
$errores = '';
$enviado=true;
// Comprobamos que el formulario haya sido enviado con las variables que hayamos puesto en index.view, deben llamarse igual!
if (isset($_POST['submit'])) {
    $Email = $_POST['Email'];
   	$Pass = $_POST['Password'];
	$Id = 0;
	
   	

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


	//conectamos con la base de datos que se llama 'prueba_datos'	
				include "../funciones/conexion.php";
		
				$sql = "SELECT * FROM usuarios"; //Traemos los elementos de la base de datos
	
				$connect = $conexion->query($sql); //La conexión se ejecuta
	
				if($connect->num_rows){ //Con este condicional vamos a comprobar que hay datos en la base de datos
		
		//El método fetch_assoc trae la información del elemento de cada fila que queramos
					$found=false;
					while($fila = $connect->fetch_assoc()){
				
						if($fila['Email']==$Email && $fila['Contraseña']==$Pass){
							if($fila['Email']=='admin@admin.com'){
								include "iniciar_sesion.php";

								header("location: miWeb.admin.php");
							}else{
								$found=true;
							}
							
						
							//echo  "Hola ". $fila['Nombre'] . ' este usuario ya se encuentra registrado<br />';
					 	break;
						}

					}
					if($found==false){
						echo "Usted aún no se ha registrado";
					}
					else{
						
                        echo 'Hola, bienvenido<br />';

						include "../funciones/iniciar_sesion.php";

						header("location: miWeb.php");
					}	
				}
			else {
				echo 'No hay datos en la base de datos';
			}
		}	
	}

require 'index2.view.php'; //llamamos a la web en html


?>