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

    .textBox {
  opacity: 0;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  gap: 15px;
  transition: 0.2s ease-in-out;
  z-index: 2;
}

.textBox > .text {
  font-weight: bold;
}

.textBox > .head {
  font-size: 20px;
}

.textBox > .price {
  font-size: 17px;
}

.textBox > span {
  font-size: 12px;
  color: lightgrey;
}

.card:hover > .textBox {
  opacity: 1;
}

.card:hover > .img {
  height: 65%;
  filter: blur(7px);
  animation: anim 3s infinite;
}

@keyframes anim {
  0% {
    transform: translateY(0);
  }

  50% {
    transform: translateY(-20px);
  }

  100% {
    transform: translateY(0);
  }
}

.card:hover {
  transform: scale(1);
}

.tablas {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
  }
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
        <li><a href="#productos">Productos</a></li>
        <li><a href="#sobrenosostros">Sobre Nosotros</a></li>
        <li><a href="#contacto">Contacto</a></li>
        <li><a href="carrito.view.php"><span class="glyphicon glyphicon-shopping-cart"></a></li>


      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../funciones/cerrar_sesion.php"><span class="glyphicon glyphicon-user"></span> Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>

<div align="center" id="productos" class="tablas">
  <?php
  for($j = 0; $j < count($lista); $j++){
    
      echo "

          <div class='card'>
            <img class='img' src='../fotos/" .$lista[$j]['foto_prod']. "' />
            <div class='textBox'>
              <p class='text head'>" . $lista[$j]['nombre_prod'] . "</p>
              <p class='text price'>" . $lista[$j]['precio_prod'] . "</p>
              <button onclick='window.location.href=`producto.view.php?nombre=". $lista[$j]['nombre_prod']."`'> Ver producto</button>
            </div>
          </div>

        ";
        

    
  }
    
  ?>
</div>

<br></br>

<div class="sobrenosotros" id="sobrenosostros">
  <div class="container text-center">
    <p> EXXODO es una empresa, cuya iniciativa es la creación de un estilo de vida, no solo de una simple marca de ropa. <br>
        Esta represesnta las nuevas generaciones, representa el estilo urbano, pero que a su vez sea un producto de alta <br>
        calidad. Nuestra intención es inspirar a las nuevas generaciones a expresarse libremente mediante su propio estilo.</p>
  </div>
</div>




<footer class="container-fluid text-center" id="contacto">
  <p>Contacto</p>  
  <p>Avda. de la Industria S/N, Madrid</p>
  <p>612284698</p>
</footer>

</body>
</html>
