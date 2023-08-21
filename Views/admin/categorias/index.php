<?php include_once 'Views/template/header-admin.php' ?>

<button class="btn btn-outline-primary mb-3" type="button" id="nuevo_registro"><i class="fa-solid fa-plus"></i></button>

<div class="card">
    <div class="card-body">
        <div class="table-resposive">
            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblCategorias">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
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
                    <input type="hidden" id="imagen_actual" name="imagen_actual">
                    <div class="form-group mb-2">
                        <label for="categoria"><i class="fa-regular fa-clipboard"></i> Nombre</label>
                        <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categorias">
                    </div>
                    <div class="form-group">
                        <label for="imagen"><i class="fa-regular fa-image"></i> Imagen(Opcional)</label>
                        <input id="imagen" class="form-control-file" type="file" name="imagen">
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

<script src="<?php echo BASE_URL . 'assets/js/modulos/categorias.js' ?>"></script>

</body>

</html>