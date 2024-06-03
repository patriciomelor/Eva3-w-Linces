<?php
// api/v2/categoria_servicio/post.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../includes/controller.php';
require_once '../includes/auth.php';


$data = json_decode(file_get_contents('php://input'), true);
$nombre = $data['nombre'] ?? null;
$descripcion = $data['descripcion'] ?? null;

if ($nombre && $descripcion) {
    $controlador = new Controlador();
    $result = $controlador->crearCategoriaServicio($nombre, $descripcion);
    if ($result) {
        http_response_code(201);
        echo json_encode(['message' => 'Categoría creada exitosamente']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Error al crear la categoría']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'Datos incompletos']);
}
?>
