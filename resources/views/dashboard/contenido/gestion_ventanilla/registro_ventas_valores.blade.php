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
               
                <div class="col-xxl-8 d-flex align-items-stretch">
                    <div class="card w-100 overflow-hidden rounded-4">
                        <div class="card-body position-relative p-4">
                            <div class="text-center">
                                <h6 class="mb-0 fw-bold">Universidad Pública de El Alto</h6>
                                <h6 class="fw-bold mt-2" style="font-size: 0.7rem;">UNIDAD DE TESORO UNIVERSITARIO</h6>
                            </div>
                            <hr>
                            <div class="text-center mt-3">
                                <h6 class="fw-bold" style="font-size: 0.7rem;">FORMULARIO DE ENTREGA DE VALORES UNIVERSITARIOS</h6>
                            </div>
                            <form id="form_venta">
                                <div class="row g-3">
                                    <input type="hidden" class="form-control" name="idVenta" id="idVenta" value="{{ $venta_valor->id }}" readonly>
                                    <!--<input type="hidden" class="form-control" name="fecha" id="fecha" value="<?= date('Y-m-d'); ?>">-->
                                </div>
                                <hr>
                                <div class="row g-3" id="dynamicInputs">
                                    <div class="col-md-3">
                                        <label for="id_concepto_valor_0" class="form-label">Concepto Valor</label>
                                        <select class="form-control" name="id_concepto_valor[]" id="id_concepto_valor_0" >
                                            <option value="">Seleccione un concepto valor</option>
                                            @foreach ($conceptos as $concepto)
                                                <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="cantidad_0" class="form-label">Cantidad</label>
                                        <input type="number" class="form-control cantidad" name="cantidad[]" id="cantidad_0" placeholder="Cantidad" onchange="calcularMonto(0)">
                                    </div>
                                    <div class="col-md-2">
                                        <label for="correlativo_inicial_0" class="form-label">Correlativo Inicial</label>
                                        <input type="number" class="form-control correlativo_inicial" name="correlativo_inicial[]" id="correlativo_inicial_0" placeholder="Inicial" readonly>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="correlativo_final_0" class="form-label">Correlativo Final</label>
                                        <input type="number" class="form-control correlativo_final" name="correlativo_final[]" id="correlativo_final_0" placeholder="Final" readonly>
                                    </div>
                                    <input type="hidden" name="costo_stock[]" id="costo_stock_0">
                                    <input type="hidden" name="precio_unitario[]" id="precio_unitario_0">
                                    <input type="hidden" name="cantidad_stock[]" id="cantidad_stock_0">
                                    <input type="hidden" name="costonuevo[]" id="costonuevo_0">
                                    <input type="hidden" name="cantidadnuevo[]" id="cantidadnuevo_0">
                                    <div class="col-md-2">
                                        <label for="costototal_0" class="form-label">Costo</label>
                                        <input type="number" class="form-control costototal" name="costototal[]" id="costototal_0" placeholder="Costo" readonly>
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

$(document).ready(function() {
    $('#dynamicInputs').on('change input', 'select[id^="id_concepto_valor_"], input[id^="cantidad_"]', function() {
        var idParts = $(this).attr('id').split('_');
        var index = idParts[idParts.length - 1]; // Asegurar que obtiene el índice correcto
        obtenerDatosCompletos(index);
    });
});

// Función para obtener todos los datos y actualizar los campos
function obtenerDatosCompletos(index) {
    let idConcepto = $('#id_concepto_valor_' + index).val();
    let cantidad = parseInt($('#cantidad_' + index).val()) || 0;

    if (!idConcepto) return; // Si no hay concepto, salimos de la función

    $.ajax({
        url: '/obtener-correlativo_stock_ventanilla/' + idConcepto, 
        type: 'GET',
        success: function(response) {
            let { correlativo_inicial = 0, costo = 0, cantidad: cantidadStock = 0, precio_unitario = 0 } = response;

            // Calcular correlativo final y costo total
            let correlativoFinal = correlativo_inicial + cantidad - 1;
            let costoTotal = (precio_unitario * cantidad).toFixed(2);
            let monto_saldo = costo - costoTotal;
           

            // Asignar valores a los campos
            $('#correlativo_inicial_' + index).val(correlativo_inicial);
            $('#correlativo_final_' + index).val(correlativoFinal);
            $('#precio_unitario_' + index).val(precio_unitario);
            $('#costo_stock_' + index).val(costo);
            $('#cantidad_stock_' + index).val(cantidadStock);
            $('#costototal_' + index).val(costoTotal);
            $('#costonuevo_' + index).val(monto_saldo);
            let cantidad_saldo = cantidadStock - cantidad;
            $('#cantidadnuevo_' + index).val(cantidad_saldo);
        },
        error: function() {
            alert('Hubo un error al obtener los datos.');
        }
    });
}

