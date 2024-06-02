<?php
// backend/api/v1/parcela/post.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'POST') {
    try {
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['tipo']) && isset($data['lote']) && isset($data['servicio_id'])) {
            $controlador = new Controlador();
            $result = $controlador->crearParcela($data['tipo'], $data['lote'], $data['servicio_id']);

            if ($result === true) {
                http_response_code(201);
                echo json_encode(['message' => 'Parcela creada exitosamente']);
            } elseif (isset($result['error'])) {
                http_response_code(400);
                echo json_encode(['message' => $result['error']]);
            } else {
                http_response_code(500);
                echo json_encode(['message' => 'Error al crear la parcela']);
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
?>
