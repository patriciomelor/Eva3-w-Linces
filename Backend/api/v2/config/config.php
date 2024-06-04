<?php
// api/v2/config/config.php

// Ruta a la base de datos SQLite
define('DB_PATH', __DIR__ . '/../../../database/database.db');

// Tokens
define('TOKEN_GET', 'Bearer get');
define('TOKEN_GET_EVALUACION', 'Bearer ciisa');
define('TOKEN_POST', 'Bearer post');
define('TOKEN_PUT', 'Bearer put');
define('TOKEN_PATCH', 'Bearer patch');
define('TOKEN_DELETE', 'Bearer delete');
define('TOKEN_DELETE_WEB', 'Bearer delete');
define('TOKEN_DELETE_EMPRESA1', 'Bearer delete');
define('TOKEN_DELETE_EMPRESA2', 'Bearer delete');

// Configuración PDO para SQLite
$dsn = 'sqlite:' . DB_PATH;
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, null, null, $options);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
