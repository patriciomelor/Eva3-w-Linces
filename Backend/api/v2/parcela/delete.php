<?php
// api/v1/parcela/delete.php

require_once '../../includes/auth.php';
require_once '../../includes/controller.php';

if ($_metodo === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'])) {
        $id = $data['id'];
        $controlador = new Controlador();
        $resultado = $controlador->eliminarParcela($id);

        if ($resultado) {
            http_response_code(200);
            echo json_encode(['message' => 'Parcela eliminada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar la parcela']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'ID de parcela no proporcionado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
