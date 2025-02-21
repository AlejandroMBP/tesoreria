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
                                <div class="row g-3" id="dynamicInputs">
                                    <div class="col-md-6">
                                        <label for="id_concepto_valor_0" class="form-label">ID Concepto Valor</label>
                                        <select class="form-control" name="id_concepto_valor[]" id="id_concepto_valor_0" >
                                            <option value="">Seleccione un concepto valor</option>
                                            @foreach ($conceptos as $concepto)
                                                <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="cantidad_0" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control cantidad" name="cantidad[]" id="cantidad_0" placeholder="Cantidad">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="costototal_0" class="form-label">Costo</label>
                                        <input type="number" class="form-control costototal" name="costototal[]" id="costototal_0" placeholder="Costo Total" readonly>
                                    </div>
                                    <input type="hidden" name="costo_stock[]" id="costo_stock_0">
                                    <input type="hidden" name="costonuevo[]" id="costonuevo_0">
                                    <input type="hidden" name="precio_unitario[]" id="precio_unitario_0">
                                    <input type="hidden" name="cantidad_stock[]" id="cantidad_stock_0">
                                    <input type="hidden" name="cantidadnuevo[]" id="cantidadnuevo_0">
                                    <input type="hidden" name="costo_ventanilla[]" id="costo_ventanilla_0">
                                    <input type="hidden" name="cantidad_ventanilla[]" id="cantidad_ventanilla_0">
                                    <input type="hidden" name="costonuevo_ventanilla[]" id="costonuevo_ventanilla_0">
                                    <input type="hidden" name="cantidadnuevo_ventanilla[]" id="cantidadnuevo_ventanilla_0">
                                    <div class="col-md-6">
                                        <label for="correlativo_inicial_0" class="form-label">Correlativo Inicial</label>
                                        <input type="number" class="form-control correlativo_inicial" name="correlativo_inicial[]" id="correlativo_inicial_0" placeholder="Inicial" readonly>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="correlativo_final_0" class="form-label">Correlativo Final</label>
                                        <input type="number" class="form-control correlativo_final" name="correlativo_final[]" id="correlativo_final_0" placeholder="Final" readonly>
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
//***********Función para obtener el correlativo inicial para la fila correspondiente***********//
$(document).ready(function() {
    $('#dynamicInputs').on('change input', 'select[id^="id_concepto_valor_"], input[id^="cantidad_"]', function() {
        var idParts = $(this).attr('id').split('_');
        var index = (idParts[0] === "cantidad") ? idParts[1] : idParts[3]; 
        obtenerDatosCompletos(index);
    });
});

// Función para obtener todos los datos (correlativo, costo, precio, costo_ventilla)
function obtenerDatosCompletos(index) {
    let idConcepto = $('#id_concepto_valor_' + index).val();
    let cantidad = parseInt($('#cantidad_' + index).val()) || 0;

    if (idConcepto) {
        $.ajax({
            url: '/obtener-datos-completos/' + idConcepto, 
            type: 'GET',
            success: function(response) {
                // Obtener datos de la respuesta
                let correlativoInicial = response.correlativo_inicial || 0;
                let costo = response.costo || 0; 
                let cantidadStock = response.cantidad || 0; 
                let precioUnitario = response.precio_unitario || 0;
                let costoVentilla = response.costo_ventilla || 0;
                let cantidadVentilla = response.cantidad_ventilla || 0; 

                // Aqui asigno valores a los campos
                $('#correlativo_inicial_' + index).val(correlativoInicial);
                let correlativoFinal = correlativoInicial + cantidad - 1;
                $('#correlativo_final_' + index).val(correlativoFinal);  
                $('#precio_unitario_' + index).val(precioUnitario);
                $('#costo_stock_' + index).val(costo);             
                $('#cantidad_stock_' + index).val(cantidadStock);
                $('#costo_ventanilla_' + index).val(costoVentilla);            
                $('#cantidad_ventanilla_' + index).val(cantidadVentilla);
                let costoTotal = precioUnitario * cantidad;
                $('#costototal_' + index).val(costoTotal);
                let costoNuevo = costo - costoTotal;
                $('#costonuevo_' + index).val(costoNuevo);
                let cantidadNueva = cantidadStock - cantidad;
                $('#cantidadnuevo_' + index).val(cantidadNueva);
                let costoNuevoVentanilla = costoVentilla + costoTotal;
                $('#costonuevo_ventanilla_' + index).val(costoNuevoVentanilla);
                let cantidadNuevaVentanilla = cantidadVentilla + cantidad;
                $('#cantidadnuevo_ventanilla_' + index).val(cantidadNuevaVentanilla);
            },
            error: function() {
                alert('Hubo un error al obtener los datos.');
            }
        });
    }
}


