@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Administración de Bodega</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Valores universitarios</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
            <div class="col-xxl-8 d-flex align-items-stretch">
                    <div class="card w-100 overflow-hidden rounded-4">
                        <div class="card-body position-relative p-4">
                            <div class="row">
                                <div class="col-12 col-sm-7">
                                    <div class="d-flex align-items-center gap-3 mb-5">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle bg-grd-info p-1"
                                            width="60" height="60" alt="user">
                                        <div class="">
                                            <p class="mb-0 fw-semibold">Bienvenido/a</p>
                                            <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-5">
                                        <div class="">
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">65.000<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Valores activos</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-success" role="progressbar"
                                                    style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="">
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">78.000<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Valores inactivos</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-danger" role="progressbar"
                                                    style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="welcome-back-img pt-4">
                                        <img src="assets/images/gallery/image_bodega2.jpg" height="266" alt="">
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </div>
                <!-- Pestañas para usuarios activos e inactivos -->
        <h6 class="mb-0 text-uppercase">Administración de valores universitarios</h6>       
       <!-- Boton Crear nuevo Usuario -->
        <div class="d-flex justify-content-end mb-3">
            <button type="button" class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearValorunivModal">Crear nuevo</button>
        </div>
        <hr>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-success" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="pill" href="#tabValoresactivos" role="tab" aria-selected="true">
                            <div class="d-flex align-items-center">
                                <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                <div class="tab-title">Valores activos</div>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="pill" href="#tabValoresinactivos" role='tab' aria-selected='false' tabindex='-1'>
                            <div class='d-flex align-items-center'>
                                <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                <div class='tab-title'>Valores inactivos</div>
                            </div>
                        </a>
                    </li>
                
                    <!--********************* Modal para crear un nuevo valor ****************************-->
                    <div class="modal fade" id="crearValorunivModal" tabindex="-1" aria-labelledby="crearValorunivModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-primary py-2">
                                    <h5 class="modal-title text-white">Crear nuevo Valor Universitario</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="order-summary">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <form id="form_guardar_usuario">
                                                    <div class="row g-3">
                                                        <div class="col-12 col-md-6">
                                                            <label for="nombre" class="form-label">Tipo de documento:</label>
                                                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese el tipo de documento">
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="preciounitario" class="form-label">Precio unitario:</label>
                                                            <input type="number" class="form-control" id="preciounitario" placeholder="Ingrese el precio unitario">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button id="btnGuardarValoruni" type="button" class="btn btn-primary">Guardar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    </ul>
                <!--********************* Modal para editar un nuevo valor ****************************-->
                <div class="modal fade" id="editarValoruniModal" tabindex="-1" aria-labelledby="editarValorunivModalLabel" >
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0 bg-primary py-2">
                                <h5 class="modal-title text-white">Editar el Valor Universitario</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="order-summary">
                                    <div class="card mb-0">
                                        <div class="card-body">
                                            <form id="form_guardar_usuario">
                                                <div class="row g-3">
                                                    <div class="col-12 col-md-6">
                                                        <label for="nombre" class="form-label">Tipo documento:</label>
                                                        <input type="text" class="form-control" id="nombre" placeholder="Ingrese el tipo de documento">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="preciounitario" class="form-label">Precio unitario:</label>
                                                        <input type="text" class="form-control" id="preciounitario" placeholder="Ingrese el precio unitario">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                <button id="btnEditarValoruni" type="button" class="btn btn-primary">Guardar</button> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--***************Pestaña de Usuario activo************************-->
                <div class='tab-content' id='espacioactivo'>
                    
                    <div class='tab-pane fade show active' id='tabValoresactivos' role='tabpanel'>
                        <div class="table-responsive">
                            <table id="tablaValoresActivos" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tipo documento</th>
                                        <th>Precio unitario</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($valores_universitarios_activos as $valores)
                                    <tr>
                                        <td>{{ $valores->id }}</td>
                                        <td>{{ $valores->nombre }}</td>
                                        <td>{{ $valores->precio_unitario }}</td>
                                        <td><button class="btnActivoVal btn btn-success btn-sm" data-id="{{ $valores->id }}">Activo</button></td>
                                        <td>
                                            <button id="editarValoruniModal" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarValoruniModal">Editar</button>
                                            <button class="btnEliminarVal btn btn-danger btn-sm" data-id="{{ $valores->id }}">Eliminar</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--********************Pestaña de Usuario inactivo ***********************-->
                <div class='tab-content' id='espacioinactivo'>
                    
                    <div class='tab-pane fade show' id='tabValoresinactivos' role='tabpanel'>
                        <div class="table-responsive">
                                <table id="tablaValoresInactivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipo de documento                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      </th>
                                            <th>Precio unitario</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($valores_universitarios_inactivos as $valores)
                                            <tr>
                                                <td>{{ $valores->id }}</td>
                                                <td>{{ $valores->nombre }}</td>
                                                <td>{{ $valores->precio_unitario }}</td>
                                                <td><button class="btnInactivoVal btn btn-danger btn-sm" data-id="{{ $valores->id }}">Inactivo</button></td>
                                                <td>
                                                    <button id="editarValoruniModal" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarValoruniModal">Editar</button>
                                                    <button class="btnEliminarVal btn btn-danger btn-sm" data-id="{{ $valores->id }}">Eliminar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div> 
        </div>
                        
              
            </div>
        </div>
    </main>
    <div class="overlay btn-toggle"></div>
