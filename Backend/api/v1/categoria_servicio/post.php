<?php
// backend/api/v1/categoria_servicio/post.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'POST') {
    try {
        $data = json_decode(file_get_contents("php://input"));
        
        if (isset($data->nombre) && isset($data->descripcion)) {
            $controlador = new Controlador();
            $result = $controlador->crearCategoriaServicio($data->nombre, $data->descripcion);

            if ($result) {
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
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Error del servidor', 'error' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
