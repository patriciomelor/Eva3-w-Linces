<?php
function getEndpointByToken($_endpoint, $_token)
{
    //echo 'endpoint: ' , $_endpoint , ' /token: ' , $_token;

    //Configuración de la solicitud con cURL
    $ch = curl_init($_endpoint);
    // Configurar Headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
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


$variable = "algun contenido";
echo 'la función devuele: ' . getEndpointByToken('http://localhost/Eva3-w-Linces/backend/api/v2/parcela/get.php', 'get');

?>




<!DOCTYPE html><!--Pato-->
<html lang="Es">

<head>
    <?php include 'component/header.php'; ?>
</head>


<body>

    <head>
        <!--Barra de Navegacion-->
        <?php include 'component/nav.php'; ?>
        <!--Fin nav-->
    </head>
    <!--Hero-->
    <div>
        <?php include 'component/hero.php'; ?>
    </div>
    <!--Fin Hero-->
    <main>
        <section id="nosotros">
            <?php include 'component/nosotros.php'; ?>
        </section>
        <section id="parcelas">
            <?php include 'component/Parcelas.php'; ?>
        </section>
        <section id="casa_en_parcela">
            <?php include 'component/casa_en_parcela.php'; ?>
        </section>
        <section id="soloterreno">
            <?php include 'component/soloTerrenos.php'; ?>
        </section>
        <section id="preguntas_frecuentes">
            <?php include 'component/FAQs.php'; ?>
        </section>
        <!--Contacto-->
        <section id="contacto">
            <?php include 'component/contact.php'; ?>
        </section> <!--Pato-->
        <!--END Contacto-->

    </main>
    <!--footer-->
    <?php include 'component/footer.php'; ?>
    <!--fin footer-->

    <!-- Js -->
    <?php include 'component/Js.php'; ?>

    <!-- Pegarle al Endpoint parcelas - Caro -->
    <script>
        fetch ('http://localhost/Eva3-w-Linces/backend/api/v2/parcela/get.php', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer get', //(Cambiar clave)
                'Content-Type': 'application/json'
            }
        })

        .then(respuesta =>{
            if (respuesta.status != 200){
                throw new Error('No tenemos acceso al endpoint')
            }
            return respuesta.json();
        })

        .then(datos => { 
            console.log(datos);
        })

    </script>
            
</body>

</html>