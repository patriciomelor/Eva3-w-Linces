<?php
// backend/api/v1/mantenedor/index.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

$control = new Controlador();

// Valores de los parámetros
$existeId = false;
$valorId = 0;
$existeAccion = false;
$valorAccion = '';

if (count($_parametros) > 0) {
    foreach ($_parametros as $p) {
        if (strpos($p, 'id') !== false) {
            $existeId = true;
            $valorId = explode('=', $p)[1];
        }
        if (strpos($p, 'accion') !== false) {
            $existeAccion = true;
            $valorAccion = explode('=', $p)[1];
        }
    }
}

if ($_version == 'v1') {
    if ($_mantenedor == 'mantenedor') {
        switch ($_metodo) {
            case 'GET':
                if ($_header == TOKEN_GET) {
                    $lista = $control->getAll();
                    http_response_code(200);
                    echo json_encode(["data" => $lista]);
                } else {
                    http_response_code(401);
                    echo json_encode(["Error" => "No tiene autorización GET"]);
                }
                break;

            case 'POST':
                if ($_header == TOKEN_POST) {
                    $body = json_decode(file_get_contents("php://input", true));
                    $respuesta = $control->postNuevo($body);
                    if ($respuesta) {
                        http_response_code(201);
                        echo json_encode(["data" => $respuesta]);
                    } else {
                        http_response_code(409);
                        echo json_encode(["data" => "error: conflicto con el nombre ingresado, ya existe"]);
                    }
                } else {
                    http_response_code(401);
                    echo json_encode(["Error" => "No tiene autorización POST"]);
                }
                break;

            case 'PATCH':
                if ($_header == TOKEN_PATCH) {
                    if ($existeId && $existeAccion) {
                        if ($valorAccion == 'encender') {
                            $respuesta = $control->patchEncenderApagar($valorId, true);
                            http_response_code(200);
                            echo json_encode(["data" => $respuesta]);
                        } else if ($valorAccion == 'apagar') {
                            $respuesta = $control->patchEncenderApagar($valorId, false);
                            http_response_code(200);
                            echo json_encode(["data" => $respuesta]);
                        } else {
                            echo 'Error con acciones...';
                        }
                    } else {
                        echo 'Error...';
                    }
                } else {
                    http_response_code(401);
                    echo json_encode(["Error" => "No tiene autorización PATCH"]);
                }
                break;

            case 'PUT':
                if ($_header == TOKEN_PUT) {
                    $body = json_decode(file_get_contents("php://input", true));
                    $respuesta = $control->putNombreById($body->nombre, $body->id);
                    http_response_code(200);
                    echo json_encode(["data" => $respuesta]);
                } else {
                    http_response_code(401);
                    echo json_encode(["Error" => "No tiene autorización PUT"]);
                }
                break;

            case 'DELETE':
                if ($_header == TOKEN_DELETE) {
                    if ($existeId) {
                        $respuesta = $control->deleteById($valorId);
                        http_response_code(200);
                        echo json_encode(["data" => $respuesta]);
                    } else {
                        echo 'Error, faltan parámetros';
                    }
                } else {
                    http_response_code(401);
                    echo json_encode(["Error" => "No tiene autorización DELETE"]);
                }
                break;

            default:
                http_response_code(405);
                echo json_encode(["Error" => "No implementado"]);
                break;
        }
    }
}
?>
