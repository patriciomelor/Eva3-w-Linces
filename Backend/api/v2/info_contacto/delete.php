<?php
// api/v1/info_contacto/delete.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../includes/auth.php';
require_once '../includes/controller.php';

if ($_metodo === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'])) {
        $id = $data['id'];
        $controlador = new Controlador();
        $resultado = $controlador->eliminarInfoContacto($id);

        if ($resultado) {
            http_response_code(200);
            echo json_encode(['message' => 'Información de contacto eliminada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar la información de contacto']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['message' => 'ID de información de contacto no proporcionado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
