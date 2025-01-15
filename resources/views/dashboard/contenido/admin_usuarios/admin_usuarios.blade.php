@extends('dashboard.app')
@section('contenido')
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Administración de usuarios</div>
        </div>
        <!--end breadcrumb-->
        <div class="row">
            <div class="col-xxl-8 d-flex align-items-stretch">
                <div class="card w-100 overflow-hidden rounded-4">
                    <div class="card-body position-relative p-4">
                        <div class="row">
                            <div class="col-12 col-sm-7">
                                <div class="d-flex align-items-center gap-3 mb-5">
                                    <img src="https://placehold.co/110x110/png" class="rounded-circle bg-grd-info p-1" width="60" height="60" alt="user">
                                    <div class="">
                                        <p class="mb-0 fw-semibold">Bienvenido/a </p>
                                        <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center gap-5">
                                    <div class="">
                                        <h4 class="mb-1 fw-semibold d-flex align-content-center">65<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h4>
                                        <p class="mb-3">Usuarios activos</p>
                                        <div class="progress mb-0" style="height:5px;">
                                             <div class="progress-bar bg-grd-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="">
                                        <h4 class="mb-1 fw-semibold d-flex align-content-center">78<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h4>
                                        <p class="mb-3">Usuarios inactivos</p>
                                        <div class="progress mb-0" style="height:5px;">
                                            <div class="progress-bar bg-grd-danger" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-5">
                                <div class="welcome-back-img pt-4">
                                    <img src="assets/images/gallery/welcome-back-3.png" height="180" alt="">
                                </div>
                            </div>
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div> 
        <!-- *********************Pestañas para usuarios activos e inactivos*********************** -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="mb-0 text-uppercase">Usuarios</h6>
            <div class="d-flex align-items-center">
                <button class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal"><i class="bi bi-plus-square"> </i>Crear nuevo usuario</button>
                
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">            
                <ul class="nav nav-tabs nav-success" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#tabUsuariosactivos" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                <div class="tab-title">Usuarios activos</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#tabUsuariosinactivos" role='tab' aria-selected='false' tabindex='-1'>
                            <div class='d-flex align-items-center'>
                                <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                <div class='tab-title'>Usuarios inactivos</div>
                            </div>
                        </a>
                    </li>
                    <!--********************** Modal para crear un nuevo usuario *****************************-->
                    <div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" style="max-width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-primary py-2">
                                    <h5 class="modal-title">Crear nuevo usuario</h5>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="order-summary">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <form id="form_guardar_usuario">
                                                    <div class="row">
                                                        <div class="col-md-4 border-end">
                                                            <div class="mb-3">
                                                                <label for="nombre" class="form-label">Nombre(s):</label>
                                                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del usuario">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                                                                <input type="text" class="form-control" id="apellidoPaterno" placeholder="Ingrese el apellido paterno">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                                                                <input type="text" class="form-control" id="apellidoMaterno" placeholder="Ingrese el apellido materno">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 border-end">
                                                            <div class="mb-3">
                                                                <label for="ci" class="form-label">Nro. C.I:</label>
                                                                <input type="number" class="form-control" id="ci" placeholder="Ingrese el número de C.I">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email:</label>
                                                                <input type="email" class="form-control" id="email" placeholder="Ingrese el email del usuario">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="celular" class="form-label">Nro. celular:</label>
                                                                <input type="number" class="form-control" id="celular" placeholder="Ingrese el número de celular">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="cargo" class="form-label">Cargo:</label>
                                                                <input type="text" class="form-control" id="cargo" placeholder="Ingrese el cargo del usuario">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="fechaInicio" class="form-label">Fecha inicio:</label>
                                                                <input type="date" class="form-control" id="fechaInicio">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="fechaFin" class="form-label">Fecha fin:</label>
                                                                <input type="date" class="form-control" id="fechaFin">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button id="btnGuardarUsuario" type="button" class="btn btn-primary">Guardar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--********************** Modal para editar un usuario *****************************-->
                    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" style="max-width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-primary py-2">
                                    <h5 class="modal-title">Editar usuario</h5>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="order-summary">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <form id="form_editar_usuario">
                                                    <div class="row">
                                                        <div class="col-md-4 border-end">
                                                            <div class="mb-3">
                                                                <label for="nombre" class="form-label">Nombre(s):</label>
                                                                <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del usuario">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                                                                <input type="text" class="form-control" id="apellidoPaterno" placeholder="Ingrese el apellido paterno">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                                                                <input type="text" class="form-control" id="apellidoMaterno" placeholder="Ingrese el apellido materno">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 border-end">
                                                            <div class="mb-3">
                                                                <label for="ci" class="form-label">Nro. C.I:</label>
                                                                <input type="number" class="form-control" id="ci" placeholder="Ingrese el número de C.I">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="email" class="form-label">Email:</label>
                                                                <input type="email" class="form-control" id="email" placeholder="Ingrese el email del usuario">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="celular" class="form-label">Nro. celular:</label>
                                                                <input type="number" class="form-control" id="celular" placeholder="Ingrese el número de celular">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label for="cargo" class="form-label">Cargo:</label>
                                                                <input type="text" class="form-control" id="cargo" placeholder="Ingrese el cargo del usuario">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="fechaInicio" class="form-label">Fecha inicio:</label>
                                                                <input type="date" class="form-control" id="fechaInicio">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="fechaFin" class="form-label">Fecha fin:</label>
                                                                <input type="date" class="form-control" id="fechaFin">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button id="btnEditarUsuario" type="button" class="btn btn-primary">Guardar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </ul>
                <!--*******************Pestaña de Usuario activo*************************-->
                <div class='tab-content' id='espacioactivo'>
                    <div class='tab-pane fade show active' id='tabUsuariosactivos' role='tabpanel'>
                        <div class="table-responsive">
                            <table id="tablaUsuariosActivos" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Juan Pérez</td>
                                        <td>juanperez@example.com</td>
                                        <td><button id="btnActivo" class="btn btn-success btn-sm">Activo</button></td>
                                        <td>
                                        <button id="editarUsuarioModal" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal">Editar</button>
                                        <button button id="btnEliminarUsuario" class="btn btn-danger btn-sm">Eliminar</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--***********Pestaña de Usuario inactivo **************-->
                <div class='tab-content' id='espacioinactivo'>
                    <div class='tab-pane fade show' id='tabUsuariosinactivos' role='tabpanel'>
                        <div class="table-responsive">
                                <table id="tablaUsuariosInactivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Mario Gómez</td>
                                            <td>mariogomez@example.com</td>
                                            <td><button id="btnInactivo" class="btn btn-danger btn-sm">Inactivo</button></td>
                                            <td>
                                                <button button id="editarUsuarioModal" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal">Editar</button>
                                                <button button id="btnEliminarUsuario" class="btn btn-danger btn-sm">Eliminar</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
    </div>
