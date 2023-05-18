<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
		H1 {Text-align:center} /*H1 alineado al centro de la página*/
	</style>
		<link rel="stylesheet" href=estilos4.css> <!--  link a los estilos css de todas las webs-->
		<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'> 
    <title>Document</title>
</head>
<body>
    <h1>Añadir productos</h1>
    <div class="wrap"> 
		<!-- contenedor --> 
	<form action="edicion_productos.php" name="formulario" method="post" enctype="multipart/form-data">


		<input type="name" placeholder="Nombre" name="nombre_prod" id="nombre_prod">
		<br>
		<br>
		<input type="number" placeholder="Precio:" name="precio_prod" id="precio_prod">
		<br></br><br>
        <input type="file" accept = "image/jpg,image/jpeg,image/png" name="imagen" id="imagen">
		<br>

		<input type="submit" name="submit" class="btn btn-primary" value="Subir Producto">
		<br>
		<a class="admin" href="miWeb.admin.view.php">Volver</a>
		<br>

	</form>
    
    

</body>
</html>