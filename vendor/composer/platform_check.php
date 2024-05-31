<?php

// platform_check.php @generated by Composer

$issues = array();

<<<<<<< HEAD
if (!(PHP_VERSION_ID >= 80200)) {
    $issues[] = 'Your Composer dependencies require a PHP version ">= 8.2.0". You are running ' . PHP_VERSION . '.';
=======
if (!(PHP_VERSION_ID >= 80000)) {
    $issues[] = 'Your Composer dependencies require a PHP version ">= 8.0.0". You are running ' . PHP_VERSION . '.';
>>>>>>> 648ff96 (Cambios en yml)
}

if ($issues) {
    if (!headers_sent()) {
        header('HTTP/1.1 500 Internal Server Error');
    }
    if (!ini_get('display_errors')) {
        if (PHP_SAPI === 'cli' || PHP_SAPI === 'phpdbg') {
            fwrite(STDERR, 'Composer detected issues in your platform:' . PHP_EOL.PHP_EOL . implode(PHP_EOL, $issues) . PHP_EOL.PHP_EOL);
        } elseif (!headers_sent()) {
            echo 'Composer detected issues in your platform:' . PHP_EOL.PHP_EOL . str_replace('You are running '.PHP_VERSION.'.', '', implode(PHP_EOL, $issues)) . PHP_EOL.PHP_EOL;
        }
    }
    trigger_error(
        'Composer detected issues in your platform: ' . implode(' ', $issues),
        E_USER_ERROR
    );
}
