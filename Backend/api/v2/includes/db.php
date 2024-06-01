<?php
// backend/includes/db.php

// Incluir el archivo de configuración
require_once '../config/config.php';

// Intentar establecer la conexión a la base de datos
try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $db = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);

    // Configurar el modo de error de PDO para que lance excepciones en caso de errores
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Para obtener los resultados como un array asociativo por defecto
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Desactivar emulación de preparación de consultas para evitar problemas con la seguridad

} catch (PDOException $e) {
    // Si ocurre algún error al conectar a la base de datos, mostrar un mensaje de error
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
?>
