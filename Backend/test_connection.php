<?php
require 'api/v2/config/config.php';

try {
    $pdo = new PDO($dsn, null, null, $options);
    echo 'Connection successful';
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
