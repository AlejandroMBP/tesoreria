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
                <button type="button" class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearProveedorModal">Crear nuevo</button>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabProveedoresactivos" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Conceptos activos</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#tabProveedoresinactivos" role='tab' aria-selected='false' tabindex='-1'>
                                <div class='d-flex align-items-center'>
                                    <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                    <div class='tab-title'>Conceptos inactivos</div>
                                </div>
                            </a>
                        </li>
                    
                        <!--********************* Modal para crear un nuevo proveedor ****************************-->
                        <div class="modal fade" id="crearProveedorModal" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="crearProveedorModalLabel">Crear nuevo proveedor</h5>
                                        <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                            <i class="material-icons-outlined">close</i>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Formulario para crear un nuevo proveedor -->
                                        <form>
                                            <div class="row">
                                                
                                                    <div class="mb-3">
                                                        <label for="nombreproveedor" class="form-label">Nombre del proveedor:</label>
                                                        <input type="text" class="form-control" id="nombreproveedor" placeholder="Ingrese el tipo de documento">
                                                    </div>
                                                
                                                
                                                    <div class="mb-3">
                                                        <label for="nrocelular" class="form-label">Nro de celular:</label>
                                                        <input type="text" class="form-control" id="nrocelular" placeholder="Ingrese el precio unitario">
                                                    </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-12 text">
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
                                            <td><button class="btn btn-success btn-sm">Activo</button></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm">Editar</button>
                                                <button class="btn btn-danger btn-sm">Eliminar</button>
                                            </td>
                                        </tr>
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
                                            <tr>
                                                <td>1</td>
                                                <td>FLORALES</td>
                                                <td>72648223</td>
                                                <td>florales@gmail.com</td>
                                                <td>Av. montes #434</td>
                                                <td><button class="btn btn-danger btn-sm">Inactivo</button></td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm">Editar</button>
                                                    <button class="btn btn-danger btn-sm">Eliminar</button>
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
        $('#tablaProveedoresInactivos').DataTable({
            responsive: true,
            paging: true,  
            searching: true,  
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>
@endpush
