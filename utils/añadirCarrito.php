<?php

if(isset($_POST['submit'])) {

        $nombre = $_POST['nombre']; // tenemos el nombre del producto
        $unidades = $_POST['unidades']; // y las unidades que el cliente quiere

        //la ultima posicion del array estará siempre vacia
        $productoCompleto = $nombre . '-' . $unidades . '/';
        //le damos un formatos separando nombre y unidades por un -, y una barra para separarlo del siguiente producto
        
        session_start(); // iniciamos sesion

        // en el array SESSION de productos guardamos los valores previamente preparados
        $_SESSION['productos'] = $_SESSION['productos'] . $productoCompleto;

        header('Location: miWeb.php');
        
}


?>