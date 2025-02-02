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
                            <li class="breadcrumb-item active" aria-current="page">Proveedores</li>
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
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">65.4K<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Proveedores activos</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-success" role="progressbar"
                                                    style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="">
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">78.4<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Proveedores inactivos</p>
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
            </div>
            <!-- Pestañas para usuarios activos e inactivos -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0 text-uppercase">Administración de Proveedores</h6>
                <div class="d-flex align-items-center">
                    <button class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearProvModal"><i class="bi bi-plus-square"> </i>Crear nuevo </button>       
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-success" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabProveedoresactivos" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Proveedores activos</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#tabProveedoresinactivos" role='tab' aria-selected='false' tabindex='-1'>
                                <div class='d-flex align-items-center'>
                                    <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                    <div class='tab-title'>Proveedores inactivos</div>
                                </div>
                            </a>
                        </li>
                        <!--********************* Modal para crear un proveedor ****************************-->   
                        <div class="modal fade" id="crearProvModal" tabindex="-1" aria-labelledby="crearProvModalLabel" >
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 bg-primary py-2">
                                        <h5 class="modal-title text-white">Crear nuevo Proveedor</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="order-summary">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <form id="form_guardar_proveedor">
                                                        <div class="row g-3">
                                                            <div class="col-12 col-md-6">
                                                                <label for="nombreprov" class="form-label">Nombre del Proveedor</label>
                                                                <input type="text" class="form-control" id="nombreprov" placeholder="Ingrese el nombre del proveedor">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label for="direccionprov" class="form-label">Dirección:</label>
                                                                <input type="text" class="form-control" id="direccionprov" placeholder="Ingrese la dirección del proveedor">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label for="contactoprov" class="form-label">Nro. celular</label>
                                                                <input type="number" class="form-control" id="contactoprov" placeholder="Ingrese el Nro. celular ">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label for="emailprov" class="form-label">Correo electrónico</label>
                                                                <input type="email" class="form-control" id="emailprov" placeholder="Ingrese el correo electrónico del proveedor">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        <button id="btnGuardarProv" type="button" class="btn btn-primary">Guardar</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--********************* Modal para editar un proveedor ****************************-->
                        <div class="modal fade" id="editarProvModal" tabindex="-1" aria-labelledby="editarProvModalLabel" >
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 bg-primary py-2">
                                        <h5 class="modal-title text-white">Editar Proveedor</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="order-summary">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <form id="form_editar_proveedor">
                                                        <div class="row">
                                                            <div class="mb-3">
                                                                <label for="nombreproveedoredit" class="form-label">Nombre Proveedor</label>
                                                                <input type="text" class="form-control" id="nombreproveedoredit" placeholder="Ingrese el nombre proveedor">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="direccionproveedoredit" class="form-label">Dirección</label>
                                                                <input type="text" class="form-control" id="direccionproveedoredit" placeholder="Ingrese la dirección">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nrocelularproveedoredit" class="form-label">Nro_celular</label>
                                                                <input type="number" class="form-control" id="nrocelularproveedoredit" placeholder="Ingrese el número de celular">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="correoelectronicoproveedoredit" class="form-label">Correo electrónico</label>
                                                                <input type="email" class="form-control" id="correoelectronicoproveedoredit" placeholder="Ingrese el correo electrónico">
                                                            </div>
                                                        </div>    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        <button id="btnEditarProv" type="button" class="btn btn-primary">Guardar</button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </ul>
                    <!--Pestaña de Proveedor activo-->
                    <div class='tab-content' id='espacioactivo'>
                        <div class='tab-pane fade show active' id='tabProveedoresactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaProveedoresActivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre proveedor</th>
                                            <th>Dirección</th>
                                            <th>Nro. celular</th>
                                            <th>Correo electrónico</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proveedores_activos as $proveedores)
                                        <tr>
                                            <td>{{ $proveedores->id }}</td>
                                            <td>{{ $proveedores->nombre }}</td>
                                            <td>{{ $proveedores->direccion }}</td>
                                            <td>{{ $proveedores->contacto }}</td>
                                            <td>{{ $proveedores->email }}</td>
                                            <td><button class="btnActivoProv btn btn-success btn-sm" data-id="{{ $proveedores->id }}">Activo</button></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm btnEditarProv" data-id="{{ $proveedores->id }}" 
                                                    data-bs-toggle="modal" data-bs-target="#editarProvModal">
                                                    Editar
                                                </button>
                                                <button button class="btnEliminarProv btn btn-danger btn-sm" data-id="{{ $proveedores->id }}">Eliminar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Pestaña de Usuario inactivo -->
                    <div class='tab-content' id='espacioinactivo'>   
                        <div class='tab-pane fade show' id='tabProveedoresinactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaProveedoresInactivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre proveedor</th>
                                            <th>Nro. celular</th>
                                            <th>Correo electrónico</th>
                                            <th>Dirección</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($proveedores_inactivos as $proveedores)
                                        <tr>
                                            <td>{{ $proveedores->id }}</td>
                                            <td>{{ $proveedores->nombre }}</td>
                                            <td>{{ $proveedores->direccion }}</td>
                                            <td>{{ $proveedores->contacto }}</td>
                                            <td>{{ $proveedores->email }}</td>
                                            <td><button class="btnInactivoProv btn btn-danger btn-sm" data-id="{{ $proveedores->id }}">Inactivo</button></td>
                                                <td>
                                                <button class="btn btn-warning btn-sm btnEditarProv" data-id="{{ $proveedores->id }}" 
                                                    data-bs-toggle="modal" data-bs-target="#editarProvModal">
                                                    Editar
                                                </button>
                                                    <button button class="btnEliminarProv btn btn-danger btn-sm" data-id="{{ $proveedores->id }}">Eliminar</button>
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
    </main>
    <div class="overlay btn-toggle"></div>
