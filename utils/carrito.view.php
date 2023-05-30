<!DOCTYPE html>
<html lang="en">
<head>
  <title>EXXODO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    .jumbotron {
      background: black;
      color: white;
      margin-bottom: 0;
    }
   
    footer {
      background-color: black;
      color: white;
      padding: 25px;
    }

    .card {
 width: 12.5rem;
 height: 17rem;
 background-color: #212121;
 border-radius: 1rem;
 border: #212121 0.2rem solid;
 transition: all 0.4s ease-in;
 box-shadow: 0.4rem 0.4rem 0.6rem #00000040;
 color: white;
}

.card:hover {
 transform: translateY(-1.5rem);
 border: #f2295bf0 0.2em solid;
 border-radius: 2.5rem 0 2.5rem 0;
}

.tablas {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
  }

  /* .card2 {
 width: 190px;
 height: 254px;
 border-radius: 30px;
 background: #212121;
 box-shadow: 15px 15px 30px rgb(25, 25, 25),
             -15px -15px 30px rgb(60, 60, 60);
} */


  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>EXXODO</h1>      
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
        <li><a href="miweb.php">Productos</a></li>
        



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

  session_start();

  $productos = explode('/', $_SESSION['productos']);
  
  for( $i = 0; $i < count($productos)-1; $i++){

    $productos[$i] = explode('-', $productos[$i]);

  
      echo "
          <div class='card'>
              <p class='text head'>" . $productos[$i][0] . "</p>
              <p class='text price'>" . $productos[$i][1] . "</p>
              <button onclick='window.location.href=`eliminarCarrito.php?nombre=". $productos[$i][0]."`'> Eliminar Producto del Carrito</button>
          </div>

        ";
        

    
}

require('calculoPrecio.php');

    echo "

      <div>
          Precio total: ".$totalPrecio."
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