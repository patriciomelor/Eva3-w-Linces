<?php
// api/v1/info_contacto/post.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../includes/auth.php';
require_once '../includes/controller.php';

if ($_metodo === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['nombre']) && isset($data['telefono']) && isset($data['correo'])) {
        $nombre = $data['nombre'];
        $telefono = $data['telefono'];
        $correo = $data['correo'];

        $controlador = new Controlador();
        $resultado = $controlador->crearInfoContacto($nombre, $telefono, $correo);

        if ($resultado) {
            http_response_code(201);
            echo json_encode(['message' => 'Información de contacto creada exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al crear la información de contacto']);
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
