<!DOCTYPE html>
<!-- Página que ve el usuario -->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Board form</title> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
		<link rel="stylesheet" href="Styles/estilos4.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> <!-- fuente de texto de google font -->
</head>
<body>
	<div class="login-dark"> 
	
		<!-- contenedor --> 
		<form action=" " name="formulario" method="post" class="form-animation">
 		<!-- Usamos el método post para recoger lo que seleccione el usuario en unas variables -->

     <!-- Placeholder es lo que le aparece al usuario en la web, name es como se llama la variable que recogeremos con post y type el tipo de datos que introduce el usuario -->
		<!-- El nombre es un texto -->
		<h2 class="sr-only">Sign in Form</h2>
            <div class="illustration"><img src="fotos/logo_size.jpg"></i></div>
			<div class="form-group"><input class="form-control" type="Nombre" name="Nombre" placeholder="Name"></div>
			<div class="form-group"><input class="form-control" type="Apellido" name="Apellido" placeholder="Surname"></div>
            <div class="form-group"><input class="form-control" type="Email" name="Email" placeholder="Email"></div>
            <div class="form-group"><input class="form-control" type="Password" name="Password" placeholder="Password"></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="submit">Sign In</button></div>
			<a href="utils/index2.php" class="forgot">Log In</a>
		
		</form>
	
	</div>


</body>
</html>