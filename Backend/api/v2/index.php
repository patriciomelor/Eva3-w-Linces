<?php
// backend/api/v2/index.php

require_once __DIR__ . '/../../../vendor/autoload.php';
use OpenApi\Generator;

/**
 * @OA\Info(
 *     title="API Documentation",
 *     version="1.0.0"
 * )
 */

// Generar documentación Swagger
try {
    $openapi = Generator::scan([__DIR__ . '/../../includes']);
    header('Content-Type: application/json');
    echo $openapi->toJson();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>