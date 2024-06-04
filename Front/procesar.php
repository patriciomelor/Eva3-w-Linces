<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    $secretKey = '6LciQfApAAAAALJMyI38OGxAG5wVbAZO5VD6vmKY';
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    ];

    $options = [
        'http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($data)
        ]
    ];
    $context  = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captchaSuccess = json_decode($verify);

    if ($captchaSuccess->success) {
        echo "CAPTCHA verificado exitosamente.";
        // Procesa el formulario aquí
    } else {
        echo "Error: CAPTCHA no verificado.";
    }
}
?>
