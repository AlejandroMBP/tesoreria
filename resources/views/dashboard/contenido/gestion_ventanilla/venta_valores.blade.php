@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestión de ventanilla de valores</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Venta de valores diarios</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row"> 
                <!-- Boton Crear nuevo Usuario -->
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('formulario_solicitud_valores') }}" class="btn btn-inverse-success px-5">Nuevo informe de venta</a>
                </div>
                <hr>
                <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaReporteValores" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">#</th>
                                    <th style="text-align: center; vertical-align: middle;">FECHA DE VENTA</th>
                                    <th style="text-align: center; vertical-align: middle;">NRO DE INFORME</th>
                                    <th style="text-align: center; vertical-align: middle;">RESPONSABLE DE CAJA</th>
                                    <th style="text-align: center; vertical-align: middle;">ESTADO</th>
                                    <th style="text-align: center; vertical-align: middle;">ACCIÓN</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td style="text-align: center;">20-12-2024</td>
                                    <td style="text-align: center;">INF-12</td>
                                    <td>DAVID FLORES MAMANI</td>
                                    <td>PENDIENTE</td> 
                                    <td>
                                        <a href="{{ route('registro_ventas_valores') }}" class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                                            style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px; text-decoration: none;">
                                            REGISTRAR
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
