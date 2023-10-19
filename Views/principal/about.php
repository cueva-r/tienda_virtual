<?php include_once 'Views/template/header-principal.php'; ?>

<section class="bg-primary py-5">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col-md-8 text-white">
                <h1>Sobre nosotros</h1>
                <p>
                    Bienvenido a <span><?php echo TITLE; ?></span>, tu destino de confianza para dispositivos electrónicos de vanguardia. En <span><?php echo TITLE; ?></span>, creemos en la innovación, la calidad y la satisfacción del cliente. Desde nuestros humildes comienzos, nos hemos dedicado a proporcionar a nuestros clientes una experiencia de compra excepcional y a ofrecer los productos electrónicos más avanzados y emocionantes del mercado.

                    Nuestra historia comenzó en 2022, cuando un equipo de apasionados por la tecnología decidió unir fuerzas para brindar soluciones electrónicas excepcionales a nuestros clientes. A lo largo de los años, hemos crecido y evolucionado, pero nuestra misión fundamental sigue siendo la misma: facilitar el acceso a la última tecnología electrónica a precios asequibles.
                </p>
            </div>
            <div class="col-md-4">
                <img src="<?php echo BASE_URL; ?>assets/img/about-hero.svg" alt="About Hero">
            </div>
        </div>
    </div>
</section>
<!-- Close Banner -->

<!-- Start Section -->
<section class="container py-5">
    <div class="row text-center pt-5 pb-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Nuestros servicios</h1>
            <p>
                En <span><?php echo TITLE; ?></span>, no solo ofrecemos una amplia gama de dispositivos electrónicos de primera calidad, sino que también brindamos una serie de servicios excepcionales para mejorar tu experiencia de compra y asegurarnos de que aproveches al máximo tus productos electrónicos. Nuestros servicios incluyen:
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-lg-4 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-primary text-center"><i class="fa fa-truck fa-lg"></i></div>
                <h2 class="h5 mt-4 text-center">Servicios de entrega</h2>
            </div>
        </div>

        <div class="col-md-3 col-lg-4 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-primary text-center"><i class="fas fa-exchange-alt"></i></div>
                <h2 class="h5 mt-4 text-center">Envío y devolución</h2>
            </div>
        </div>

        <div class="col-md-3 col-lg-4 pb-5">
            <div class="h-100 py-5 services-icon-wap shadow">
                <div class="h1 text-primary text-center"><i class="fa fa-percent"></i></div>
                <h2 class="h5 mt-4 text-center">Completado</h2>
            </div>
        </div>
    </div>
</section>
<!-- End Section -->

<?php include_once 'Views/template/footer-principal.php'; ?>
</body>

</html>