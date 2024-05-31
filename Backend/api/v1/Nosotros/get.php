<?php
// backend/api/v1/Nosotros/get.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'GET') {
    $controlador = new Controlador();
    $Nosotros = $controlador->getNosotros();

    if (!empty($Nosotros)) {
        http_response_code(200);
        echo json_encode($Nosotros);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'No se encontraron sesion nosotros']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
