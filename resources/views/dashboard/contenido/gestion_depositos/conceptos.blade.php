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
                
            <!-- Boton Crear nuevo Usuario -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearConceptoModal">Crear nuevo</button>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-success" role="tablist">
                        <li class="nav-item" role="presentatio n">
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
                                            <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <label for="tipoconcepto" class="form-label">Tipo de concepto (Nombre):</label>
                                                        <input type="text" class="form-control" id="tipoconcepto" placeholder="Ingrese el tipo de documento">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="montominimo" class="form-label">Monto mínimo</label>
                                                        <input type="text" class="form-control" id="montominimo" placeholder="Ingrese el precio (monto minimo)">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="montominimo" class="form-label">Unidad involucrada</label>
                                                        <input type="text" class="form-control" id="montominimo" placeholder="Ingrese el precio (monto minimo)">
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <label for="involucrados" class="form-label">Involucrados</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="material-icons-outlined fs-5">description</i></span>
                                                            <select class="form-select" id="involucrados">
                                                                <option selected="">Selecciona el tipo de documento</option>
                                                                <option value="1">Nacionales</option>
                                                                <option value="2">Extranjeros</option>
                                                                <option value="3">Ambos</option>
                                                            </select>
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
                                    <button id="btnGuardarConcepto" type="button" class="btn btn-primary">Guardar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--********************** Modal para editar un concepto *****************************-->
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
                                        <div class="card mb-0">
                                            <div class="card-body">
                                            <form id="form_editar_concepto">
                                            <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <label for="tipoconcepto" class="form-label">Tipo de concepto (Nombre):</label>
                                                        <input type="text" class="form-control" id="tipoconcepto" placeholder="Ingrese el tipo de documento">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="montominimo" class="form-label">Monto mínimo</label>
                                                        <input type="text" class="form-control" id="montominimo" placeholder="Ingrese el precio (monto minimo)">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="montominimo" class="form-label">Unidad involucrada</label>
                                                        <input type="text" class="form-control" id="montominimo" placeholder="Ingrese el precio (monto minimo)">
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <label for="involucrados" class="form-label">Involucrados</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="material-icons-outlined fs-5">description</i></span>
                                                            <select class="form-select" id="involucrados">
                                                                <option selected="">Selecciona el tipo de documento</option>
                                                                <option value="1">Nacionales</option>
                                                                <option value="2">Extranjeros</option>
                                                                <option value="3">Ambos</option>
                                                            </select>
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
                                    <button id="btnEditarConcepto" type="button" class="btn btn-primary">Guardar</button> 
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
                                            <th>Costo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Registros y admisiones</td>
                                            <td>Matriculación</td>
                                            <td>Matriculación estudiantil</td>
                                            <td>Nacional</td>
                                            <td>Bs. 22</td>
                                            <td><button id="btnActivoConcepto" class="btn btn-success btn-sm">Activo</button></td>
                                            <td>
                                                <button id="btnEditarConcepto" class="btn btn-warning btn-sm"class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarConceptoModal">Editar</button>
                                                <button id="btnEliminarConcepto" class="btn btn-danger btn-sm">Eliminar</button>
                                            </td>
                                        </tr>
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
                                            <th>Costo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                            <td>1</td>
                                            <td>Registros y admisiones</td>
                                            <td>Matriculación</td>
                                            <td>Matriculación estudiantil</td>
                                            <td>Nacional</td>
                                            <td>Bs. 22</td>
                                            <td><button id="btnInactivoConcepto" class="btn btn-danger btn-sm">Inactivo</button></td>
                                            <td>
                                                <button id="btnEditarConcepto" class="btn btn-warning btn-sm"class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarConceptoModal">Editar</button>
                                                <button id="btnEliminarConcepto2" class="btn btn-danger btn-sm">Eliminar</button>
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
    document.getElementById("btnGuardarConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de guardar el Concepto?",
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
                        title: "Guardado exitosamente",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("form_guardar_concepto").submit();
                        setTimeout(() => {
                        location.reload();  
                        }, 1000);  
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha guardado el Concepto",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón editar concepto********************************
    document.getElementById("btnEditarConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de editar el Concepto?",
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
                        document.getElementById("form_editar_concepto").submit();
                        setTimeout(() => {
                        location.reload();  
                        }, 1000); 
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha modificado el Concepto",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón eliminar concepto********************************
        document.getElementById("btnEliminarConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de eliminar el Concepto?",
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
                        text: "Se eliminó el Concepto correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha eliminado el Concepto correctamente",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón eliminar concepto********************************
        document.getElementById("btnEliminarConcepto2").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de eliminar el Concepto?",
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
                        text: "Se eliminó el Concepto correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha eliminado el Concepto correctamente",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón activo a inactivo********************************
    document.getElementById("btnActivoConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de inactivar el Concepto?",
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
                        text: "El concepto se ha inactivo correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha inactivado el Concepto",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón inactivo a activo********************************
        document.getElementById("btnInactivoConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de activar el Concepto?",
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
                        text: "El Concepto se ha activo correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha activado el Concepto",
                        icon: "error"
                    });
                }
            });
        });

</script>
@endpush
