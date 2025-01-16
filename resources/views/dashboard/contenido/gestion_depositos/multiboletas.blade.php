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
                            <li class="breadcrumb-item active" aria-current="page">Multiboletas</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabProveedoresactivos" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Generar código</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#tabProveedoresinactivos" role='tab' aria-selected='false' tabindex='-1'>
                                <div class='d-flex align-items-center'>
                                    <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                    <div class='tab-title'>Reporte de códigos generados</div>
                                </div>
                            </a>
                        </li>
                        <!--********************* Modal para crear un nuevo proveedor ****************************-->
                        <div class="modal fade" id="crearProveedorModal" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="crearProveedorModalLabel">Registre las boletas de "Paola Gema Mamani Janco"</h5>
                                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                            <i class="material-icons-outlined">close</i>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario para crear un nuevo proveedor -->
                                        <form id="form_guardar_multiboletas">
                                            <div class="row">
                                                <!-- Columna para Concepto y Nro. celular -->
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="concepto" class="form-label">Concepto</label>
                                                        <input type="text" class="form-control" id="concepto" placeholder="Ingrese el concepto">
                                                    </div>
                                                </div>

                                                <!-- Columna para Nro. celular -->
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="nrocelular" class="form-label">Nro de celular:</label>
                                                        <input type="text" class="form-control" id="nrocelular" placeholder="Ingrese el número de celular">
                                                    </div>
                                                </div>
                                                <!-- Contenedor para Nro. boleta y Monto -->
                                                <div id="boletas-container">
                                                        <div class="row boleta-row">
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="nro_boleta_1" class="form-label">Nro. boleta 1</label>
                                                                <input type="text" class="form-control" name="nro_boleta[]" placeholder="Ingrese el número de boleta">
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="monto_1" class="form-label">Monto</label>
                                                                <input type="text" class="form-control" name="monto[]" placeholder="Ingrese el monto">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-end">
                                                        <button id="agregar-boleta" class="btn btn-sm d-inline-flex align-items-center justify-content-center" style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;">
                                                            <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #95C11E; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">+</span> 
                                                        </button>   
                                                    </div>
                                            </div>                                         
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                        <button id="btnGuardarMultiboletas" type="button" class="btn btn-primary ms-auto">Guardar y generar código</button>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </ul>
                    <!--Pestaña de Proveedor activo-->
                    <div class='tab-content' id='espacioactivo'>
                        <div class='tab-pane fade show active' id='tabProveedoresactivos' role='tabpanel'>
                            <hr>
                            <h7 style="display: block; text-align: center; color: gray;" class="mb-3">
                                Busque al estudiante por su número de C.I. y número de matrícula universitaria
                            </h7>
                            <div class="col-12 col-lg-6">
                                <div class="row">
                                    <!-- Primer input: Gestión -->
                                    <div class="col-12 col-md-8">
                                        <div class="mb-3">
                                            <label for="input33a" class="form-label">Número de CI.</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="material-icons-outlined fs-5">pin</i></span>
                                                <input type="text" class="form-control" id="input33a" placeholder="Ingrese el número de CI">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Segundo input: Número de documento -->
                                    <div class="col-12 col-md-8">
                                        <div class="mb-3">
                                            <label for="input33a" class="form-label">Número de matrícula.</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="material-icons-outlined fs-5">pin</i></span>
                                                <input type="text" class="form-control" id="input33a" placeholder="Ingrese el número de CI">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table id="tablaProveedoresActivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre(s)</th>
                                            <th>Paterno</th>
                                            <th>Materno</th>
                                            <th>Nro de CI</th>
                                            <th>Carrera</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Paola Gema </td>
                                            <td>Mamani</td>
                                            <td>Janco</td>
                                            <td>13434344</td>
                                            <td>Ingenieria de Sistemas</td>
                                           
                                            <td>
    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#crearProveedorModal">Registrar boletas</button>
</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Pestaña de Reporte de códigos generados -->
                    <div class='tab-content' id='espacioinactivo'>   
                    <hr>
                            <h7 style="display: block; text-align: center; color: gray;" class="mb-3">
                                Busque al estudiante por su número de matrícula universitaria
                            </h7>
                        <div class='tab-pane fade show' id='tabProveedoresinactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaReportecodigosgenerados" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre </th>
                                            <th>Paterno</th>
                                            <th>Materno</th>
                                            <th>Nro. CI.</th>
                                            <th>Nro. Matrícula</th>
                                            <th>Carrera</th>
                                            <th>Fecha</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>PAOLA GEMA</td>
                                                <td>MAMANI</td>
                                                <td>JANCO</td>
                                                <td>13121234</td>
                                                <td>200000036</td>
                                                <td>INGENIERIA DE SISTEMAS</td>
                                                <td>20-12-2014</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm">Reenviar código</button>
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
        $('#tablaReportecodigosgenerados').DataTable({
            responsive: true,
            paging: true,  
            searching: true,  
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
    document.getElementById('agregar-boleta').addEventListener('click', function() {
        event.preventDefault(); 
        var newBoletaRow = document.createElement('div');
        newBoletaRow.classList.add('row', 'boleta-row');
        newBoletaRow.innerHTML = `
            <div class="col-12 col-md-6 mb-3">
                <label for="nro_boleta" class="form-label">Nro. boleta</label>
                <input type="text" class="form-control" name="nro_boleta[]" placeholder="Ingrese el número de boleta">
            </div>
            <div class="col-12 col-md-6 mb-3">
                <label for="monto" class="form-label">Monto</label>
                <input type="text" class="form-control" name="monto[]" placeholder="Ingrese el monto">
            </div>
        `;
        document.getElementById('boletas-container').appendChild(newBoletaRow);
    });
    const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        //********************Script botón guardar usuario********************************
        document.getElementById("btnGuardarMultiboletas").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de guardar las boletas y generar el código?",
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
                        title: "Guardado y generado exitosamente",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("form_guardar_multiboletas").submit();
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
</script>
@endpush
