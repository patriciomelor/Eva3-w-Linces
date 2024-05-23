<?php
// backend/api/v1/historia/post.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['titulo']) && isset($data['descripcion']) && isset($data['imagen'])) {
        $controlador = new Controlador();
        $result = $controlador->crearHistoria($data['titulo'], $data['descripcion'], $data['imagen']);

        if ($result) {
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
