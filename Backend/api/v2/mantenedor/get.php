<?php
// backend/api/v1/mantenedor/get.php
require_once '../includes/auth.php';
require_once '../includes/controller.php';
require_once '../includes/funciones.php';

$controlador = new Controlador();
$datos = $controlador->getAll();

send_json_response($datos);
?>
