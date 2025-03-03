@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestión de depósitos</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Conceptos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
                
            <!-- Boton Crear nuevo Concepto -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearConceptoModal">Crear nuevo concepto</button>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-success" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabConceptosactivos" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Conceptos activos</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#tabConceptosinactivos" role='tab' aria-selected='false' tabindex='-1'>
                                <div class='d-flex align-items-center'>
                                    <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                    <div class='tab-title'>Conceptos inactivos</div>
                                </div>
                            </a>
                        </li>
                    
                        <!--********************** Modal para crear un concepto*****************************-->
                        <div class="modal fade" id="crearConceptoModal" tabindex="-1" aria-labelledby="crearConceptoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" style="max-width: 80%;">
                                <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-primary py-2">
                                        <h5 class="modal-title">Crear nuevo concepto</h5>
                                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                            <i class="material-icons-outlined">close</i>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <div class="order-summary">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <form id="form_guardar_concepto">
                                                        <div class="row g-3">
                                                            <div class="col-12 col-md-6">
                                                                <label for="tipo_concepto" class="form-label">Grupo perteneciente</label>
                                                                <select class="form-control" name="tipo_concepto" id="tipo_concepto" >
                                                                    <option value="">Seleccione un grupo</option>
                                                                    @foreach ($tipoConcepto as $tipo)
                                                                        <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label for="unidad_movimiento" class="form-label">Unidad Involucrada</label>
                                                                <select class="form-control" name="unidad_movimiento" id="unidad_movimiento" >
                                                                    <option value="">Seleccione una unidad</option>
                                                                    @foreach ($UnidadInvolucrada as $unidad)
                                                                        <option value="{{ $unidad->id }}">{{ $unidad->descripcion }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label for="tipo_nacionalidad" class="form-label">Tipo de Nacionalidad</label>
                                                                <select class="form-control" name="tipo_nacionalidad" id="tipo_nacionalidad">
                                                                    <option value="">Seleccione el tipo de nacionalidad</option>
                                                                    <option value="1">Nacional</option>
                                                                    <option value="2">Extranjero</option>
                                                                </select>
                                                            </div>
                                                            <div class=" ol-12 col-md-6">
                                                                <label for="nombre_valor" class="form-label">Nombre documento:</label>
                                                                <input type="text" class="form-control" id="nombre_valor" placeholder="Ingrese el tipo de documento">
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
                                        <button id="btnGuardarConcepto" type="button" class="btn btn-primary">Guardar</button> 
                                    </div>
                                </div>
                            </div>
                        </div>   
                        <!--********************** Modal para editar un concepto*****************************-->
                        <div class="modal fade" id="editarConceptoModal" tabindex="-1" aria-labelledby="editarConceptoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" style="max-width: 80%;">
                                <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-primary py-2">
                                    <h5 class="modal-title">Editar concepto</h5>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                    <div class="modal-body">
                                    <div class="order-summary">
                                        <form id="form_editar_concepto">
                                        <div class="row g-3">
                                            @csrf 
                                            <div class="col-12 col-md-6">
                                                <label for="tipo_concepto_editar" class="form-label">Grupo perteneciente</label>
                                                 <select class="form-control" name="tipo_concepto_editar" id="tipo_concepto_editar" >
                                                    <option value="">Seleccione un grupo</option>
                                                        @foreach ($tipoConcepto as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->descripcion }}</option>
                                                            @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="unidad_movimiento_editar" class="form-label">Unidad Involucrada</label>
                                                <select class="form-control" name="unidad_movimiento_editar" id="unidad_movimiento_editar" >
                                                    <option value="">Seleccione una unidad</option>
                                                        @foreach ($UnidadInvolucrada as $unidad)
                                                            <option value="{{ $unidad->id }}">{{ $unidad->descripcion }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="tipo_nacionalidad_editar" class="form-label">Tipo de Nacionalidad</label>
                                                <select class="form-control" name="tipo_nacionalidad_editar" id="tipo_nacionalidad_editar">
                                                    <option value="">Seleccione el tipo de nacionalidad</option>
                                                    <option value="nacional">Nacional</option>
                                                    <option value="extranjero">Extranjero</option>
                                                </select>
                                            </div>                                       
                                            <div class="col-12 col-md-6">
                                                <label for="nombre_valor_editar" class="form-label">Nombre concepto</label>
                                                <input type="text" class="form-control" id="nombre_valor_editar" name="nombre_valor_editar">
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label for="preciounitario_editar" class="form-label">Monto mínimo</label>
                                                <input type="number" class="form-control" id="preciounitario_editar" name="preciounitario_editar">
                                            </div>
                                            <div class="modal-footer border-top-0">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                <button id="btnEditarConceptoGuardar" type="button" class="btn btn-primary">Guardar cambios</button> 
                                            </div>
</div>
                                        </form>
                                    </div>
</div>
                                </div>
                            </div>
                        </div>
               
                    </ul>
                    <!--Pestaña de Proveedor activo-->
                    <div class='tab-content' id='espacioactivo'>
                        <div class='tab-pane fade show active' id='tabConceptosactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaConceptosActivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Unidad involucrada</th>
                                            <th>Tipo de concepto</th>
                                            <th>Concepto</th>
                                            <th>Tipo (nacional/extranjero)</th>
                                            <th>Costo (Bs.)</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $contador = 1; @endphp
                                    @foreach($conceptos_activos as $concepto)
                                        <tr>

                                            <td>{{ $contador++ }}</td>
                                            <td>{{ $concepto->unidad_movimiento }}</td>
                                            <td>{{ $concepto->tipo_concepto }}</td>
                                            <td>{{ $concepto->concepto }}</td>
                                            <td>{{ $concepto->tipoNacionalidad }}</td>
                                            <td>{{ $concepto->montoMinimo}}</td>
                                            <td><button class="btnActivoConcepto btn btn-success btn-sm" data-id="{{ $concepto->id }}">Activo</button></td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button class="btnEditarConcepto btn btn-warning btn-sm " data-id="{{ $concepto->id }}" data-bs-toggle="modal" data-bs-target="#editarValoruniModal">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btnEliminarConcepto btn btn-danger btn-sm" data-id="{{ $concepto->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
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
                        <div class='tab-pane fade show' id='tabConceptosinactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaConceptosInactivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                            <th>#</th>
                                            <th>Unidad involucrada</th>
                                            <th>Tipo de concepto</th>
                                            <th>Concepto</th>
                                            <th>Tipo (nacional/extranjero)</th>
                                            <th>Costo (Bs.)</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @php $contador = 1; @endphp
                                        @foreach($conceptos_inactivos as $concepto)
                                            <tr>
                                                <td>{{ $contador++ }}</td> 
                                                <td>{{ $concepto->unidad_movimiento }}</td>
                                                <td>{{ $concepto->tipo_concepto }}</td>
                                                <td>{{ $concepto->concepto }}</td>
                                                <td>{{ $concepto->tipoNacionalidad }}</td>
                                                <td>{{ $concepto->montoMinimo}}</td>
                                                <td><button class="btnInactivoConcepto btn btn-danger btn-sm" data-id="{{ $concepto->id }}">Inactivo</button></td>
                                                <td>
                                                <div class="d-flex gap-2">
                                                    <button class="btnEditarConcepto btn btn-warning btn-sm " data-id="{{ $concepto->id }}" data-bs-toggle="modal" data-bs-target="#editarConceptoModal">
                                                        <i class="bi bi-pencil"></i>
                                                    </button>
                                                    <button class="btnEliminarConcepto btn btn-danger btn-sm" data-id="{{ $concepto->id }}">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
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
        $('#tablaConceptosActivos').DataTable({
            responsive: true,
            paging: true,  
            searching: true,  
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });

    $(document).ready(function() {
        $('#tablaConceptosInactivos').DataTable({
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
        const btnGuardarConcepto = document.getElementById('btnGuardarConcepto');

        btnGuardarConcepto.addEventListener('click', function () {
            const tipoConcepto = document.getElementById('tipo_concepto').value;
            const unidadMovimiento = document.getElementById('unidad_movimiento').value;
            const tipoNacionalidad = document.getElementById('tipo_nacionalidad').value;
            const nombre = document.getElementById('nombre_valor').value;
            const preciounitario = document.getElementById('preciounitario').value;
            

            if ( !tipoConcepto || !unidadMovimiento || !tipoNacionalidad || !nombre || !preciounitario) {
                Swal.fire({
                    title: "Error",
                    text: "Todos los campos son obligatorios.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }
            Swal.fire({
                title: "¿Está seguro?",
                text: "¿Desea guardar el Valor Universitario?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, guardar",
                cancelButtonText: "Cancelar"
            }).then((result) => {
                if (result.isConfirmed) {
                
                    fetch('/guardarConcepto', {  
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            tipo_concepto: tipoConcepto,
                            unidad_movimiento: unidadMovimiento,
                            tipo_nacionalidad: tipoNacionalidad,
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
                }
            });
        });
    });
    //********************Script para manejar la inactivación de conceptos********************
    document.addEventListener('DOMContentLoaded', function() {
        const tablaConceptos = document.getElementById('tablaConceptosActivos');
        if (tablaConceptos) {
            tablaConceptos.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btnActivoConcepto')) {
                    e.preventDefault();
                    const userId = e.target.getAttribute('data-id');
                    Swal.fire({
                        title: "¿Estás seguro de inactivar el Concepto?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, inactivar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/concepto_univ/' + userId + '/inactivarConcepto', {
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
                                        text: "El Concepto ha sido desactivado correctamente.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Hubo un error al desactivar el Concepto",
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
                                text: "El Concepto no ha sido desactivado.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        } else {
            console.warn('No se encontró el elemento con ID "tablaConceptosActivos".');
        }
    });
    //********************Script botón inactivo a activo********************************
    document.addEventListener('DOMContentLoaded', function() {
        const tablaConceptosInactivos = document.getElementById('tablaConceptosInactivos');
        if (tablaConceptosInactivos) {
            tablaConceptosInactivos.addEventListener('click', function(e) {
                if (e.target && e.target.classList.contains('btnInactivoConcepto')) {
                    e.preventDefault();
                    const userId = e.target.getAttribute('data-id');
                    Swal.fire({
                        title: "¿Estás seguro de activar el Concepto?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, activar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/concepto_univ/' + userId + '/activarConcepto', {
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
                                        text: "El Concepto ha sido activado correctamente.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        location.reload();
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Hubo un error al activar el Concepto",
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
                                text: "El Concepto no ha sido activado.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        } else {
            console.warn('No se encontró el elemento con ID "tablaConceptosInactivos".');
        }
    });
    //********************Script botón eliminar concepto********************************

    document.addEventListener('DOMContentLoaded', function() {
        const btnEliminarConcepto = document.querySelectorAll('.btnEliminarConcepto');
        btnEliminarConcepto.forEach(function(btnEliminarConcepto) {
            btnEliminarConcepto.addEventListener('click', function (e) {
                e.preventDefault();
                const userId = this.getAttribute('data-id');
                swal.fire({
                    title: "¿Estás seguro de eliminar el Concepto?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('/concepto_univ/' + userId + '/eliminarConcepto', {
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
                                swal.fire({
                                    title: "Eliminado exitosamente",
                                    text: "El Concepto ha sido eliminado correctamente.",
                                    icon: "success",
                                    confirmButtonText: "OK"
                                }).then(() => {
                                    location.reload(); 
                                });
                            } else {
                                swal.fire({
                                    title: "Error",
                                    text: "Hubo un error al eliminar el Concepto",
                                    icon: "error"
                                });
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            swal.fire({
                                title: "Error",
                                text: "Hubo un error al realizar la acción.",
                                icon: "error"
                            });
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "Cancelado",
                            text: "El Concepto no ha sido eliminado.",
                            icon: "error"
                        });
                    }
                });
            });
        });
    });

//********************Script botón editar Valor universitario********************************
$(document).ready(function() {
    $('.btnEditarConcepto').on('click', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '{{ route("concepto.obtenerconcepto") }}',
            type: 'GET',
            data: { id: id },
            success: function(response) {
                if (response) {
                    console.log(response);
                    $('#tipo_concepto_editar').val(response.id_tipo);
                    $('#unidad_movimiento_editar').val(response.unidadMovimiento_id);
                    $('#tipo_nacionalidad_editar').val(response.tipoNacionalidad);
                    $('#nombre_valor_editar').val(response.concepto);
                    $('#preciounitario_editar').val(response.montoMinimo);

                    $('#btnEditarConceptoGuardar').data('id', id);
                    $('#btnEditarConcepto').data('id', id);
                    $('#editarConceptoModal').modal('show');
                    
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

    // *******Script para guardar los cambios con confirmación de SweetAlert***
    $('#btnEditarConceptoGuardar').on('click', function() {
        var id = $(this).data('id');
        var tipoConcepto = $('#tipo_concepto_editar').val();
        var unidad_movimiento = $('#unidad_movimiento_editar').val();
        var tipoNacionalidad = $('#tipo_nacionalidad_editar').val();
        var nombre_concepto = $('#nombre_valor_editar').val();
        var monto = $('#preciounitario_editar').val();
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
                    url: '{{ route("concepto.actualizarconcepto") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        tipoConcepto: tipoConcepto,
                        unidad_movimiento: unidad_movimiento,
                        tipoNacionalidad: tipoNacionalidad,
                        nombre_concepto: nombre_concepto,
                        monto: monto
                    },
                    success: function(response) {
                        if (response.success) {
                           
                            Swal.fire(
                                '¡Guardado!',
                                'El registro se actualizó correctamente.',
                                'success'
                            );
                            $('#editarValoruniModal').modal('hide');
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




   



        
</script>
@endpush
