<form action="{{ route('roles.store') }}" method="POST">
    @csrf

    <div class="modal fade" id="createRolModal" tabindex="-1" aria-labelledby="createRolModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <!-- Encabezado -->
                <div class="modal-header border-bottom-0 bg-grd-primary py-2">
                    <h5 class="modal-title" id="CombinedModalLabel">Crear Rol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Cuerpo del Modal -->
                <div class="modal-body">
                    <!-- Sección de Aplicar Código de Descuento -->
                    <div class="card border bg-transparent shadow-none mb-4">
                        <div class="card-body">
                            <p class="fs-5">Nombre del Rol</p>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control"
                                    placeholder="Ingrese nombre del Rol" required>
                            </div>
                        </div>
                    </div>

                    <!-- Lista de Usuarios con Switches -->
                    <div class="card w-100 mb-0 shadow-none">
                        <div class="card-body p-0 card-header card border bg-transparent shadow-none mb-4">
                            <div class="user-list p-3">
                                <div class="d-flex flex-column gap-3">
                                    <p class="fs-5">Agregar Permisos</p>
                                    <!-- Ejemplo de Usuario con Switch -->
                                    @foreach ($permissions as $per)
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div class="d-flex align-items-center gap-3">
                                                <div>
                                                    <h6 class="mb-0">{{ $per->name }}</h6>
                                                </div>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                                    value="{{ $per->name }}" id="switch{{ $per->id }}">
                                                <label class="form-check-label" for="switch{{ $per->id }}"></label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal-footer border-top-0 bg-grd-primary p-3">
                    <button type="submit" class="btn btn-primary">Crear Rol</button>
                </div>
            </div>
        </div>
    </div>
</form>
