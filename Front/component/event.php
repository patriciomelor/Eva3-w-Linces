<?php
function getEndpointByToken($_endpoint, $_token)
{
    //echo 'endpoint: ' , $_endpoint , ' /token: ' , $_token;

    //Configuración de la solicitud con cURL
    $ch = curl_init($_endpoint);
    // Configurar Headers
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Authorization: Bearer ' . $_token
        )
    );
    //configurar la respuesta
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //ejecutar la solicitud (pegarle al Endpoint)
    $respuesta = curl_exec($ch);
    //verificar si existe una respuesta
    if ($respuesta === false) {
        return 'Error en la solicitud: ' . curl_error($ch);
    }
    //cerrar la sesioón cURL
    curl_close($ch);
    return $respuesta;
}

$endpointParcelas = getEndpointByToken('http://localhost/Eva3-w-Linces/backend/api/v2/parcela/get.php', 'get');
// echo $endpointParcelas;
$endpointParcelas = json_encode($endpointParcelas);
// echo $endpointParcelas;
?>