<?php
// backend/api/v1/historia/post.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../includes/auth.php';
require_once '../includes/controller.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['titulo']) && isset($data['descripcion'])) {
        $controlador = new Controlador();
        $result = $controlador->crearNosotros($data['titulo'], $data['descripcion']);

        if ($result) {
            http_response_code(201);
            echo json_encode(['message' => 'Nosotros creado exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al crear Nosotros']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Datos incompletos']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
