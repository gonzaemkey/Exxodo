<!DOCTYPE html>
<html lang="en">
<head>
  <title>EXXODO - Pago</title>
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

    .payment-icon {
      width: 100px;
      height: 100px;
      margin: 10px;
    }

    .payment-icon img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      padding: 20px;
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      z-index: 9999;
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
        <li><a href="miweb.php">Volver a productos</a></li>
        <li><a href="carrito.view.php">Volver a carrito</a></li>
        <li class="active"><a href="pago.view.php">Hacer pedido</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../funciones/cerrar_sesion.php"><span class="glyphicon glyphicon-user"></span> Cerrar Sesión</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <h2>Seleccione un medio de pago</h2>
  <div class="row">
    <div class="col-md-4">
      <div class="payment-icon">
        <a href="pago.php?metodo=paypal">
          <img src="../fotos/paypal.png" alt="PayPal">
        </a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="payment-icon">
        <a href="pago.php?metodo=creditcard">
          <img src="../fotos/tarjeta de credito.jpeg" alt="Tarjeta de crédito">
        </a>
      </div>
    </div>
    <!-- Agrega más medios de pago aquí -->
  </div>
</div>

<footer class="container-fluid text-center" id="contacto">
  <p>Contacto</p>  
  <p>Avda. de la Industria S/N, Madrid</p>
  <p>612284698</p>
</footer>

</body>
</html>
