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
                            <li class="breadcrumb-item active" aria-current="page">Movimientos</li>
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
                    <!-- Primera columna: Selects e inputs -->
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label for="input33a" class="form-label">Gestión</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="material-icons-outlined fs-5">date_range</i></span>
                                <select class="form-select" id="input33a">
                                    <option selected="">Selecciona la gestión</option>
                                    <option value="1">2024</option>
                                    <option value="2">2023</option>
                                    <option value="3">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="input25" class="form-label">Número de documento</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="material-icons-outlined fs-5">pin</i></span>
                                <input type="number" class="form-control" id="input25" placeholder="Número de documento">
                            </div>
                        </div>
                    </div>
                    <!-- Segunda columna: Imagen y botón -->
                    <div class="col-12 col-lg-6 text-center">
                        <!-- Imagen -->
                        <div class="mb-3">
                            <img src="assets/images/gallery/image_buscar.png" alt="Descripción de la imagen" class="img-fluid rounded-4" style="max-width: 150px; max-height: 150px;">
                        </div>
                        <!-- Botón buscar -->
                        <div>
                            <button type="button" class="btn btn-primary">
                                <i class="material-icons-outlined fs-5">search</i> Buscar
                            </button>
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
<script>
$('#tablaReporteValores').DataTable({
    responsive: true,
    paging: true,
    searching: true,
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
    }
});
</script>
@endpush
