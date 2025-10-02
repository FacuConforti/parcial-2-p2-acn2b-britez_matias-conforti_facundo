<?php

include 'productos.php'; 
session_start(); //Iniciamos la sesion
$tema = $_SESSION['tema'] ?? 'claro'; //Verifica que tema se esta utilizando, si no hay tema aplica el blanco

// Mezclamos el array de productos
shuffle($items);

// Dejamos con los primeros 4
$items_aleatorios = array_slice($items, 0, 4);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logitech</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="<?= $_SESSION['tema'] ?? 'claro' ?>">

    <?php include("header.php"); ?>

    <main class="main">

        <div class="banner">
            <img src="img/Logitech-banner-1.webp" alt="Banner Logitech" class="img-banner">
        </div>

        <h1>Nuestros Productos Destacados</h1>
        <div class="catalogo">
            
            <?php foreach ($items_aleatorios as $item): ?>
                <div class="tarjeta">
                    <img src="<?php echo $item["imagen"]; ?>" alt="<?php echo $item["titulo"]; ?>">
                    <h2><?php echo $item["titulo"]; ?></h2>
                    <p><?php echo $item["descripcion"]; ?></p>
                    <span><?php echo $item["categoria"]; ?></span>
                </div>
            <?php endforeach; ?>
            
        </div>
    </main>
    
    <?php include("footer.php"); ?>
    
</body>
</html>