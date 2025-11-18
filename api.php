<?php
header("Content-Type: application/json");
require "db.php";

$sql = "SELECT * FROM producto";
$result = $conn->query($sql);

$productos = [];

while ($row = $result->fetch_assoc()) {
    $productos[] = $row;
}

echo json_encode($productos);
