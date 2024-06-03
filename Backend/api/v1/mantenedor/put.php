<?php
// backend/api/v1/mantenedor/put.php
require '../../../includes/auth.php';
require '../../../includes/controller.php';
require '../../../includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'], $data['nombre'])) {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $controlador = new Controlador();
        $result = $controlador->update($id, $nombre);

        if ($result) {
            send_json_response(['message' => 'Mantenedor actualizado exitosamente']);
        } else {
            send_json_response(['message' => 'Error al actualizar mantenedor'], 400);
        }
    } else {
        send_json_response(['message' => 'Datos inválidos'], 400);
    }
} else {
    send_json_response(['message' => 'Método no permitido'], 405);
}
?>
