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
                            <li class="breadcrumb-item active" aria-current="page">Salida de valores</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
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
                                        <p class="mb-3">Solicitudes nuevas</p>
                                        <div class="progress mb-0" style="height:5px;">
                                            <div class="progress-bar bg-grd-danger" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="">
                                        <h4 class="mb-1 fw-semibold d-flex align-content-center">78.4<i class="ti ti-arrow-up-right fs-5 lh-base text-success"></i></h4>
                                        <p class="mb-3">Solicitudes atendidas</p>
                                        <div class="progress mb-0" style="height:5px;">
                                            <div class="progress-bar bg-grd-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                            </div>
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
            <h6 class="mb-0 text-uppercase">Administración de Solicitudes</h6>       
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-success" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabSalValactivos" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Solicitudes nuevas</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#tabSalValinactivos" role='tab' aria-selected='false' tabindex='-1'>
                                <div class='d-flex align-items-center'>
                                    <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                    <div class='tab-title'>Solicitudes atendidas</div>
                                </div>
                            </a>
                        </li>
                        
                    </ul>
                    <!--Pestaña de Solicitudes nuevas-->
                    <div class='tab-content' id='espacioactivoSalVal'>
                        <div class='tab-pane fade show active' id='tabSalValactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaSalValActivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Remitente</th>
                                            <th>Cargo del remitente</th>
                                            <th>Destinatario</th>
                                            <th>Fecha de solicitud</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($valores_salida_nuevas as $val_sal)
                                        <tr>
                                            <td>{{$val_sal->id }}</td>
                                            <td>{{$val_sal->nombre_remitente}}</td>
                                            <td>{{$val_sal->cargo}}</td>
                                            <td>{{$val_sal->nombre_destinatario}}</td>
                                            <td>{{$val_sal->fecha_solicitud}}</td>
                                            <td>
                                                <a href="{{ route('form_entrega_valores_bodega', [$val_sal->id])}}" 
                                
                                                class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                                                style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px; text-decoration: none;">
                                                    Atender solicitud
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>       
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Pestaña de Solicitudes atendidas-->
                    <div class='tab-content' id='espacioinactivoSalVal'>   
                        <div class='tab-pane fade show' id='tabSalValinactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaSalValInactivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Remitente</th>
                                            <th>Cargo del remitente</th>
                                            <th>Destinatario</th>
                                            <th>Fecha de solicitud</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($valores_salida_atendidas as $val_sal_aten)
                                        <tr>
                                            <td>{{$val_sal_aten->id }}</td>
                                            <td>{{$val_sal_aten->nombre_remitente}}</td>
                                            <td>{{$val_sal_aten->cargo}}</td>
                                            <td>{{$val_sal_aten->nombre_destinatario}}</td>
                                            <td>{{$val_sal_aten->fecha_solicitud}}</td>
                                            <td>
                                                <a href="{{ url('generar_pdf_valores_entregados') }}"  target="_blank">
                                                    <button class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                                                    style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;">
                                                        <img src="assets/images/apps/pdf.png" alt="Icono PDF" style="width: 16px; height: 16px;"> 
                                                        Imprimir formulario
                                                    </button>
                                                </a>
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
    </main>
    <div class="overlay btn-toggle"></div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#tablaSalValActivos').DataTable({
                responsive: true,
                paging: true,  
                searching: true,  
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });

        $(document).ready(function() {
            $('#tablaSalValInactivos').DataTable({
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
