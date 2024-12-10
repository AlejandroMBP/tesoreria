@extends('dashboard.app')
@section('contenido')
<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Administración de usuarios</div>
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
                                    <div class="cursor-pointer" onclick="showTable('activeUsers')">
                                        <h4 class="mb-1 fw-semibold d-flex align-content-center">Usuarios<i
                                                class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                        </h4>
                                        <p class="mb-3">Activos</p>
										<div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-success" role="progressbar"
                                                    style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100">
												</div>
                                            </div>
                                    </div>
                                    <div class="vr"></div>
                                    <div class="cursor-pointer" onclick="showTable('inactiveUsers')">
                                        <h4 class="mb-1 fw-semibold d-flex align-content-center">Usuarios<i
                                                class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                        </h4>
                                        <p class="mb-3">Inactivos</p>
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
                                        <img src="assets/images/gallery/welcome-back-3.png" height="180" alt="">
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tablas de usuarios -->
            <div class="col-12">
                <!-- Usuarios Activos -->
                <div id="activeUsers" class="table-container">
                    <div class="card">
                        <div class="card-body">
                            <h5>Usuarios Activos</h5>
                            <table class="table mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Usuarios Inactivos -->
                <div id="inactiveUsers" class="table-container d-none">
                    <div class="card">
                        <div class="card-body">
                            <h5>Usuarios Inactivos</h5>
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                        <th scope="col">Handle</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Steve</td>
                                        <td>Jobs</td>
                                        <td>@apple</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Bill</td>
                                        <td>Gates</td>
                                        <td>@microsoft</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/plugins/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard1.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>

	<script>
    function showTable(tableId) {
        document.querySelectorAll('.table-container').forEach(container => {
            container.classList.add('d-none'); // Ocultar todas las tablas
        });
        document.getElementById(tableId).classList.remove('d-none'); // Mostrar la tabla seleccionada
    }
</script>
@endpush
