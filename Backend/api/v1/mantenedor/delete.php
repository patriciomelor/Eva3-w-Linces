<?php
// backend/api/v1/mantenedor/delete.php
require '../../../includes/auth.php';
require '../../../includes/controller.php';
require '../../../includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'])) {
        $id = $data['id'];
        $controlador = new Controlador();
        $result = $controlador->delete($id);

        if ($result) {
            send_json_response(['message' => 'Mantenedor eliminado exitosamente']);
        } else {
            send_json_response(['message' => 'Error al eliminar mantenedor'], 400);
        }
    } else {
        send_json_response(['message' => 'Datos inválidos'], 400);
    }
} else {
    send_json_response(['message' => 'Método no permitido'], 405);
}
?>
