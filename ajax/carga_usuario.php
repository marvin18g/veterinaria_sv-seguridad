<?php
// Conectar a la base de datos
include('../config.php');

// Obtener el término de búsqueda enviado desde la petición AJAX
$buscar = $_GET["buscar"];

// Hacer la consulta
$sql = "SELECT * FROM usuarios WHERE username LIKE :buscar OR telefono LIKE :buscar OR status LIKE :buscar";
$stmt = $pdo->prepare($sql);
$stmt->execute(["buscar" => "%$buscar%"]);
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devolver los resultados en formato JSON
header('Content-Type: application/json');
echo json_encode($resultados);
