@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestión de ventanilla de valores </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Stock</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary">Settings</button>
                        <button type="button"
                            class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                            data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                href="javascript:;">Action</a>
                            <a class="dropdown-item" href="javascript:;">Another action</a>
                            <a class="dropdown-item" href="javascript:;">Something else here</a>
                            <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                link</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->

            <div class="row">
             
                <hr>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#tabProveedoresactivos" role="tab" aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                        <div class="tab-title">Valores escasos</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#tabProveedoresinactivos" role='tab' aria-selected='false' tabindex='-1'>
                                    <div class='d-flex align-items-center'>
                                        <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                        <div class='tab-title'>Valores suficientes</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#tablistadquisiciones" role='tab' aria-selected='false' tabindex='-1'>
                                    <div class='d-flex align-items-center'>
                                        <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                        <div class='tab-title'>Lista de adquisiciones</div>
                                    </div>
                                </a>
                            </li>
                        
                            <!--********************* Modal para crear un nuevo proveedor ****************************-->
                            <div class="modal fade" id="crearProveedorModal" tabindex="-1" aria-labelledby="crearProveedorModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="crearProveedorModalLabel">Registrar nuev ingreso</h5>
                                            <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                                <i class="material-icons-outlined">close</i>
                                            </a>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Formulario para crear un nuevo proveedor -->
                                            <form>
                                                <div class="row">
                                                    <!-- Primera columna -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nombreproveedor" class="form-label">Nombre del proveedor:</label>
                                                            <input type="text" class="form-control" id="nombreproveedor" placeholder="Ingrese el nombre del proveedor">
                                                        </div>
                                                    </div>
                                                    <!-- Segunda columna -->
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="nrocelular" class="form-label">Nro de celular:</label>
                                                            <input type="text" class="form-control" id="nrocelular" placeholder="Ingrese el número de celular">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 text-center">
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
                        <!--Pestaña de Valores escasos-->
                        <div class='tab-content' id='espacioactivo'>
                            <div class='tab-pane fade show active' id='tabProveedoresactivos' role='tabpanel'>
                                <div class="table-responsive">
                                    <table id="tablaProveedoresActivos" class="table table-bordered dt-responsive nowrap">
                                        <div class="card rounded-4">
                                            <div class="card-body">
                                                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4 g-3">
                                                    <div class="col">
                                                        <div class="card rounded-4 mb-0 border">
                                                            <div class="card-body">
                                                                <div class="mt-4 text-center">
                                                                    <p class="mb-0" style="font-weight: bold;">PRORROGA DE TITULO DE BACHILLER</p>
                                                                </div>
                                                                <div class="d-flex align-items-center justify-content-center mt-3">
                                                                    <img src="assets/images/gallery/documents.png" width="150" alt="">
                                                                </div>
                                                                <div class="mt-4 text-center">
                                                                    <p class="mb-0" style="color: red; font-size: 1.2rem; font-weight: bold;">50 unidades</p>
                                                                    <p class="mb-0" >Fecha de ultimo ingreso: </p>
                                                                    <p class="mb-0" >Estado:  </p>
                                                                </div>
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--Pestaña de Valores suficientes -->
                        <div class='tab-content' id='espacioinactivo'>   
                            <div class='tab-pane fade show' id='tabProveedoresinactivos' role='tabpanel'>
                                <div class="table-responsive">
                                    <table id="tablaProveedoresInactivos" class="table table-bordered dt-responsive nowrap">
                                        <div class="card rounded-4">
                                                <div class="card-body">
                                                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4 g-3">
                                                        <div class="col">
                                                            <div class="card rounded-4 mb-0 border">
                                                                <div class="card-body">
                                                                    <div class="mt-4 text-center">
                                                                        <p class="mb-0" style="font-weight: bold;">PRORROGA DE TITULO DE BACHILLER</p>
                                                                    </div>
                                                                    <div class="d-flex align-items-center justify-content-center mt-3">
                                                                        <img src="assets/images/gallery/documents.png" width="150" alt="">
                                                                    </div>
                                                                    <div class="mt-4 text-center">
                                                                        <p class="mb-0" style="color: green; font-size: 1.2rem; font-weight: bold;">1250 unidades</p>
                                                                        <p class="mb-0" >Fecha de ultimo ingreso: </p>
                                                                        <p class="mb-0" >Estado:  </p>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
   
   
@endpush
