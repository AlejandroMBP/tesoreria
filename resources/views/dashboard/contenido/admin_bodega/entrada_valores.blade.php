@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Bodega</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Entrada de valores</li>
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
                                            <p class="mb-3">Valores escasos</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-danger" role="progressbar"
                                                    style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="">
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">78.4<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Valores suficientes</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-success" role="progressbar"
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
                <h6 class="mb-0 text-uppercase">Administración de Entrada de valores</h6>       
                <!-- Boton Crear nuevo Usuario -->
                <div class="d-flex justify-content-end mb-3">
                    <button type="button" class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearProveedorModal">Crear nuevo</button>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-success" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#tabEntradavaloresactivos" role="tab" aria-selected="true">
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
                                            <h5 class="modal-title" id="crearProveedorModalLabel">Registrar nuevo ingreso</h5>
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
                            <div class='tab-pane fade show active' id='tabEntradavaloresactivos' role='tabpanel'>
                                <div class="table-responsive">
                                    <table id="tablaEntradavaloresActivos" class="table table-bordered dt-responsive nowrap">
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
                                                                <div class="mt-4 text-center">
                                                                    <button class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                                                                                style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;" data-bs-toggle="modal" data-bs-target="#crearProveedorModal">
                                                                        <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #95C11E; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">+</span>
                                                                            Agregar
                                                                    </button>
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
                                                                <div class="mt-4 text-center">
                                                                    <button class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                                                                                style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;" data-bs-toggle="modal" data-bs-target="#crearProveedorModal">
                                                                        <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #95C11E; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">+</span>
                                                                            Agregar
                                                                    </button>
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
    </main>
    <div class="overlay btn-toggle"></div>
@endsection
@push('scripts')
   
   
@endpush
