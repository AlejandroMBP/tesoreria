
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
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
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
                                <!-- Filtros -->
                                <div class="col-12 col-sm-8 d-flex align-items-center">
                                    <div class="w-75 me-3">
                                        <form id="filterForm" method="GET" action="{{ url('reporte-bodega-pdf') }}">
                                            <!-- Filtro de Gestión (Año) -->
                                            <div class="mb-3">
                                                <label for="gestion">Ingresa la gestión (Año):</label>
                                                <select class="form-select" id="gestion" name="gestion">
                                                    <option value="" selected disabled>Selecciona el año</option>
                                                    <option value="ninguno">Ninguno</option>
                                                    @for ($i = 2024; $i <= 2050; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
            
                                            <!-- Filtro de Mes -->
                                            <div class="mb-3">
                                                <label for="mes">Selecciona el mes:</label>
                                                <select class="form-select" id="mes" name="mes">
                                                    <option value="" selected disabled>Selecciona el mes</option>
                                                    <option value="ninguno">Ninguno</option>
                                                    @foreach(range(1, 12) as $month)
                                                        <option value="{{ $month }}">{{ \Carbon\Carbon::create()->month($month)->locale('es')->format('F') }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
            
                                            <!-- Filtro de Tipo de Documento -->
                                            <div class="mb-3">
                                                <label for="tipo_documento">Tipo de Documento</label>
                                                <select class="form-select" id="tipo_documento" name="tipo_documento">
                                                    <option value="" selected disabled>Selecciona un tipo de documento</option>
                                                    <option value="ninguno">Ninguno</option>
                                                    @foreach($conceptos as $concepto)
                                                        <option value="{{ $concepto->nombre }}">{{ $concepto->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
            
                                            <button type="submit" class="btn btn-primary">Filtrar</button>
                                        </form>
                                    </div>
                                </div>
                                                <!-- Botón de PDF -->
                                <div class="col-12 col-sm-4 d-flex justify-content-end align-items-center">
                                    <a href="#" id="generatePdfBtn" class="btn btn-primary d-flex align-items-center">
                                        <img src="assets/images/apps/pdf.png" height="50" alt="PDF Icon" class="mr-2"> Ver PDF
                                    </a>
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
                            <tbody id="reportData">
                                <!-- Aquí se cargarán los datos dinámicamente -->
                            </tbody>
                        </table>                        
                    </div>
                </div> 
            </div> 
        </div>
    </main>
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

//FILTRAR
$(document).ready(function() {
    // Al enviar el formulario de filtro
    $('#filterForm').submit(function(e) {
        e.preventDefault();

        // Obtener los valores de los filtros
        var año = $('#gestion').val();
        var mes = $('#mes').val();
        var tipo_documento = $('#tipo_documento').val();

        // Enviar la solicitud AJAX
        $.ajax({
            url: '{{ route("reporte_valores_bodega") }}', // Asegúrate de que esta sea la ruta correcta
            type: 'GET',
            data: {
                año: año,
                mes: mes,
                tipo_documento: tipo_documento,
            },
            success: function(response) {
                // Actualizar la tabla con los nuevos datos
                var rows = '';
                $.each(response.consulta, function(index, row) {
                    rows += `  
                        <tr>
                            <td>${index + 1}</td>
                            <td style="text-align: center;">${row.tipo_documento}</td>
                            <td>${row.precio_unitario}</td>
                            <td>${row.cantidad_entrada || 'NULL'}</td>
                            <td>${row.correlativo_ini_entrada || 'NULL'}</td>
                            <td>${row.correlativo_fin_entrada || 'NULL'}</td>
                            <td>${row.cantidad_salida || 'NULL'}</td>
                            <td>${row.correlativo_ini_salida || 'NULL'}</td>
                            <td>${row.correlativo_fin_salida || 'NULL'}</td>
                            <td>${row.costo}</td>
                            <td>${row.monto || 'NULL'}</td>
                            <td>${row.cantidad_saldos}</td>
                            <td>${row.observacion}</td>
                        </tr>
                    `;
                });

                // Reemplazar el contenido del cuerpo de la tabla con los nuevos datos
                $('#reportData').html(rows);
            }
        });
    });

    // Al hacer clic en el botón de PDF
    $('#generatePdfBtn').click(function(e) {
        e.preventDefault(); // Evitar que el enlace se comporte como un enlace normal

        // Obtener los valores de los filtros
        var año = $('#gestion').val();
        var mes = $('#mes').val();
        var tipo_documento = $('#tipo_documento').val();

        // Construir la URL con los filtros
        var url = "{{ url('reporte-bodega-pdf') }}";
        url += '?gestion=' + (año || 'ninguno') + '&mes=' + (mes || 'ninguno') + '&tipo_documento=' + (tipo_documento || 'ninguno');

        // Abrir el PDF en una nueva pestaña
        window.open(url, '_blank');
    });
});

</script>
@endpush
