<?php
// backend/api/v1/categoria_servicio/get.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'GET') {
    $controlador = new Controlador();
    $categorias = $controlador->getCategoriasServicio();

    if (!empty($categorias)) {
        http_response_code(200);
        echo json_encode($categorias);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'No se encontraron categorías de servicio']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}

?>
