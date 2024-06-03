<?php
// Ruta correcta al autoloader de Composer
require __DIR__ . '/../../../vendor/autoload.php';

use OpenApi\Annotations as OA;
use OpenApi\Generator;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0"
 * )
 */

// Deshabilitar la visualización de errores para evitar que se impriman en el YAML
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

if (isset($_GET['swagger']) && $_GET['swagger'] == 'json') {
    // Generar documentación Swagger en formato JSON
    try {
        $openapi = Generator::scan([
            __DIR__ . '/includes',
            __DIR__ . '/categoria_servicio',
            __DIR__ . '/historia',
            __DIR__ . '/info_contacto',
            __DIR__ . '/parcela',
            __DIR__ . '/pregunta_frecuente',
            __DIR__ . '/Nosotros'
        ]);
        header('Content-Type: application/json');
        echo $openapi->toJson();
        exit;
    } catch (Exception $e) {
        // Registrar el error en el log
        error_log("Error al generar la documentación Swagger: " . $e->getMessage());
        echo json_encode(["error" => "Error al generar la documentación Swagger"]);
        exit;
    }
} else {
    // Servir Swagger UI
    $swaggerHtmlPath = __DIR__ . '/../../../Front/src/swagger-ui/dist/index.html';
    if (!file_exists($swaggerHtmlPath)) {
        http_response_code(500);
        echo json_encode(['error' => 'Could not find Swagger UI HTML file']);
        exit;
    }

    $swaggerHtml = file_get_contents($swaggerHtmlPath);
    header('Content-Type: text/html');
    echo $swaggerHtml;
    exit;
}
?>
