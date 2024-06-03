<?php
// api/v2/categoria_servicio/delete.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../includes/auth.php';
require_once '../includes/controller.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $controlador = new Controlador();
    $result = $controlador->eliminarCategoriaServicio($id);
    if ($result) {
        http_response_code(200);
        echo json_encode(['message' => 'Categoría eliminada exitosamente']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Error al eliminar la categoría']);
    }
} else {
    http_response_code(400);
    echo json_encode(['message' => 'ID no proporcionado']);
}
?>
