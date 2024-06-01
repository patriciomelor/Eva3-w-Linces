<?php
// api/v2/pregunta_frecuente/put.php

require_once '../includes/auth.php';
require_once '../includes/controller.php';


if ($_metodo === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id']) && isset($data['pregunta']) && isset($data['respuesta'])) {
        $id = $data['id'];
        $pregunta = $data['pregunta'];
        $respuesta = $data['respuesta'];

        $controlador = new Controlador();
        $resultado = $controlador->actualizarPreguntaFrecuente($id, $pregunta, $respuesta);

        if ($resultado) {
            http_response_code(200);
            echo json_encode(['message' => 'Pregunta frecuente actualizada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al actualizar la pregunta frecuente']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'Datos incompletos']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
