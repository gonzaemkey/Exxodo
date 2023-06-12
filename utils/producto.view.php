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

    include "../funciones/conexion.php"; //hacemos la conexión con la BBDD

    $nombre = $_GET['nombre']; //recibimmos el nombre del producto por un query parameter 
    $sql = "SELECT * from productos where nombre_prod = '$nombre'";//hacemos la consulta para traer la info del producto

    $connect = $conexion->query($sql);//la ejecutamos

    
    if($connect->num_rows){ 
				
					$producto = $connect->fetch_assoc();

    }


?>

<div class="row">

<div class="column-left" >

    <img src="../fotos/<?php echo $producto['foto_prod'];   ?>"> <!--aqui se presenta la imagen del producto -->

</div>

<div class="column-left">

    <h3><?php echo $producto['nombre_prod'];   ?> </h3> <!--aqui se presenta el nombre del producto -->
    <br> 
    <h4><?php echo $producto['precio_prod'];   ?> €</h4> <!--aqui se presenta el precio del producto -->

    <form action="añadirCarrito.php" method="post">

        <input type="number" name="unidades" placeholder="Cantidad" min="1" default="1"> <!-- en este imput se recoje la cantidad que el cliente quiere pedir -->
        <input type="hidden" name="nombre"  value="<?php echo $producto['nombre_prod']; ?>"><!-- aqui tenemos oculto el monbre para llevarnoslo para hacerla logica -->

        <input type="submit" name="submit" value="Añadir al carrito"> <!-- boton submit praa añadirlo al carrito -->

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

