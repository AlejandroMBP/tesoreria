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
                            <li class="breadcrumb-item active" aria-current="page">Formulario de entrega de valores</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xl-5 col-xxl-4 d-flex align-items-stretch">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="mb-0 fw-bold">Universidad Pública de El Alto</h6>
                                <h6 class="fw-bold mt-2" style="font-size: 0.7rem;">UNIDAD DE TESORO UNIVERSITARIO</h6>
                            </div>
                            <hr>
                            <div class="text-start mt-4">
                                <h6 class="fw-normal" style="font-size: 0.6rem;">UNIDAD: UNIDAD DE TESORO UNIVERSITARIO</h6>
                                <h6 class="fw-normal" style="font-size: 0.6rem;">SOLICITANTE: LIC. {{ $detallesSolicitud->first()->name ?? 'No disponible' }}</h6>
                                <h6 class="fw-normal" style="font-size: 0.6rem;">
                                    FECHA DE SOLICITUD: 
                                    {{ $detallesSolicitud->first()->fecha_solicitud ?? 'No disponible' }}
                                </h6>
                            </div>
                            <div class="text-end mt-5">
                                <h6 class="fw-bold" style="font-size: 0.7rem;">SOLICITUD DE VALORES UNIVERSITARIOS</h6>
                            </div>
                            <div class="table-responsive">
                                <table id="tablaProveedoresActivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>TIPO DE DOCUMENTO</th>
                                            <th>CANTIDAD EN UNIDADES</th>                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detallesSolicitud as $detalle)
                                            <tr>
                                                <td>{{ $detalle->concepto_nombre }}</td> 
                                                <td>{{ $detalle->cantidad }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-7 col-xxl-6 d-flex align-items-stretch">
                    <div class="card w-100 rounded-4">
                        <div class="card-body">
                            <div class="text-center">
                                <h6 class="mb-0 fw-bold">Universidad Pública de El Alto</h6>
                                <h6 class="fw-bold mt-2" style="font-size: 0.7rem;">UNIDAD DE TESORO UNIVERSITARIO</h6>
                            </div>
                            <hr>
                            <div class="text-center mt-3">
                                <h6 class="fw-bold" style="font-size: 0.7rem;">FORMULARIO DE ENTREGA DE VALORES UNIVERSITARIOS</h6>
                            </div>
                            <form id="form_solicitud">
                                <div class="row g-3">                       
                                    <input type="hidden" class="form-control" name="idSolicitud" id="idSolicitud" value="{{ $valor->id }}" readonly>        
                                    <input type="hidden" class="form-control" name="fecha" id="fecha" value="<?= date('Y-m-d'); ?>">
                                </div>                       
                                <hr>
                                <div id="dynamicInputs">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="id_concepto_valor_0" class="form-label">ID Concepto Valor</label>
                                            <select class="form-control" name="id_concepto_valor[]" id="id_concepto_valor_0">
                                                <option value="">Seleccione un concepto valor</option>
                                                @foreach ($conceptos as $concepto)
                                                    <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option> 
                                                @endforeach
                                            </select>   
                                        </div>
                                        <div class="col-md-6">
                                            <label for="cantidad_0" class="form-label">Cantidad</label>
                                            <input type="number" class="form-control" name="cantidad[]" id="cantidad_0" placeholder="Ingrese la cantidad">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="text-end">
                                    <button id="btnAgregarInputs" type="button" class="btn btn-sm d-inline-flex align-items-center justify-content-center" style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;">
                                        <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #95C11E; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">+</span> 
                                    </button>   
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button id="btnGuardarSolicitud" type="button" class="btn btn-primary">Guardar Cambios</button>
                                </div>
                            </form>
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
   document.addEventListener('DOMContentLoaded', function () {
        const btnAgregar = document.getElementById('btnAgregarInputs');
        const dynamicInputs = document.getElementById('dynamicInputs');
        let counter = 1; // Ya tenemos el par 0

        btnAgregar.addEventListener('click', function () {
            // Creamos una nueva fila con innerHTML
            const newRow = document.createElement('div');
            newRow.className = 'row g-3 mt-2';
            newRow.innerHTML = `
            <div class="col-md-6">
                <label for="id_concepto_valor_${counter}" class="form-label">ID Concepto Valor</label>
                <select class="form-control" name="id_concepto_valor[]" id="id_concepto_valor_${counter}">
                <option value="">Seleccione un concepto valor</option>
                @foreach ($conceptos as $concepto)
                    <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option> 
                @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="cantidad_${counter}" class="form-label">Cantidad</label>
                <input type="number" class="form-control" name="cantidad[]" id="cantidad_${counter}" placeholder="Ingrese la cantidad">
            </div>
            `;
            dynamicInputs.appendChild(newRow);
            counter++;
        });
        });

//********************Script botón guardar la solicitud********************************
document.addEventListener('DOMContentLoaded', function () {
    const btnGuardarValoruni = document.getElementById('btnGuardarSolicitud');

    btnGuardarValoruni.addEventListener('click', function () {
        const idSolicitud = document.getElementById('idSolicitud').value;
        const fecha = document.getElementById('fecha').value;

        if (!idSolicitud || !fecha) {
            Swal.fire({
                title: "Error",
                text: "Todos los campos son obligatorios.",
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }
        
        const idConceptoValor = document.querySelectorAll('select[name="id_concepto_valor[]"]');
        const cantidades = document.querySelectorAll('input[name="cantidad[]"]');
        
        const detalles = [];
        let camposVacios = false;
        for (let i = 0; i < idConceptoValor.length; i++) {
            if (!idConceptoValor[i].value || !cantidades[i].value) {
                camposVacios = true;
                break; 
            }
            detalles.push({
                id_concepto_valor: idConceptoValor[i].value,
                cantidad: cantidades[i].value
            });
        }
        if (camposVacios) {
            Swal.fire({
                title: "Error",
                text: "Por favor, complete todos los campos de concepto valor y cantidad.",
                icon: "error",
                confirmButtonText: "OK"
            });
            return; 
        }
        
        const cantidadDetalles = detalles.length;

        // Confirmación antes de guardar
        Swal.fire({
            title: "¿Está seguro de guardar y enviar los Valores Universitarios al remitente?",
            text: "Una vez guardada, no podrá modificar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, guardar",
            cancelButtonText: "No, cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                // Si confirma, proceder con el guardado
                fetch('/guardarSolResp', {  
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        idSolicitud: idSolicitud,
                        fecha_respuesta: fecha,
                        cantidad_detalles: cantidadDetalles, 
                        detalles: detalles  
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: "Éxito",
                            text: "Se ha enviado los valores exitosamente",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            window.location.href = "{{ route('salida_valores') }}";
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "Hubo un error al enviar los Valores Universitarios.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        title: "Error",
                        text: "Hubo un error al realizar la acción.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                });
            }
        });
    });
});


       

</script>
@endpush
