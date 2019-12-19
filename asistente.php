<?php
session_start();

    if (!isset($_SESSION['rol'])){
        header('location: login.php');

    }else{
        if($_SESSION['rol']!=3){
            header('location: login.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secretaria</title>
</head>
<body>
    Hola hola
    
<a href="cerrar.php">xxxxxxxxxxxx</a>
</body>
</html>