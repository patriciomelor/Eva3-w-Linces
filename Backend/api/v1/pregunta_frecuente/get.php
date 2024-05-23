<?php
// backend/api/v1/pregunta_frecuente/get.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'GET') {
    $controlador = new Controlador();
    $preguntas = $controlador->getPreguntasFrecuentes();

    if (!empty($preguntas)) {
        http_response_code(200);
        echo json_encode($preguntas);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'No se encontraron preguntas frecuentes']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