let index = 1; 

$('#btnAgregarInputs').click(function() {
    let newRow = `
        <div class="row g-3 align-items-end" id="dynamicInputsRow_${index}">
            <div class="col-md-3">
                
                <select class="form-control" name="id_concepto_valor[]" id="id_concepto_valor_${index}" onchange="getCorrelativoInicial(${index})">
                    <option value="">Seleccione un concepto valor</option>
                    @foreach ($conceptos as $concepto)
                        <option value="{{ $concepto->id }}" data-precio="{{ $concepto->precio_unitario }}">{{ $concepto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                
                <input type="number" class="form-control cantidad" name="cantidad[]" id="cantidad_${index}" placeholder="Cantidad" onchange="calcularMonto(${index})">
            </div>
            <div class="col-md-2">
                
                <input type="number" class="form-control correlativo_inicial" name="correlativo_inicial[]" id="correlativo_inicial_${index}" placeholder="Inicial" readonly>
            </div>
            <div class="col-md-2">
                
                <input type="number" class="form-control correlativo_final" name="correlativo_final[]" id="correlativo_final_${index}" placeholder="Final" readonly>
            </div>
            <input type="hidden" name="costo_stock[]" id="costo_stock_${index}">
            <input type="hidden" name="precio_unitario[]" id="precio_unitario_${index}">
            <input type="hidden" name="cantidad_stock[]" id="cantidad_stock_${index}">
            <input type="hidden" name="costonuevo[]" id="costonuevo_${index}">
            <input type="hidden" name="cantidadnuevo[]" id="cantidadnuevo_${index}">
            <div class="col-md-2">            
                <input type="number" class="form-control monto" name="costototal[]" id="costototal_${index}" placeholder="costototal" readonly>
            </div>
            <div class="col-md-1 d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-sm btn-danger" onclick="eliminarFila(${index})">
                    <span style="font-weight: bold; font-size: 16px;">-</span>
                </button>
            </div>
        </div>
    `;

    $('#dynamicInputs').append(newRow);
    index++;
});

// Función para eliminar una fila
function eliminarFila(id) {
    $("#dynamicInputsRow_" + id).remove();
}

// *******************MI SCRIPT PARA GUARDAR EL FORMULARIO DE LA ENTREGA DE VALORES***************//
document.addEventListener('DOMContentLoaded', function () {
    const btnGuardarValoruni = document.getElementById('btnGuardarSolicitud');

    btnGuardarValoruni.addEventListener('click', function () {
        const idVenta = document.getElementById('idVenta').value;
        //const fecha = document.getElementById('fecha').value;
        if (!idVenta ) {
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
        const monto_saldo = document.querySelectorAll('input[name="costonuevo[]"]');
        const cantidad_saldo = document.querySelectorAll('input[name="cantidadnuevo[]"]');

        const detalles = [];
        let camposVacios = false;
        let stockInsuficiente = false;
        let conceptosSinStock = [];

        for (let i = 0; i < idConceptoValor.length; i++) {
            if (!idConceptoValor[i].value || !cantidades[i].value || !correlativoInicial[i].value || !correlativoFinal[i].value || !costoTotal[i].value || !monto_saldo[i].value || !cantidad_saldo[i].value) {
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

            $.ajax({
                url: '/verifi_stock_ventanilla/' + idConcepto,
                type: 'GET',
                async: false,
                success: function(response) {
                    if (response.stock < cantidad) {
                        stockInsuficiente = true;
                        conceptosSinStock.push({
                            nombre: nombreConcepto,
                            stockDisponible: response.stock,
                            stockRequerido: cantidad
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: "Error",
                        text: "Hubo un error al verificar el stock del concepto valor.",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            });

            detalles.push({
                id_concepto_valor: idConceptoValor[i].value,
                cantidad: cantidades[i].value,
                correlativo_inicial: correlativoInicial[i].value,
                correlativo_final: correlativoFinal[i].value,
                costo_total: costoTotal[i].value,
                montosaldo: monto_saldo[i].value,
                cantidadsaldo: cantidad_saldo[i].value
            });
        }

        if (camposVacios) {
            Swal.fire({
                title: "Error",
                text: "Por favor, complete todos los campos de concepto valor, cantidad, correlativo inicial y correlativo final.",
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
            title: "¿Está seguro de guardar y enviar los Valores Universitarios al remitente?",
            text: "Una vez guardada, no podrá modificar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, guardar",
            cancelButtonText: "No, cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                fetch('/guardarVentaDetalle', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        idVenta: idVenta,
                        //fecha_respuesta: fecha,
                        cantidad_detalles: detalles.length,
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
                            window.location.href = "{{ route('venta_valores') }}";
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
