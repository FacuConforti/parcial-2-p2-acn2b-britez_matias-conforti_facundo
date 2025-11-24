<?php
include 'db.php';
session_start();

// Modo Oscuro
$tema = $_SESSION['tema'] ?? 'claro';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/administracion.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/tarjetas.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/tema.css">

</head>

<body class="<?= $tema ?>">

<?php include("header.php"); ?>

<main class="main">

    <h1>Administración de Productos</h1>

    <button id="btnNuevo" class="button">+ Nuevo Producto</button>

    <!-- MODAL oculto -->
    <div id="modal" class="modal modal-administracion" style="display:none;">
        <form id="formProducto" class="form-modal-administracion">
            <input type="hidden" id="id">

            <label>Título</label>
            <input type="text" id="titulo" required>

            <label>Categoría</label>
            <input type="text" id="categoria" required>

            <label>Descripción</label>
            <input id="descripcion" required></input>

            <label>Imagen (URL o ruta)</label>
            <input type="text" id="imagen" required>

            <button type="submit" class="button">Guardar</button>
            <button type="button" id="cerrarModal" class="button">Cancelar</button>
        </form>
    </div>

    <table id="tabla" border="1" cellpadding="10" class="table-administracion">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Categoría</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

</main>

<?php include("footer.php"); ?>

<script>
    const tabla = document.querySelector("#tabla tbody");
    const modal = document.querySelector("#modal");
    const form = document.querySelector("#formProducto");

    // CARGAR PRODUCTOS 
    async function loadProductos() {
        let res = await fetch("api.php");
        let productos = await res.json();

        tabla.innerHTML = "";

        productos.forEach(p => {
            tabla.innerHTML += `
            <tr>
                <td>${p.id}</td>
                <td>${p.titulo}</td>
                <td>${p.categoria}</td>
                <td>${p.descripcion}</td>
                <td><img src="${p.imagen}" width="100"></td>
                <td>
                    <button class="button-adm" onclick="editar(${p.id})">Editar</button>
                    <button class="button-adm" onclick="eliminar(${p.id})" style="background:#c82828;color:white;">Eliminar</button>
                </td>
            </tr>`;
        });
    }

    loadProductos();

    // NUEVO PRODUCTO
    document.querySelector("#btnNuevo").onclick = () => {
        form.reset();
        form.id.value = "";
        modal.style.display = "flex";
    };

    //CERRAR MODAL
    document.querySelector("#cerrarModal").onclick = () => {
        modal.style.display = "none";
    };

    // GUARDAR (CREAR O EDITAR)
    form.onsubmit = async e => {
        e.preventDefault();

        const producto = {
            id: form.id.value,
            titulo: form.titulo.value,
            categoria: form.categoria.value,
            descripcion: form.descripcion.value,
            imagen: form.imagen.value
        };

        let method = producto.id ? "PUT" : "POST";

        await fetch("api.php", {
            method: method,
            body: JSON.stringify(producto)
        });

        modal.style.display = "none";
        loadProductos();
    };

    // EDITAR PRODUCTO 
    async function editar(id) {
        let res = await fetch("api.php");
        let productos = await res.json();
        let p = productos.find(item => item.id == id);

        form.id.value = p.id;
        form.titulo.value = p.titulo;
        form.categoria.value = p.categoria;
        form.descripcion.value = p.descripcion;
        form.imagen.value = p.imagen;

        modal.style.display = "flex";
    }

    // ELIMINAR 
    async function eliminar(id) {
        if (!confirm("¿Seguro que querés eliminar este producto?")) return;

        await fetch("api.php", {
            method: "DELETE",
            body: JSON.stringify({ id })
        });

        loadProductos();
    }
</script>

</body>
</html>
