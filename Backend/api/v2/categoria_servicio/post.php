<?php
// api/v2/categoria_servicio/post.php

require_once '../includes/auth.php';
require_once '../includes/auth.php';

if ($_metodo === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['nombre']) && isset($data['descripcion'])) {
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];

        $controlador = new Controlador();
        $resultado = $controlador->crearCategoriaServicio($nombre, $descripcion);

        if ($resultado) {
            http_response_code(201);
            echo json_encode(['message' => 'Categoría de servicio creada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al crear la categoría de servicio']);
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
