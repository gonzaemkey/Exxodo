<!DOCTYPE html>
<html lang="en">
<head>
  <title>EXXODO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Styles/estilos6.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  
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
        



      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../funciones/cerrar_sesion.php"><span class="glyphicon glyphicon-user"></span> Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>


<br></br>


<div align="center" id="productos" class="tablas">
  <?php

  session_start(); //iniciamos sesion 

  /*del array SESSION, separamos cada producto por la /, quedando separados cada producto en una posición
  solo con el nombre y la cantidad separadas por un -*/
  $productos = explode('/', $_SESSION['productos']); 
  
  for( $i = 0; $i < count($productos)-1; $i++){//bucle para mostrar los productos

    $productos[$i] = explode('-', $productos[$i]);// separamos la cantidad del nombre(cantidad se usará para calcular el precio final)

  
    //cada producto tiene su propia cartacon el nombre, el precio, y un botón para eliminarlo del carrito si lo desea
      echo "
          <div class='card'>
              <p class='text head'>" . $productos[$i][0] . "</p> 
              <p class='text price'>" . $productos[$i][1] . "</p>
              <button onclick='window.location.href=`eliminarCarrito.php?nombre=". $productos[$i][0]."`'> Delete</button>
          </div>

        ";
        

    
}

require('calculoPrecio.php');//para calcular el precio

//se muestra el precio y el boton para realizar el pedido
    echo "

      <div>
          Precio total: ".$totalPrecio."
          <br>
          <button onclick='window.location.href=`hacerPedido.php?precio=". $totalPrecio ." `'> Hacer Pedido</button>
      </div>

    ";
    
  ?>
</div>




<footer class="container-fluid text-center" id="contacto">
  <p>Contacto</p>  
  <p>Avda. de la Industria S/N, Madrid</p>
  <p>612284698</p>
</footer>

</body>
</html>