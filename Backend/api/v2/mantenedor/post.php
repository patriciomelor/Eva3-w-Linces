<?php
// backend/api/v1/mantenedor/post.php
require '../../../includes/auth.php';
require '../../../includes/controller.php';
require '../../../includes/funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['id'], $data['nombre'])) {
        $id = $data['id'];
        $nombre = $data['nombre'];
        $controlador = new Controlador();
        $result = $controlador->create($id, $nombre);

        if ($result) {
            send_json_response(['message' => 'Mantenedor creado exitosamente'], 201);
        } else {
            send_json_response(['message' => 'Error al crear mantenedor'], 400);
        }
    } else {
        send_json_response(['message' => 'Datos inválidos'], 400);
    }
} else {
    send_json_response(['message' => 'Método no permitido'], 405);
}
?>
