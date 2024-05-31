<?php
// api/v2/categoria_servicio/delete.php

require_once '../includes/auth.php';
require_once '../includes/controller.php';

if ($_metodo === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'])) {
        $id = $data['id'];
        $controlador = new Controlador();
        $resultado = $controlador->eliminarCategoriaServicio($id);

        if ($resultado) {
            http_response_code(200);
            echo json_encode(['message' => 'Categoría de servicio eliminada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar la categoría de servicio']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'ID de categoría de servicio no proporcionado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
