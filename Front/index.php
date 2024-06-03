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

    <script>
        
        // Pegarle al Endpoint nosotros - Dani 

        fetch('http://localhost/Eva3-w-Linces/backend/api/v2/nosotros/get.php', {
            method: 'GET',
            headers: {
            'Authorization': 'Bearer get',
            'Content-Type': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
            // Lanza un error si la respuesta no es OK (cualquier código diferente a 2xx)
            throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log(data);
        })
        .catch(error => {
            console.error('Esto es un error:', error);
        });


        // Pegarle al Endpoint parcelas - Caro
        fetch ('http://localhost/Eva3-w-Linces/backend/api/v2/parcela/get.php', {
            method: 'GET',
            headers: {
                'Authorization': 'Bearer get',
                'Content-Type': 'application/json'
            }
        })

        .then(respuesta =>{
            if (respuesta.status != 200){
                throw new Error('No tiene acceso al Endpoint')
            }
            return respuesta.json();
        })

        .then(datos => { 
            console.log(datos);
            // const totalColumnas = datos.data.length !== 0 ? 12 / datos.data.length : 0;
            const totalColumnas = 12 / datos.length;
            console.log('propiedad md-' + totalColumnas);

            const rowParcelas = document.getElementById('rowParcelas');
            rowParcelas.innerHTML = '';   
            datos.forEach(element => {
                console.log(element);
 
                //if (element.activo == true){
                    //Creación de las columnas y tarjetas
                      const columna = document.createElement('div');
                      columna.classList.add('col-md-'+totalColumnas);
                    
                      const tarjeta = document.createElement('div');
                      tarjeta.classList.add('card');
                      tarjeta.classList.add('h-100');

                      const tarjetaHeader = document.createElement('div');
                      tarjetaHeader.classList.add('card-header');

                      const tarjetaTitle = document.createElement('h2');
                      tarjetaTitle.classList.add('card-title')

                      const tarjetaImg = document.createElement('div');
                      tarjetaImg.classList.add('card-img')

                      const tarjetaBody = document.createElement('div');
                      tarjetaBody.classList.add('card-body');

                      //Asignación de contenido a las tarjetas
                      tarjetaTitle.innerHTML = element.nombre;
                      tarjetaImg.innerHTML = element.tipo;
                      tarjetaHeader.appendChild(tarjetaImg);  
                      tarjetaHeader.appendChild(tarjetaTitle);  
     
                      tarjeta.appendChild(tarjetaHeader);
                      columna.appendChild(tarjeta);
                      rowParcelas.appendChild(columna);

                      tarjetaBody.innerHTML = '<p>'+element.descripcion + '</p>';
                      tarjeta.appendChild(tarjetaBody);
                      columna.appendChild(tarjeta);
                      rowParcelas.appendChild(columna);
                //}
            })
        })
        </script>

            
</body>
</html>
