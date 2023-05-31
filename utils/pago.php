<?php
session_start();

$metodoPago = $_GET['metodo'];

// Aquí puedes agregar lógica para procesar el pago según el método seleccionado

// Generar número de pedido aleatorio
$numeroPedido = rand(100000, 999999);

// Realizar acciones necesarias para procesar el pago

// Vaciar el carrito
$_SESSION['productos'] = '';

// Mostrar el pop-up de pago realizado
echo "
  <div class='popup'>
    <h2>Pago realizado</h2>
    <p>Número de pedido: $numeroPedido</p>
    <p>Gracias por tu compra</p>
    <button onclick='window.location.href=\"carrito.view.php\"'>Volver al carrito</button>
  </div>
";
?> 