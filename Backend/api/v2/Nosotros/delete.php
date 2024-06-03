<?php
// backend/api/v2/Nosotros/delete.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../includes/auth.php';
require_once '../includes/controller.php';
use OpenApi\Annotations as OA;

/**
 * @OA\Delete(
 *     path="/api/v2/nosotros/{id}",
 *     summary="Elimina información sobre nosotros",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Información sobre nosotros eliminada exitosamente"
 *     )
 * )
 */

if ($_metodo === 'DELETE') {
    parse_str(file_get_contents("php://input"), $data);

    if (isset($data['id'])) {
        $controlador = new Controlador();
        $result = $controlador->eliminarNosotros($data['id']);

        if ($result) {
            http_response_code(200);
            echo json_encode(['message' => 'Nosotros eliminado exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar Nosotros']);
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
