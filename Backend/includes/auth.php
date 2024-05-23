<?php
// backend/includes/auth.php

require_once __DIR__ . '/../config/config.php';

$_metodo = $_SERVER['REQUEST_METHOD']; // GET, POST, PATCH, PUT, DELETE
$_ubicacion = $_SERVER['HTTP_HOST']; // localhost
$_path = $_SERVER['REQUEST_URI']; // todo después del server
$_partes = explode('/', $_path);
$_version = isset($_partes[2]) ? $_partes[2] : '';
$_mantenedor = isset($_partes[3]) ? $_partes[3] : '';
$_parametros = isset($_partes[4]) ? $_partes[4] : '';

if (strlen($_parametros) > 0) {
    $_parametros = explode('?', $_parametros)[1];
    $_parametros = explode('&', $_parametros);
} else {
    $_parametros = [];
}

// Header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE");
header("Content-Type: application/json; charset=UTF-8");

// Authorization
$_header = null;
try {
    $_header = isset(getallheaders()['Authorization']) ? getallheaders()['Authorization'] : null;
    if ($_header === null) {
        throw new Exception("No tiene autorización");
    }
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['Error' => $e->getMessage()]);
    exit;
}

// Tokens
$valid_tokens = [
    'GET' => [TOKEN_GET, TOKEN_GET_EVALUACION],
    'POST' => [TOKEN_POST],
    'PUT' => [TOKEN_PUT],
    'PATCH' => [TOKEN_PATCH],
    'DELETE' => [TOKEN_DELETE, TOKEN_DELETE_WEB, TOKEN_DELETE_EMPRESA1, TOKEN_DELETE_EMPRESA2]
];

if (!in_array($_header, $valid_tokens[$_metodo])) {
    http_response_code(403);
    echo json_encode(['Error' => 'Token no válido']);
    exit;
}
?>
