<?php
session_start();

    if (!isset($_SESSION['rol'])){
        header('location: login.php');

    }else{
        if($_SESSION['rol']!=2){
            header('location: login.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   
</head>
<body>
<p>usuario atlteta</p>

<a href="cerrar.php">xxxxxxxxxxxx</a>
</body>
</html>