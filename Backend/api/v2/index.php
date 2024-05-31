<?php
// api/v2/index.php

$endpoints = [
    'categoria_servicio' => [
        'GET' => 'http://localhost/Eva3-w-Linces/backend/api/v2/categoria_servicio/get.php',
        'POST' => 'http://localhost/Eva3-w-Linces/backend/api/v2/categoria_servicio/post.php',
        'DELETE' => 'http://localhost/Eva3-w-Linces/backend/api/v2/categoria_servicio/delete.php'
    ],
    'info_contacto' => [
        'GET' => 'http://localhost/Eva3-w-Linces/backend/api/v2/info_contacto/get.php',
        'POST' => 'http://localhost/Eva3-w-Linces/backend/api/v2/info_contacto/post.php',
        'DELETE' => 'http://localhost/Eva3-w-Linces/backend/api/v2/info_contacto/delete.php'
    ],
    'historia' => [
        'GET' => 'http://localhost/Eva3-w-Linces/backend/api/v2/historia/get.php',
        'POST' => 'http://localhost/Eva3-w-Linces/backend/api/v2/historia/post.php',
        'DELETE' => 'http://localhost/Eva3-w-Linces/backend/api/v2/historia/delete.php'
    ],
    'pregunta_frecuente' => [
        'GET' => 'http://localhost/Eva3-w-Linces/backend/api/v2/pregunta_frecuente/get.php',
        'POST' => 'http://localhost/Eva3-w-Linces/backend/api/v2/pregunta_frecuente/post.php',
        'PUT' => 'http://localhost/Eva3-w-Linces/backend/api/v2/pregunta_frecuente/put.php',
        'PATCH' => 'http://localhost/Eva3-w-Linces/backend/api/v2/pregunta_frecuente/patch.php',
        'DELETE' => 'http://localhost/Eva3-w-Linces/backend/api/v2/pregunta_frecuente/delete.php'
    ],
    'parcela' => [
        'GET' => 'http://localhost/Eva3-w-Linces/backend/api/v2/parcela/get.php',
        'POST' => 'http://localhost/Eva3-w-Linces/backend/api/v2/parcela/post.php',
        'DELETE' => 'http://localhost/Eva3-w-Linces/backend/api/v2/parcela/delete.php'
    ],
    'test_connection' => [
        'GET' => 'http://localhost/Eva3-w-Linces/backend/test_connection.php'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API v2 Endpoints</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">API v2 Endpoints</h1>
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Endpoint</th>
                    <th>Método</th>
                    <th>URL</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($endpoints as $endpoint => $methods): ?>
                    <?php foreach ($methods as $method => $url): ?>
                        <tr>
                            <td><?= htmlspecialchars($endpoint) ?></td>
                            <td><?= htmlspecialchars($method) ?></td>
                            <td><a href="<?= htmlspecialchars($url) ?>"><?= htmlspecialchars($url) ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
