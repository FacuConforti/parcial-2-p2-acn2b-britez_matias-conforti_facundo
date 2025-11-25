<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body class="<?= $_SESSION['tema'] ?? 'claro' ?>">

    <footer class="footer">

        <a href="index.php"><img src="img/Logitech-Logo-2.png" alt="Logo" class="logo"></a>

        <p>Derechos reservados</p>

        <nav class="nav">

            <a href="index.php" class="button">Inicio</a>
            <a href="categorias.php" class="button">Categorias</a>
            <span class="button">Boton de arrepentimiento</span>

        </nav>

    </footer>
    
</body>
</html>