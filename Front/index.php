<?php include 'component/event.php'; ?>
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
    
    <?php include 'component/apiDani.php'; ?>
    <?php include 'component/apiCaro.php'; ?>

</body>

</html>