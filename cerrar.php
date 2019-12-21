<?php
    session_start();

        session_destroy();  
        session_unset();

        unset($_SESSION['cedula']);
        unset($_SESSION['usuario']);

        header('location: login.php');
?>