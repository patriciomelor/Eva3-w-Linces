<?php
// api/v1/pregunta_frecuente/delete.php

require_once '../includes/auth.php';
require_once '../includes/controller.php';


if ($_metodo === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'])) {
        $id = $data['id'];
        $controlador = new Controlador();
        $resultado = $controlador->eliminarPreguntaFrecuente($id);

        if ($resultado) {
            http_response_code(200);
            echo json_encode(['message' => 'Pregunta frecuente eliminada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar la pregunta frecuente']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'ID de pregunta frecuente no proporcionado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
