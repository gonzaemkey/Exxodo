<?php

if(isset($_POST['submit'])) {

        $nombre = $_POST['nombre'];
        $unidades = $_POST['unidades'];

        //la ultima posicion del array estará siempre vacia
        $productoCompleto = $nombre . '-' . $unidades . '/';
        
        session_start();

        $_SESSION['productos'] = $_SESSION['productos'] . $productoCompleto;


        header('Location: miWeb.php');
        
}


?>