@endsection
@push('scripts')
    <script>
    $(document).ready(function() {
        $('#tablaProveedoresActivos').DataTable({
            responsive: true,
            paging: true,  
            searching: true,  
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });

    $(document).ready(function() {
        $('#tablaProveedoresInactivos').DataTable({
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
    //********************Script botón guardar nuevo proveedor********************************
document.addEventListener('DOMContentLoaded', function () {
    const btnGuardarProv = document.getElementById('btnGuardarProv');

    btnGuardarProv.addEventListener('click', function () {
        const nombreprov = document.getElementById('nombreprov').value.trim();
        const direccionprov = document.getElementById('direccionprov').value.trim();
        const contactoprov = document.getElementById('contactoprov').value.trim();
        const emailprov = document.getElementById('emailprov').value.trim();

        if (!nombreprov || !direccionprov || !contactoprov || !emailprov) {
            Swal.fire({
                title: "Error",
                text: "Todos los campos son obligatorios.",
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }
        fetch('/guardarProv', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                nombre: nombreprov,
                direccion: direccionprov,
                contacto: contactoprov,
                email: emailprov 
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`Error HTTP: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: "Éxito",
                    text: "El Proveedor se ha creado correctamente.",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(() => {
                    location.reload();  
                });
            } else {
                throw new Error(data.message || "Error desconocido");
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


    //********************Script botón activo a inactivo********************************
    document.addEventListener('DOMContentLoaded', function() {
        const btnActivoProv = document.querySelectorAll('.btnActivoProv');
        btnActivoProv.forEach(function(btnActivoProv) {
            btnActivoProv.addEventListener('click', function (e) {
                e.preventDefault();
                const userId = this.getAttribute('data-id');
                console.log('ID del proveedor:', userId);
                swalWithBootstrapButtons.fire({
                    title: "¿Estás seguro de inactivar el Proveedor?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, inactivar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('/proveedores/' + userId + '/inactivarProv', {
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
                                    title: "Inactivado exitosamente",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    location.reload(); 
                            });
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Hubo un error al inactivar el Proveedor.",
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
                            text: "El Proveedor no ha sido inactivado.",
                            icon: "error"
                                
                        });
                    }
                });
            });
        });
    });

    //************************************script editar proveedor ***************/
    $(document).ready(function() {
    // Script para abrir el modal de edición
    $('.btnEditarProv').on('click', function() {
        
        var id = $(this).data('id');
        if (!id) {
            console.error("ID no válido");
            return;
        }
        $.ajax({
            url: '{{ route("proveedores.obtenerProv") }}',
            type: 'GET',
            data: { id: id },
            success: function(response) {
                if (response) {
                    console.log(response);
                    $('#nombreproveedoredit').val(response.nombre);
                    $('#direccionproveedoredit').val(response.direccion);
                    $('#nrocelularproveedoredit').val(response.contacto);
                    $('#correoelectronicoproveedoredit').val(response.email);

                    $('#btnEditarProv').data('id', id);
                    $('#editarProvModal').modal('show');
                } else {
                    alert('No se encontraron datos.');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('Error al obtener los datos.');
            }
        });
    });
    $('#btnEditarProv').on('click', function() {
        var id = $(this).data('id');
        var nombre = $('#nombreproveedoredit').val();
        var direccion = $('#direccionproveedoredit').val();
        var contacto = $('#nrocelularproveedoredit').val();
        var email = $('#correoelectronicoproveedoredit').val();

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Quieres guardar los cambios?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, guardar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("proveedores.actualizarProv") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        nombre: nombre,
                        direccion: direccion,
                        contacto:contacto,
                        email:email
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire(
                                '¡Guardado!',
                                'El registro se actualizó correctamente.',
                                'success'
                            );
                            $('#editarProvModal').modal('hide');
                            location.reload(); 
                        } else {
                            Swal.fire(
                                'Error',
                                'Hubo un error al actualizar.',
                                'error'
                            );
                        }
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        Swal.fire(
                            'Error',
                            'Hubo un error inesperado.',
                            'error'
                        );
                    }
                });
            }
        });
    });
});

    //********************Script botón inactivo a activo********************************
    document.addEventListener('DOMContentLoaded', function() {     
        const btnInactivoProv = document.querySelectorAll('.btnInactivoProv');
        btnInactivoProv.forEach(function(btnInactivoProv) {
            btnInactivoProv.addEventListener('click', function (e) {
                e.preventDefault();
                const userId = this.getAttribute('data-id');
                console.log('ID del proveedor:', userId);
                swalWithBootstrapButtons.fire({
                    title: "¿Estás seguro de activar el Proveedor?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, activar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('/proveedores/' + userId + '/activarProv', {
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
                                    title: "Activado exitosamente",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    location.reload(); 
                            });
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Hubo un error al activar el Proveedor.",
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
                            text: "El Proveedor no ha sido activado.",
                            icon: "error"
                                
                        });
                    }
                });
            });
        });
    });
    //********************Script botón eliminar proveedor********************************
    document.addEventListener('DOMContentLoaded', function() {     
        const btnEliminarProv = document.querySelectorAll('.btnEliminarProv');
        btnEliminarProv.forEach(function(btnEliminarProv) {
            btnEliminarProv.addEventListener('click', function (e) {
                e.preventDefault();
                const userId = this.getAttribute('data-id');
                console.log('ID del proveedor:', userId);
                swalWithBootstrapButtons.fire({
                    title: "¿Estás seguro de eliminar el Proveedor?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, elimianr!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('/proveedores/' + userId + '/eliminarProv', {
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
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    location.reload(); 
                            });
                            } else {
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Hubo un error al activar el Proveedor.",
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
                            text: "El Proveedor no ha sido eliminado.",
                            icon: "error"
                                
                        });
                    }
                });
            });
        });
    });
    

</script>
@endpush
