<?php
// backend/api/v1/historia/get.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'GET') {
    $controlador = new Controlador();
    $historias = $controlador->getHistorias();

    if (!empty($historias)) {
        http_response_code(200);
        echo json_encode($historias);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'No se encontraron historias']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
