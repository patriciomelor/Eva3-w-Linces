<?php
// api/v1/info_contacto/get.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../includes/auth.php';
require_once '../includes/controller.php';

if ($_metodo === 'GET') {
    $controlador = new Controlador();
    $contactos = $controlador->getInfoContacto();

    if (!empty($contactos)) {
        http_response_code(200);
        echo json_encode($contactos);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'No se encontró información de contacto']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
