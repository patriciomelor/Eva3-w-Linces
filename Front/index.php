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
    <?php include 'component/apiNosotros.php'; ?>
    <?php include 'component/apiParcelas.php'; ?>
    <?php include 'component/apiPreguntasFrecuentes.php'; ?>
    <!--fin Js -->

    <script>
        // // Pegarle al Endpoint parcelas - Caro
  

        let contenidoEndpointParcelas = JSON.parse(<?php echo $endpointParcelas ?>);
        // console.log(contenidoEndpointParcelas);  
        printParcelas(contenidoEndpointParcelas);

        function printParcelas(_datos) {
            console.log(_datos);
            // const totalColumnas = datos.data.length !== 0 ? 12 / datos.data.length : 0;
            const totalColumnas = 12 / _datos.length;
            console.log('propiedad md-' + totalColumnas);

            const rowParcelas = document.getElementById('rowParcelas');
            rowParcelas.innerHTML = '';
            _datos.forEach(element => {
                console.log(element);

                //if (element.activo == true){
                //Creación de las columnas y tarjetas
                const columna = document.createElement('div');
                columna.classList.add('col-md-' + totalColumnas);
                columna.classList.add('card-group');
                columna.classList.add('justify-content-center');

                const tarjeta = document.createElement('div');
                tarjeta.classList.add('card');
                tarjeta.classList.add('h-100');

                const tarjetaHeader = document.createElement('div');
                tarjetaHeader.classList.add('card-header');
                tarjetaHeader.classList.add('justify-content-center');

                const tarjetaImg = document.createElement('div');
                //   tarjetaImg.classList.add('card-img')
                //   tarjetaImg.classList.add('container-img')
                tarjetaImg.classList.add('text-center')

                const tarjetaTitle = document.createElement('h2');
                tarjetaTitle.classList.add('card-title')
                tarjetaTitle.classList.add('mt-4')

                const imagen = document.createElement('img');
                imagen.src = element.link;
                imagen.style.width = '390px';

                const tarjetaBody = document.createElement('div');
                tarjetaBody.classList.add('card-body');

                const tarjetaFooter = document.createElement('div');
                tarjetaFooter.classList.add('card-Foot');
                tarjetaFooter.classList.add('d-grid');
                tarjetaFooter.classList.add('gap-2');
                tarjetaFooter.classList.add('col-6');
                tarjetaFooter.classList.add('mx-auto');
                tarjetaFooter.classList.add('mb-4');

                // Crear el botón
                const botonContacto = document.createElement('button');
                botonContacto.classList.add('btn');
                botonContacto.classList.add('btn-secondary');
                botonContacto.innerText = 'Contáctanos';
                botonContacto.onclick = function () {
                    // Hacer scroll hacia la sección de contacto
                    document.getElementById('contacto').scrollIntoView({ behavior: 'smooth' });
                };


                //Asignación de contenido a las tarjetas
                tarjetaImg.appendChild(imagen);
                tarjetaHeader.appendChild(tarjetaImg);

                tarjeta.appendChild(tarjetaHeader);
                columna.appendChild(tarjeta);
                rowParcelas.appendChild(columna);

                tarjetaTitle.innerHTML = element.nombre;
                tarjeta.appendChild(tarjetaTitle);


                tarjetaBody.innerHTML = '<p>' + element.descripcion + '</p>';
                tarjeta.appendChild(tarjetaBody);

                tarjetaFooter.appendChild(botonContacto);
                tarjeta.appendChild(tarjetaFooter);

                columna.appendChild(tarjeta);
                rowParcelas.appendChild(columna);


                //}
            })
        }
        

    </script>
</body>

</html>