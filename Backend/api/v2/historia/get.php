<?php
// api/v1/historia/get.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../includes/auth.php';
require_once '../includes/controller.php';

$controlador = new Controlador();
$historias = $controlador->getHistoria();

if (!empty($historias)) {
    http_response_code(200);
    echo json_encode($historias);
} else {
    http_response_code(404);
    echo json_encode(['message' => 'No se encontraron historias']);
}

?>