// Llamar a esta función para recalcular solo el correlativo final cuando la cantidad cambia
$(document).on('input', '.cantidad', function() {
    let index = $(this).attr('id').split('_')[1]; 
    let cantidad = parseInt($('#cantidad_' + index).val()) || 0; 
    let correlativoInicial = parseInt($('#correlativo_inicial_' + index).val()) || 0;  
    let correlativoFinal = correlativoInicial + cantidad - 1;
    $('#correlativo_final_' + index).val(correlativoFinal); 
});

let index = 1; 
// Función para agregar una nueva fila de inputs
$('#btnAgregarInputs').click(function() {
    let newRow = `
        <div class="row g-3" id="dynamicInputsRow_${index}">
            <div class="col-md-6">
                <label for="id_concepto_valor_${index}" class="form-label">ID Concepto Valor</label>
                <select class="form-control" name="id_concepto_valor[]" id="id_concepto_valor_${index}" onchange="getCorrelativoInicial(${index})">
                    <option value="">Seleccione un concepto valor</option>
                    @foreach ($conceptos as $concepto)
                        <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="cantidad_${index}" class="form-label">Cantidad</label>
                <input type="number" class="form-control cantidad" name="cantidad[]" id="cantidad_${index}" placeholder="Cantidad">
            </div>
            <div class="col-md-3">
                <label for="costototal_${index}" class="form-label">Costo</label>
                <input type="number" class="form-control costototal" name="costototal[]" id="costototal_${index}" placeholder="Costo">
            </div>
            <input type="hidden" name="costo_stock[]" id="costo_stock_${index}">
            <input type="hidden" name="costonuevo[]" id="costonuevo_${index}">
            <input type="hidden" name="precio_unitario[]" id="precio_unitario_${index}">
            <input type="hidden" name="cantidad_stock[]" id="cantidad_stock_${index}">
            <input type="hidden" name="cantidadnuevo[]" id="cantidadnuevo_${index}">
            <input type="hidden" name="costo_ventanilla[]" id="costo_ventanilla_${index}">
            <input type="hidden" name="cantidad_ventanilla[]" id="cantidad_ventanilla_${index}">
            <input type="hidden" name="costonuevo_ventanilla[]" id="costonuevo_ventanilla_${index}">
            <input type="hidden" name="cantidadnuevo_ventanilla[]" id="cantidadnuevo_ventanilla_${index}">
            <div class="col-md-6">
                <label for="correlativo_inicial_${index}" class="form-label">Correlativo Inicial</label>
                <input type="number" class="form-control correlativo_inicial" name="correlativo_inicial[]" id="correlativo_inicial_${index}" placeholder="Inicial">
            </div>
            <div class="col-md-6">
                <label for="correlativo_final_${index}" class="form-label">Correlativo Final</label>
                <input type="number" class="form-control correlativo_final" name="correlativo_final[]" id="correlativo_final_${index}" placeholder="Final" readonly>
            </div>
            <div class="col-md-12">
            
                <button type="button" class="btn btn-sm d-inline-flex align-items-center justify-content-center" style="background-color:#fc185a; color: #080C29; border-color: #fc185a; gap: 5px;" onclick="eliminarFila(${index}) ">
                    <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #fc185a; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">-</span>
                </button>
            </div>
        </div>
    `;
    $('#dynamicInputs').append(newRow);
    index++;  
});

function eliminarFila(index) {
   
    $('#dynamicInputsRow_' + index).remove();
}