@endsection
@push('scripts')
    

    <script>
    $(document).ready(function() {
        $('#tablaValoresActivos').DataTable({
            responsive: true,
            paging: true,  
            searching: true,  
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });

    $(document).ready(function() {
        $('#tablaValoresInactivos').DataTable({
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
    //********************Script botón guardar valor universitario********************************
    document.addEventListener('DOMContentLoaded', function () {
  
    const btnGuardarValoruni = document.getElementById('btnGuardarValoruni');

    btnGuardarValoruni.addEventListener('click', function () {
        const nombre = document.getElementById('nombre').value;
        const preciounitario = document.getElementById('preciounitario').value;
        if (!nombre || !preciounitario) {
            Swal.fire({
                title: "Error",
                text: "Todos los campos son obligatorios.",
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }
        fetch('/guardarValor', {  
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                nombre: nombre,
                precio_unitario: preciounitario
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: "Éxito",
                    text: "El Valor universitario se ha creado correctamente.",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(() => {
                    location.reload(); 
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Hubo un error al crear el Valor universitario.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                title: "Error",
                text: "Hubo un error al realizar la acción.",
                icon: "error",
                confirmButtonText: "OK"
            });
        });
    });
});


    
    //********************Script botón editar usuario********************************
    document.getElementById("btnEditarValoruni").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de editar el Valor universitario?",
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
                        text: "Se ha modificado exitosamente",
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
                        text: "No se ha modificado el Valor universitario",
                        icon: "error"
                    });
                }
            });
        });
        
        //********************Script botón activo a inactivo********************************
        document.addEventListener('DOMContentLoaded', function() {
            const btnActivosVal = document.querySelectorAll('.btnActivoVal');
            
            btnActivosVal.forEach(function(btnActivoVal) {
                btnActivoVal.addEventListener('click', function (e) {
                    e.preventDefault();
                    const userId = this.getAttribute('data-id');
                    swalWithBootstrapButtons.fire({
                        title: "¿Estás seguro de inactivar el Valor universitario?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, inactivar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/val_univ/' + userId + '/inactivarVal', {
                                method: 'PUT', 
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ estado: 0 })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    swalWithBootstrapButtons.fire({
                                        title: "Guardado",
                                        text: "El Valor universitario ha sido desactivado correctamente.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        location.reload(); 
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Hubo un error al desactivar el Valor universitario",
                                        icon: "error"
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Hubo un error al realizar la acción.",
                                    icon: "error"
                                });
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Cancelado",
                                text: "El Valor universitario no ha sido desactivado.",
                                icon: "error"
                            });
                        }
                    });
                });
            });
        });
        //********************Script botón inactivo a activo********************************
        document.addEventListener('DOMContentLoaded', function() {
            // Seleccionar todos los botones con la clase 'btnInactivo'
            const btnInactivosVal = document.querySelectorAll('.btnInactivoVal');
            
            btnInactivosVal.forEach(function(btnInactivoVal) {
                btnInactivoVal.addEventListener('click', function (e) {
                    e.preventDefault();

                    const userId = this.getAttribute('data-id');

                    swalWithBootstrapButtons.fire({
                        title: "¿Estás seguro de activar el valor universitario?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, activar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Realizar la solicitud AJAX para cambiar el estado del usuario
                            fetch('/val_univ/' + userId + '/activarVal', {
                                method: 'PUT', 
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ estado: 1 })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    swalWithBootstrapButtons.fire({
                                        title: "Activado exitosamente",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        location.reload();  // Recargar la página para reflejar los cambios
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Hubo un error al activar el Valor Universitario.",
                                        icon: "error"
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Hubo un error al realizar la acción.",
                                    icon: "error"
                                });
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Cancelado",
                                text: "El Valor universitario no ha sido activado.",
                                icon: "error"
                            });
                        }
                    });
                });
            });
        });
        //********************Script botón eliminar usuario********************************
        document.addEventListener('DOMContentLoaded', function() {
            const btnEliminarVal = document.querySelectorAll('.btnEliminarVal');
            btnEliminarVal.forEach(function(btnEliminarVal) {
                btnEliminarVal.addEventListener('click', function (e) {
                    e.preventDefault();
                    const userId = this.getAttribute('data-id');
                    swalWithBootstrapButtons.fire({
                        title: "¿Estás seguro de eliminar el Valor universitario?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, eliminar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/val_univ/' + userId + '/eliminarVal', {
                                method: 'PUT', 
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ estado: 3 })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    swalWithBootstrapButtons.fire({
                                        title: "Eliminado exitosamente",
                                        text: "El Valor universitario ha sido eliminado correctamente.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        location.reload(); 
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Hubo un error al eliminar el Valor universitario",
                                        icon: "error"
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Hubo un error al realizar la acción.",
                                    icon: "error"
                                });
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Cancelado",
                                text: "El Valor universitario no ha sido eliminado.",
                                icon: "error"
                            });
                        }
                    });
                });
            });
        });
        
</script>
@endpush
