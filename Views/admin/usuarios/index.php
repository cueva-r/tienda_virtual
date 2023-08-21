<?php include_once 'Views/template/header-admin.php' ?>

<button class="btn btn-outline-primary mb-3" type="button" id="nuevo_registro"><i class="fa-solid fa-plus"></i></button>

<div class="card">
    <div class="card-body">
        <div class="table-resposive">
            <table class="table table-bordered table-striped table-hover" style="width: 100%;" id="tblUsuarios">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="titleModal"></h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form id="frmRegistro">
                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group mb-2">
                        <label for="nombre"><i class="fa-regular fa-address-card"></i> Nombres</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre">
                    </div>
                    <div class="form-group mb-2">
                        <label for="apellido"><i class="fa-regular fa-address-card"></i> Apellidos</label>
                        <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellidos">
                    </div>
                    <div class="form-group mb-2">
                        <label for="correo"><i class="fas fa-envelope"></i> Correo</label>
                        <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo">
                    </div>
                    <div class="form-group mb-2">
                        <label for="clave"><i class="fa-solid fa-key"></i> Contraseña</label>
                        <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-primary" type="submit" id="btnAccion"><i class="fa-solid fa-circle-plus"></i></button>
                    <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-ban"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once 'Views/template/footer-admin.php' ?>

<script src="<?php echo BASE_URL . 'assets/js/modulos/usuarios.js' ?>"></script>

</body>

</html>