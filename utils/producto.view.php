<!DOCTYPE html>
<html lang="en">
<head>
  <title>EXXODO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Styles/estilos5.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body id="body">

<div class="jumbotron" id="myJumbotron">
  <div class="container text-center">
  <img src="../fotos/logo-exxodo-nero.jpg" alt="Logo EXXODO">      
    <p>Future & Urban</p>
  </div>
</div>  


<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="miWeb.php">Productos</a></li>
        <li><a href=""><span class="glyphicon glyphicon-shopping-cart"></a></li>


      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../funciones/cerrar_sesion.php"><span class="glyphicon glyphicon-user"></span> Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php

    include "../funciones/conexion.php";

    $nombre = $_GET['nombre'];
    $sql = "SELECT * from productos where nombre_prod = '$nombre'";

    $connect = $conexion->query($sql);

    
    if($connect->num_rows){ 
				
					$producto = $connect->fetch_assoc();

    }


?>

<div class="row">

<div class="column-left" >

    <img src="../fotos/<?php echo $producto['foto_prod'];   ?>">

</div>

<div class="column-left">

    <h3><?php echo $producto['nombre_prod'];   ?> </h3>
    <br>
    <h4><?php echo $producto['precio_prod'];   ?> €</h4>

    <form action="añadirCarrito.php" method="post">

        <input type="number" name="unidades" placeholder="Cantidad" min="1" default="1">
        <input type="hidden" name="nombre"  value="<?php echo $producto['nombre_prod']; ?>">

        <input type="submit" name="submit" value="Añadir al carrito">

    </form>

</div>

</div>





<br></br>




<footer class="container-fluid text-center" id="contacto">
  <p>Contacto</p>  
  <p>Avda. de la Industria S/N, Madrid</p>
  <p>612284698</p>
</footer>

</body>
</html>