// *******************MI SCRIPT PARA GUARDAR EL FORMULARIO DE LA ENTREGA DE VALORES***************/
document.addEventListener('DOMContentLoaded', function () {
    const btnGuardarValoruni = document.getElementById('btnGuardarSolicitud');

    btnGuardarValoruni.addEventListener('click', async function () {
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
        const correlativoInicial = document.querySelectorAll('input[name="correlativo_inicial[]"]');
        const correlativoFinal = document.querySelectorAll('input[name="correlativo_final[]"]');
        const costoTotal = document.querySelectorAll('input[name="costototal[]"]');
        const monto_saldo_salida = document.querySelectorAll('input[name="costonuevo[]"');
        const cantidad_saldo_salida = document.querySelectorAll('input[name="cantidadnuevo[]"');
        const monto_saldo_entrada = document.querySelectorAll('input[name="costonuevo_ventanilla[]"');
        const cantidad_saldo_entrada = document.querySelectorAll('input[name="cantidadnuevo_ventanilla[]"');

        const detalles = [];
        let camposVacios = false;
        let stockInsuficiente = false;
        let conceptosSinStock = [];

        for (let i = 0; i < idConceptoValor.length; i++) {
            if (!idConceptoValor[i].value || !cantidades[i].value || !correlativoInicial[i].value || !correlativoFinal[i].value || !costoTotal[i].value || !monto_saldo_salida[i].value || !cantidad_saldo_salida[i].value || !monto_saldo_entrada[i].value || !cantidad_saldo_entrada[i].value) {
                camposVacios = true;
                break;
            }

            // Validación de correlativo inicial y final, el final debe ser mayo al inicial
            if (parseInt(correlativoFinal[i].value) <= parseInt(correlativoInicial[i].value)) {
                Swal.fire({
                    title: "Error",
                    text: "Por favor introduzca una cantidad mayor a 0.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }

            const idConcepto = idConceptoValor[i].value;
            const nombreConcepto = idConceptoValor[i].options[idConceptoValor[i].selectedIndex].text;
            const cantidad = parseInt(cantidades[i].value);

            try {
                const response = await fetch(`/verificar-stock/${idConcepto}`);
                const data = await response.json();

                if (data.stock < cantidad) {
                    stockInsuficiente = true;
                    conceptosSinStock.push({
                        nombre: nombreConcepto,
                        stockDisponible: data.stock,
                        stockRequerido: cantidad
                    });
                }
            } catch (error) {
                Swal.fire({
                    title: "Error",
                    text: "Hubo un error al verificar el stock del concepto valor.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }

            detalles.push({
                id_concepto_valor: idConceptoValor[i].value,
                cantidad: cantidades[i].value,
                correlativo_inicial: correlativoInicial[i].value,
                correlativo_final: correlativoFinal[i].value,
                costo_total: costoTotal[i].value,
                montosaldo_salida: monto_saldo_salida[i].value,
                cantidadsaldo_salida: cantidad_saldo_salida[i].value,
                montosaldo_entrada: monto_saldo_entrada[i].value,
                cantidadsaldo_entrada: cantidad_saldo_entrada[i].value,
            });
        }

        if (camposVacios) {
            Swal.fire({
                title: "Error",
                text: "Por favor, complete todos los campos.",
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }

        if (stockInsuficiente) {
            let tabla = `
                <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
                            <th style="padding: 8px; border: 1px solid #f5c6cb;">Concepto</th>
                            <th style="padding: 8px; border: 1px solid #f5c6cb;">Stock Disponible</th>
                            <th style="padding: 8px; border: 1px solid #f5c6cb;">Stock Requerido</th>
                        </tr>
                    </thead>
                    <tbody>
            `;

            conceptosSinStock.forEach(concepto => {
                tabla += `
                    <tr style="background-color: #fdf2f3; color: #721c24; border: 1px solid #f5c6cb;">
                        <td style="padding: 8px; border: 1px solid #f5c6cb;">${concepto.nombre}</td>
                        <td style="padding: 8px; border: 1px solid #f5c6cb;">${concepto.stockDisponible}</td>
                        <td style="padding: 8px; border: 1px solid #f5c6cb;">${concepto.stockRequerido}</td>
                    </tr>
                `;
            });

            tabla += `</tbody></table>`;

            Swal.fire({
                title: "Error",
                html: `<p>El stock disponible no es suficiente para los siguientes conceptos:</p> ${tabla}`,
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }

        Swal.fire({
            title: "¿Está seguro de guardar y enviar los Valores Universitarios?",
            text: "Una vez guardado, no podrá modificarlo.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, guardar",
            cancelButtonText: "No, cancelar"
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    const response = await fetch('/guardarSolResp', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            idSolicitud: idSolicitud,
                            fecha_respuesta: fecha,
                            cantidad_detalles: detalles.length,
                            detalles: detalles
                        })
                    });

                    const data = await response.json();

                    if (data.success) {
                        Swal.fire({
                            title: "Éxito",
                            text: "Se ha enviado los valores exitosamente",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            window.location.href = "/sal_val";
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "Hubo un error al enviar los Valores Universitarios.",
                            icon: "error",
                            confirmButtonText: "OK"
                        });
                    }
                } catch (error) {
                    Swal.fire({
                        title: "Error",
                        text: "Hubo un error al realizar la acción.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            }
        });
    });
});

</script>
@endpush
