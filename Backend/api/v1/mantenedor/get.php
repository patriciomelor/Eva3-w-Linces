<?php
// backend/api/v1/mantenedor/get.php
require '../../../includes/auth.php';
require '../../../includes/controller.php';
require '../../../includes/funciones.php';

$controlador = new Controlador();
$datos = $controlador->getAll();

send_json_response($datos);
?>
