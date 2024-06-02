<?php
// api/v1/historia/post.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../includes/auth.php';
require_once '../includes/controller.php';

if ($_metodo === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['titulo']) && isset($data['descripcion']) && isset($data['imagen'])) {
        $titulo = $data['titulo'];
        $descripcion = $data['descripcion'];
        $imagen = $data['imagen'];

        $controlador = new Controlador();
        $resultado = $controlador->crearHistoria($titulo, $descripcion, $imagen);

        if ($resultado) {
            http_response_code(201);
            echo json_encode(['message' => 'Historia creada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al crear la historia']);
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
