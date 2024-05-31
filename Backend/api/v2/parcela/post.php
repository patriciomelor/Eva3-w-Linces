<?php
// api/v1/parcela/post.php

require_once '../../includes/auth.php';
require_once '../../includes/controller.php';

if ($_metodo === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['tipo']) && isset($data['lote']) && isset($data['servicio_id'])) {
        $tipo = $data['tipo'];
        $lote = $data['lote'];
        $servicio_id = $data['servicio_id'];

        $controlador = new Controlador();
        $resultado = $controlador->crearParcela($tipo, $lote, $servicio_id);

        if ($resultado) {
            http_response_code(201);
            echo json_encode(['message' => 'Parcela creada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al crear la parcela']);
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
