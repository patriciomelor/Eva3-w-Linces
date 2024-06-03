<?php
// backend/api/v2/Nosotros/get.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../includes/auth.php';
require_once '../includes/controller.php';

use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/v2/nosotros",
 *     summary="Obtiene toda la información sobre nosotros",
 *     @OA\Response(
 *         response=200,
 *         description="Operación exitosa"
 *     )
 * )
 */
if ($_metodo === 'GET') {
    $controlador = new Controlador();
    $Nosotros = $controlador->getNosotros();

    if (!empty($Nosotros)) {
        http_response_code(200);
        echo json_encode($Nosotros);
    } else {
        http_response_code(404);
        echo json_encode(['message' => 'No se encontraron sesion nosotros']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
