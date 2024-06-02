<?php
// backend/api/v1/info_contacto/get.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'GET') {
    $controlador = new Controlador();
    $info_contacto = $controlador->getInfoContacto();

    if (!empty($info_contacto)) {
        http_response_code(200);
        echo json_encode($info_contacto);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'No se encontró información de contacto']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
