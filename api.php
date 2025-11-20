<?php
header("Content-Type: application/json");
require "db.php";

$method = $_SERVER["REQUEST_METHOD"];

$input = json_decode(file_get_contents("php://input"), true);

if ($method === "GET") {

    $sql = "SELECT * FROM producto";
    $result = $conn->query($sql);

    $productos = [];

    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }

    echo json_encode($productos);
    exit;
}

if ($method === "POST") {

    if (!$input) {
        echo json_encode(["error" => "JSON inválido"]);
        exit;
    }

    $titulo = $conn->real_escape_string($input["titulo"]);
    $categoria = $conn->real_escape_string($input["categoria"]);
    $descripcion = $conn->real_escape_string($input["descripcion"]);
    $imagen = $conn->real_escape_string($input["imagen"]);

    $sql = "INSERT INTO producto (titulo, categoria, descripcion, imagen)
            VALUES ('$titulo', '$categoria', '$descripcion', '$imagen')";

    if ($conn->query($sql)) {
        echo json_encode(["success" => true, "id" => $conn->insert_id]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }

    exit;
}

if ($method === "PUT") {

    if (!$input) {
        echo json_encode(["error" => "JSON inválido"]);
        exit;
    }

    $id = intval($input["id"]);
    $titulo = $conn->real_escape_string($input["titulo"]);
    $categoria = $conn->real_escape_string($input["categoria"]);
    $descripcion = $conn->real_escape_string($input["descripcion"]);
    $imagen = $conn->real_escape_string($input["imagen"]);

    $sql = "UPDATE producto SET 
            titulo='$titulo', 
            categoria='$categoria', 
            descripcion='$descripcion',
            imagen='$imagen'
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }

    exit;
}

if ($method === "DELETE") {

    if (!$input || !isset($input["id"])) {
        echo json_encode(["error" => "ID no enviado"]);
        exit;
    }

    $id = intval($input["id"]);

    $sql = "DELETE FROM producto WHERE id=$id";

    if ($conn->query($sql)) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => $conn->error]);
    }

    exit;
}

echo json_encode(["error" => "Método no soportado"]);