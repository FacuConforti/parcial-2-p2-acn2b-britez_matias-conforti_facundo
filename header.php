<?php

$tema_actual = $_SESSION['tema'] ?? 'claro';
$tema_opuesto = $tema_actual === 'oscuro' ? 'claro' : 'oscuro';

?>
<!-- Botón para cambiar tema -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="<?= $_SESSION['tema'] ?? 'claro' ?>">
    <header class="header">
        
        <a href="index.php"><img src="img/Logitech-Logo-2.png" alt="Logo" class="logo"></a>
        <nav>
            <a href="index.php">Inicio</a>
            <a href="categorias.php">Categoria</a>
            
            <a href="tema.php?tema=<?= $tema_opuesto ?>" class="boton-tema">
            Cambiar a <?= ucfirst($tema_opuesto) ?></a>
            
        </nav>
    
    </header>
</body>
</html>