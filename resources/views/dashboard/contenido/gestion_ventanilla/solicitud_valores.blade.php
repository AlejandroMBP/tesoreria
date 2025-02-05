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
                            <li class="breadcrumb-item active" aria-current="page">Solicitud de valores</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row"> 
                <!-- Boton Crear nuevo Usuario -->
                <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('formulario_solicitud_valores') }}" class="btn btn-inverse-success px-5">Crear solicitud</a>
            </div>
                <hr>
                <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaSolicitud" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">#</th>
                                    <th style="text-align: center; vertical-align: middle;">FECHA DE SOLICITUD</th>
                                    <th style="text-align: center; vertical-align: middle;">DESTINATARIO</th>
                                    <th style="text-align: center; vertical-align: middle;">CANTIDAD DE TIPO DE VALORES</th>
                                    <th style="text-align: center; vertical-align: middle;">ACCIÓN</th> 
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($sol_val as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->id }}</td>
                                    <td style="text-align: center;">{{ $solicitud->fecha_solicitud }}</td>
                                    <td>{{ $solicitud->name }}</td>
                                    <td>{{ $solicitud->cantidad }} Tipos</td> 
                                    <td>
                                        <a href="{{ url('generar_pdf_solicitud') }}"  target="_blank">
                                            <button class="btn btn-warning btn-sm">IMPRIMIR SOLICITUD</button>
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
    </main>
    <div class="overlay btn-toggle"></div>
@endsection
@push('scripts')
<script>
$('#tablaSolicitud').DataTable({
    responsive: true,
    paging: true,
    searching: true,
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
    }
});
</script>
   
@endpush
