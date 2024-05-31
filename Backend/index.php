<?php
// backend/index.php

// Función para obtener la versión más alta disponible
function getLatestApiVersion($baseDir)
{
    $versions = [];
    $dirs = scandir($baseDir);

    foreach ($dirs as $dir) {
        if (preg_match('/^v(\d+)$/', $dir, $matches)) {
            $versions[] = (int) $matches[1];
        }
    }

    if (empty($versions)) {
        return null;
    }

    // Ordenar las versiones en orden descendente y obtener la más alta
    rsort($versions);
    return 'v' . $versions[0];
}

// Directorio base donde están las versiones de la API
$apiBaseDir = __DIR__ . '/api';
$latestVersion = getLatestApiVersion($apiBaseDir);

if ($latestVersion) {
    header('Location: /Eva3-w-Linces/backend/api/' . $latestVersion . '/');
} else {
    echo "No API versions found.";
}
exit;
?>
