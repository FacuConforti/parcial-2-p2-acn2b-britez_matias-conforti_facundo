<?php

include 'db.php';
session_start(); //Iniciamos la sesion

//Conexion a la base de datos y traemos los productos
$sql = "SELECT * FROM producto";
$result = $conn->query($sql);

//Modo Oscuro
$tema = $_SESSION['tema'] ?? 'claro'; //Verifica que tema se esta utilizando, si no hay tema aplica el blanco
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logitech</title>
    <link rel="stylesheet" href="css/syles.css">
</head>
<body class="<?= $_SESSION['tema'] ?? 'claro' ?>">

    <?php include("header.php"); ?>

    <main class="main">

    </main>
    
    <?php include("footer.php"); ?>
    
</body>
</html>