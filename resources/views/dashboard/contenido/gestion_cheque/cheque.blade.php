@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestión de cheque</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Cheque</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row"> 
                <!-- Boton Crear nuevo Usuario -->
                <div class="d-flex justify-content-end mb-3">
    <a href="{{ route('formulario_registro_cheque') }}" class="btn btn-inverse-success px-5">Nuevo registro</a>
</div>
                <hr>
                <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaReporteValores" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">#</th>
                                    <th style="text-align: center; vertical-align: middle;">Nombre beneficiario</th>
                                    <th style="text-align: center; vertical-align: middle;">Monto cheque</th>
                                    <th style="text-align: center; vertical-align: middle;">Comprobante</th>
                                    <th style="text-align: center; vertical-align: middle;">Nro verde DAF</th>
                                    <th style="text-align: center; vertical-align: middle;">Fecha despacho para firma</th>
                                    <th style="text-align: center; vertical-align: middle;">Fecha reingreso</th>
                                    <th style="text-align: center; vertical-align: middle;">Fecha entrega a beneficiario</th>
                                    <th style="text-align: center; vertical-align: middle;">Fecha remisión a archivo contable</th>

                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                
                                    <td>DAVID FLORES MAMANI</td>
                                    <td>3000 Bs.</td> 
                                    <td>..........</td> 
                                    <td>..........</td>
                                    <td>..........</td>
                                    <td>..........</td>
                                    <td>..........</td>
                                    <td>..........</td>
                                    
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
