<?php

    session_start();

    if (!isset($_SESSION['usuario'])){
        echo'
        <script>
                alert("Por favor Inicia sesion");
                window.location = "Index.php";
        </script>
        ';
    
        session_destroy();
        die();
    }   


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - TO-do List </title>
</head>
<body>
    <h1>Bienvenido a mi mundo</h1>
    <p>Hola Mundo Cristopher</p>
    <a href="php/cerrar_sesion.php">Cerrar Sesion</a>
</body>
</html>