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
        <li><a href="#">Productos</a></li>
        <li><a href="#sobrenosostros">Sobre Nosotros</a></li>
        <li><a href="#contacto">Contacto</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../funciones/cerrar_sesion.php"><span class="glyphicon glyphicon-user"></span> Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>

<div align="center">
  <?php
  for($j = 0; $j < count($lista); $j++){
    
      echo "
        <div>
        <img src='../fotos/" .$lista[$j]['foto_prod'] . "'>
        <br>
        <p>
          " . $lista[$j]['nombre_prod'] . "
          <br>
          " . $lista[$j]['precio_prod'] . " €
        </p>
        </div>";
        

    
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
