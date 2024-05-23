<?php
// backend/api/v1/pregunta_frecuente/delete.php

require_once '../../../includes/auth.php';
require_once '../../../includes/controller.php';

if ($_metodo === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);

    if (isset($data['id'])) {
        $controlador = new Controlador();
        $result = $controlador->eliminarPreguntaFrecuente($data['id']);

        if ($result) {
            http_response_code(200);
            echo json_encode(['message' => 'Pregunta frecuente eliminada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar la pregunta frecuente']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'ID no proporcionado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
