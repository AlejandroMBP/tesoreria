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
                        <table id="tablaCheque" class="table table-bordered dt-responsive nowrap">
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
                            @foreach($registros as $registro)
                                <tr>
                                    <td>{{ $registro->id}}</td>                 
                                    <td>{{ $registro->nombre_beneficiario}}</td>
                                    <td>{{ $registro->monto_cheque}}</td> 
                                    <td>{{ $registro->comprobante}}</</td> 
                                    <td>{{ $registro->n_verde_DAF}}</</td>
                                    <td>{{ $registro->fecha_despacho_para_firmas}}</</td>
                                    <td>{{ $registro->fecha_reingreso}}</</td>
                                    <td>{{ $registro->fecha_entrega_beneficiario}}</</td>
                                    <td>{{ $registro->fecha_remision_archivo_contable}}</</td>
                                </tr>
                                @endforeach
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
$('#tablaCheque').DataTable({
    responsive: true,
    paging: true,
    searching: true,
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
    }
});
</script>
   
@endpush
