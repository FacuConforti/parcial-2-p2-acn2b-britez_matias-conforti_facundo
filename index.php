<?php
include 'productos.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logitech</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<<<<<<< HEAD
    <h1> HOLA </h1>
    <h2> chau </h2>
    
=======
    <?php include("header.html"); ?>
    <h1>Catálogo</h1>
    <div class="contenedor">
        <?php foreach ($items as $item): ?>
            <div class="tarjeta">
                <img src="<?php echo $item["imagen"]; ?>" alt="<?php echo $item["titulo"]; ?>">
                <h2><?php echo $item["titulo"]; ?></h2>
                <p><?php echo $item["descripcion"]; ?></p>
                <span><?php echo $item["categoria"]; ?></span>
            </div>
        <?php endforeach; ?>
    </div>
>>>>>>> cfbfe5169349a2f78aef4657046f185131594bdc
</body>
</html>