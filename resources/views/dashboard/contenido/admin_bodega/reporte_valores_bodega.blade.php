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
                            <li class="breadcrumb-item active" aria-current="page">Reporte: Control de valores</li>
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
                                <div class="col-12 col-sm-8 d-flex align-items-center">
                                    <div class="w-75 me-3">
                                        <div class="mb-3">
                                            <label for="input33a" class="form-label">Gestión</label>
                                            <label for="gestion">Ingresa la gestión (Año):</label>
                                            <select class="form-select" id="gestion" name="gestion">
                                                <option selected disabled>Selecciona el año</option>
                                                @for ($i = 2024; $i <= 2050; $i++) <!-- Puedes ajustar el rango de años -->
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="input33b" class="form-label">Tipo documento</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="material-icons-outlined fs-5">description</i></span>
                                                <select class="form-select" id="input33b">
                                                    <option selected="">Selecciona el tipo de documento</option>
                                                    @foreach($conceptos as $concepto)
                                                        <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="{{ url('generar-pdf') }}" target="_blank" class="btn btn-primary d-flex align-items-center">
                                            <img src="assets/images/apps/pdf.png" height="50" alt="PDF Icon" class="mr-2"> Ver PDF
                                        </a>
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h6 class="mb-0 text-uppercase">Control de valores universitarios</h6>       
            <hr>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="tablaReporteValores" class="table table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th style="text-align: center; vertical-align: middle;">#</th>
            <th style="text-align: center; vertical-align: middle;">TIPO DOCUMENTO</th>
            <th style="text-align: center; vertical-align: middle;">PRECIO C/U</th>
            <th style="text-align: center; vertical-align: middle;">CANTIDAD (ENTRADA)</th>
            <th style="text-align: center; vertical-align: middle;">CORRELATIVO INICIAL (ENTRADA)</th>
            <th style="text-align: center; vertical-align: middle;">CORRELATIVO FINAL (ENTRADA)</th>
            <th style="text-align: center; vertical-align: middle;">CANTIDAD (SALIDA)</th>
            <th style="text-align: center; vertical-align: middle;">CORRELATIVO INICIAL (SALIDA)</th>
            <th style="text-align: center; vertical-align: middle;">CORRELATIVO FINAL (SALIDA)</th>
            <th style="text-align: center; vertical-align: middle;">COSTO</th>
            <th style="text-align: center; vertical-align: middle;">MONTO</th>
            <th style="text-align: center; vertical-align: middle;">CANTIDAD</th>
            <th style="text-align: center; vertical-align: middle;">OBSERVACIÓN</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consulta as $key => $row)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td style="text-align: center;">{{ $row->tipo_documento }}</td>
                <td>{{ $row->precio_unitario }}</td>
                <td>{{ $row->cantidad_entrada ?? 'NULL' }}</td>
                <td>{{ $row->correlativo_ini_entrada ?? 'NULL' }}</td>
                <td>{{ $row->correlativo_fin_entrada ?? 'NULL' }}</td>
                <td>{{ $row->cantidad_salida ?? 'NULL' }}</td>
                <td>{{ $row->correlativo_ini_salida ?? 'NULL' }}</td>
                <td>{{ $row->correlativo_fin_salida ?? 'NULL' }}</td>
                <td>{{ $row->costo }}</td>
                <td>{{ $row->monto ?? 'NULL' }}</td>
                <td>{{ $row->cantidad_entrada ?? $row->cantidad_salida }}</td>
                <td>{{ $row->observacion }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
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
