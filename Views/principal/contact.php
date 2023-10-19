<?php include_once 'Views/template/header-principal.php'; ?>

<!-- Start Content Page -->
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Contacta con nosotros</h1>
        <p>
            ¿Tienes alguna pregunta o necesitas asistencia? Estamos aquí para ayudarte. En <?php echo TITLE; ?>, valoramos tu opinión y estamos disponibles para responder a tus consultas.
        </p>
    </div>
</div>

<!-- Start Contact -->
<div class="container py-5">
    <div class="row py-5">
        <form class="col-md-9 m-auto" method="post" role="form" action="https://formsubmit.co/ricoabraham879@gmail.com">
            <div class="row">
                <div class="form-group col-md-6 mb-3">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control mt-1" id="name" name="name" placeholder="Nombre">
                </div>
                <div class="form-group col-md-6 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="mb-3">
                <label for="phone">Teléfono</label>
                <input type="tel" class="form-control mt-1" id="phone" name="phone" placeholder="Teléfono">
            </div>
            <div class="mb-3">
                <label for="message">Mensaje</label>
                <textarea class="form-control mt-1" id="message" name="message" placeholder="Mensaje" rows="8"></textarea>
            </div>
            <div class="row">
                <div class="col text-end mt-2">
                    <button type="submit" value="enviar" class="btn btn-primary btn-lg px-3">Enviar</button>
                </div>
            </div>
            <input type="hidden" name="_next" value="http://localhost/tienda_virtual/principal/contactos">
            <input type="hidden" name="_captcha" value="false">
        </form>
    </div>
</div>
<!-- End Contact -->

<?php include_once 'Views/template/footer-principal.php'; ?>

</body>

</html>