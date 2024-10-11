<div class="modal fade" id="createRolModal" tabindex="-1" aria-labelledby="createRolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                <h5 class="modal-title" id="createRolModalLabel">Crear Rol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="createRolForm" action="" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="name_create" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name_create" name="name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="username_create" class="form-label">Nombre Usuario</label>
                            <input type="text" class="form-control" id="username_create" name="username" required>
                        </div>
                        <div class="col-md-12">
                            <label for="userEmail_create" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail_create" name="email" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-grd-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-grd-info">Crear Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
