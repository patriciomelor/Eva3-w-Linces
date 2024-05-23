<?php
// backend/api/v1/pregunta_frecuente/patch.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'PATCH') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id']) && (isset($data['pregunta']) || isset($data['respuesta']))) {
        $pregunta = isset($data['pregunta']) ? $data['pregunta'] : null;
        $respuesta = isset($data['respuesta']) ? $data['respuesta'] : null;

        $controlador = new Controlador();
        $result = $controlador->actualizarParcialPreguntaFrecuente($data['id'], $pregunta, $respuesta);

        if ($result) {
            http_response_code(200);
            echo json_encode(['message' => 'Pregunta frecuente actualizada parcialmente exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al actualizar parcialmente la pregunta frecuente']);
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
