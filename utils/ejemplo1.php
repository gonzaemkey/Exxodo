<?php
//Recomendable mirar https://www.php.net/manual/es/oop5.intro.php
//Para refrescar Programación Orientada a Objetos
// Ejemplo #1 - Como lo hariamos sin Programacion Orientada a Objetos
// $nombre = 'Vanessa';
// $edad = 39;
// $pais = 'España';

// $nombre2 = 'Alejandro';
// $edad2 = 36;
// $pais2 = 'Filipinas';

// echo $nombre;


//Ejemplo con clases

class Persona {
	//variables de la clase persona
	public $nombre;
	public $edad;
	public $pais;
	public $tasa;

	//función de la clase persona

	//sin parámetros
	public function mostrarInformacion(){
		echo 'Hola, esta es la función mostrar información';
		echo '<br />';
	}

	//con parámetros
	public function calcula($tasa,$edad){
		echo 'La tasa para tu edad es '.$tasa*$edad;
		echo '<br />';
	}
	public function Mayor_edad($edad){
		if($edad>18){
			echo "Eres mayor de edad";
		}
		else{
			echo "Eres menor de edad";
		}
	}
}

$vane = new Persona; //objeto de la clase persona

//puedo acceder a todas las variables de la clase persona
$vane->nombre = 'Vanessa';
$vane->edad = 42;
$vane->pais = 'España';
$vane->tasa=0.2;

$vane->mostrarInformacion();

//le damos los argumentos
$vane->calcula($vane->tasa,$vane->edad);

$vane-> Mayor_edad($vane->edad);
echo '<br>';
echo $vane->nombre . ' tiene ' . $vane->edad . ' años de edad';
echo '<br>';
$alejandro = new Persona; //otro objeto
$alejandro->nombre = 'Alejandro';
$alejandro->edad = 36;
$alejandro->pais = 'Filipinas';
$alejandro->tasa=0.5;
$vane->calcula($alejandro->tasa,$vane->edad);
?>