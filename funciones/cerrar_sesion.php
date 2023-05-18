<?php 
    session_start();
    //echo "Hola has cerrado sesión";
    session_destroy();
    header('location: ../utils/index2.php');
    
?>