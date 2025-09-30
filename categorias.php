<?php

include "productos.php"; 
session_start(); //Iniciamos la sesion
$tema = $_SESSION['tema'] ?? 'claro'; //Verifica que tema se esta utilizando, si no hay tema aplica el blanco

// Traemos los parámetros GET
$filtro_categoria = $_GET['categoria'] ?? '';
$busqueda = $_GET['buscar'] ?? '';

// Filtramos los items segun categoria y busqueda
$items_filtrados = array_filter($items, function($item) use ($filtro_categoria, $busqueda) {
    $cumple_categoria = $filtro_categoria === '' || $item['categoria'] === $filtro_categoria;
    $cumple_busqueda = $busqueda === '' || stripos($item['titulo'], $busqueda) !== false;
    return $cumple_categoria && $cumple_busqueda;
});

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
</head>
<body class="<?= $_SESSION['tema'] ?? 'claro' ?>">
    
    <?php include("header.php"); ?>

    <main class="main">

        <div class="menu-categorias">

            <!-- FORMULARIO DE FILTRO -->
            <form method="GET" class="formulario-categorias">
                
                <button type="submit" name="categoria" value="" class="button">Todos</button>
                <button type="submit" name="categoria" value="Teclado" class="button">Teclados</button>
                <button type="submit" name="categoria" value="Auriculares" class="button">Auriculares</button>
                <button type="submit" name="categoria" value="Volante" class="button">Volantes</button>
                <button type="submit" name="categoria" value="Mouse" class="button">Mouses</button>

                <input type="text" name="buscar" placeholder="Buscar por nombre..." value="<?= htmlspecialchars($busqueda) ?>">
                
                <input type="hidden" name="tema" value="<?= htmlspecialchars($tema) ?>">

            </form>

        </div>
        
        <!-- LISTADO DE ITEMS -->
        <div class="catalogo">

            <?php if(empty($items_filtrados)): ?>
                <p>No se encontraron productos.</p>

            <?php else: ?>

                <?php foreach($items_filtrados as $item): ?>
                    
                    <div class="tarjeta">

                        <img src="<?= $item['imagen'] ?>" alt="<?= htmlspecialchars($item['titulo']) ?>">
                        <h3><?= htmlspecialchars($item['titulo']) ?></h3>
                        <p><?= htmlspecialchars($item['descripcion']) ?></p>
                        <span class="categoria"><?= htmlspecialchars($item['categoria']) ?></span>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>
    </main>
    
    <?php include("footer.php"); ?>

</body>
</html>