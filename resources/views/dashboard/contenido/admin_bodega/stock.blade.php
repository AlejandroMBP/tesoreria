@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Administración de Bodega 1</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Stock</li>
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
                                        <div>
                                            <p class="mb-0 fw-semibold">Bienvenido/a</p>
                                            <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-5">
                                        <div>
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
                                        <div>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ***Pestañas para usuarios activos e inactivos ***-->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 text-uppercase">Administración de Stock</h6>
                </div>
                <hr>
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-success" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="pill" href="#tabStockEscaso" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                        <div class="tab-title">Valores escasos</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="pill" href="#tabStockSuficiente" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-icon"><i class="bi bi-person me-1 fs-6"></i></div>
                                        <div class="tab-title">Valores suficientes</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- **** Contenido de las pestañas **** -->
                        <div class="tab-content mt-3">
                            <!-- **** Pestaña de Valores escasos **** -->
                            <div class="tab-pane fade show active" id="tabStockEscaso" role="tabpanel">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" id="contenedorStockEscaso">
                                    <p class="text-center">Cargando datos...</p>
                                </div>
                            </div>
                            <!-- **** Pestaña de Valores suficientes **** -->
                            <div class="tab-pane fade" id="tabStockSuficiente" role="tabpanel">
                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" id="contenedorStockSuficiente">
                                    <p class="text-center">Cargando datos...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </main>
    <div class="overlay btn-toggle"></div>
@endsection
@push('scripts')
<script>
    $(document).ready(function () {
        function cargarValoresEscasos() {
            $.ajax({
                url: '{{ url("stock/valores-escasos") }}',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log(response); 
                    let cards = '';
                    response.forEach(function (valor) {
                        let conceptoNombre = valor.nombre || 'Sin nombre';  
                        cards += `
                            <div class="row row-cols-10 row-cols-lg-20 row-cols-xl-9 g-3">
                                <div class="col">
                                    <div class="card rounded-4 mb-0 border">
                                        <div class="card-body text-center">
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="font-weight: bold;">${conceptoNombre}</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <img src="{{asset('assets/images/gallery/documents.png')}}" width="150" alt="">
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="color: red; font-size: 1.2rem; font-weight: bold;"">${valor.cantidad} unidades</p>
                                                <p class="text">Fecha último ingreso: ${valor.fecha_adquisicion}</p>
                                                <p class="text">Estado: ${valor.estado}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                    });
                    $('#contenedorStockEscaso').html(cards);
                },
                error: function () {
                    $('#contenedorStockEscaso').html('<p class="text-danger">Error al cargar los datos.</p>');
                }
            });
        }
        function cargarValoresSuficientes() {
            $.ajax({
                url: '{{ url("stock/valores-suficientes") }}',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log(response);  

                    let cards = '';
                    response.forEach(function (valor) {
                        let conceptoNombre = valor.nombre || 'Sin nombre';  
                        cards += `
                            <div class="row row-cols-10 row-cols-lg-20 row-cols-xl-9 g-3">
                                <div class="col">
                                    <div class="card rounded-4 mb-0 border">
                                        <div class="card-body text-center">
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="font-weight: bold;">${conceptoNombre}</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <img src="{{asset('assets/images/gallery/documents.png')}}" width="150" alt="">
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="color: green; font-size: 1.2rem; font-weight: bold;"">${valor.cantidad} unidades</p>
                                                <p class="text">Fecha último ingreso: ${valor.fecha_adquisicion}</p>
                                                <p class="text">Estado: ${valor.estado}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        });
                    $('#contenedorStockSuficiente').html(cards);
                },
                error: function () {
                    $('#contenedorStockSuficiente').html('<p class="text-danger">Error al cargar los datos.</p>');
                }
            });
        }
        cargarValoresEscasos();

        $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
            let target = $(e.target).attr("href");

            if (target === "#tabStockEscaso") {
                cargarValoresEscasos();
            } else if (target === "#tabStockSuficiente") {
                cargarValoresSuficientes();
            }
        });
    });
</script>
   
@endpush