</main>
    @endsection
    @push('scripts')
    <script>
        //********************Script tabla usuarios activos********************************
        $(document).ready(function() {
            $('#tablaUsuariosActivos').DataTable({
                responsive: true,
                paging: true,  
                searching: true,  
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
        //********************Script tabla usuarios inactivos********************************
        $(document).ready(function() {
            $('#tablaUsuariosInactivos').DataTable({
                responsive: true,
                paging: true,  
                searching: true,  
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        //********************Script botón guardar usuario********************************
        document.getElementById("btnGuardarUsuario").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de guardar al usuario?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, guardar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true,
                didRender: () => {
                    const actionsContainer = document.querySelector('.swal2-actions');
                    if (actionsContainer) {
                        actionsContainer.style.justifyContent = "center"; 
                        actionsContainer.style.gap = "1rem"; 
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Guardado",
                        text: "El usuario se guardó correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("form_guardar_usuario").submit();
                        setTimeout(() => {
                        location.reload();  
                        }, 1000);  
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha enviado el formulario.",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón editar usuario********************************
        document.getElementById("btnEditarUsuario").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de guardar?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, guardar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true,
                didRender: () => {
                    const actionsContainer = document.querySelector('.swal2-actions');
                    if (actionsContainer) {
                        actionsContainer.style.justifyContent = "center"; 
                        actionsContainer.style.gap = "1rem"; 
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Guardado",
                        text: "La edición se guardó correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("form_editar_usuario").submit();
                        setTimeout(() => {
                        location.reload();  
                        }, 1000); 
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha editado la información",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón activo a inactivo********************************
        document.getElementById("btnActivo").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de inactivar al usuario?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, inactivar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true,
                didRender: () => {
                    const actionsContainer = document.querySelector('.swal2-actions');
                    if (actionsContainer) {
                        actionsContainer.style.justifyContent = "center"; 
                        actionsContainer.style.gap = "1rem"; 
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Guardado",
                        text: "El usuario se ha inactivo correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha inactivado al usuario",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón inactivo a activo********************************
        document.getElementById("btnInactivo").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de activar al usuario?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, activar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true,
                didRender: () => {
                    const actionsContainer = document.querySelector('.swal2-actions');
                    if (actionsContainer) {
                        actionsContainer.style.justifyContent = "center"; 
                        actionsContainer.style.gap = "1rem"; 
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Guardado",
                        text: "El usuario se ha activo correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha activado al usuario",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón eliminar usuario********************************
        document.getElementById("btnEliminarUsuario").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de eliminar al usuario?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true,
                didRender: () => {
                    const actionsContainer = document.querySelector('.swal2-actions');
                    if (actionsContainer) {
                        actionsContainer.style.justifyContent = "center"; 
                        actionsContainer.style.gap = "1rem"; 
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Guardado",
                        text: "Se eliminó al usuario correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha eliminado al usuario",
                        icon: "error"
                    });
                }
            });
        });


</script>
@endpush
    

