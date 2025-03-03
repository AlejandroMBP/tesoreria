@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Administración de bodega de valores</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Formulario de registro valores adquiridos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row"> 
                <hr>
                <div class="card">
                    <div class="card-body">
                    <h6 class="mb-0 text-uppercase text-center">Formulario de registro de adquisición de "valores universitarios"</h6>
                        <hr>
                        <form id="form_adquisicion">
                            <div class="row g-3">
                            <div class="col-md-4">
                                <label for="fecha" class="form-label">Fecha de registro</label>
                                <input type="date" class="form-control" name="fecha" id="fecha" value="{{ $fechaHoy }}" readonly>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="id_prov" class="form-label">Proveedor</label>
                                    <select class="form-control" name="id_prov" id="id_prov">
                                        <option value="">Seleccione un proveedor</option>
                                        @foreach ($proveedor as $prov)
                                            <option value="{{ $prov->id }}">{{ $prov->nombre }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                            </div>                       
                            <hr>
                            <div id="dynamicInputs">
                                <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="id_concepto_valor_0" class="form-label">Tipo documento</label>
                                    <select class="form-control form-control-sm input-reducido" name="id_concepto_valor[]" id="id_concepto_valor_0">
                                        <option value="">Seleccione un Tipo documento</option>
                                        @foreach ($conceptos as $concepto)
                                            <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="cantidad_0" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control form-control-sm input-reducido" name="cantidad[]" id="cantidad_0" placeholder="Cantidad">
                                </div>
                                <div class="col-md-2">
                                    <label for="correlativo_inicial_0" class="form-label">Correlativo inicial</label>
                                    <input type="number" class="form-control form-control-sm input-reducido" name="correlativo_inicial[]" id="correlativo_inicial_0" placeholder="Inicial" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="correlativo_final_0" class="form-label">Correlativo final</label>
                                    <input type="number" class="form-control form-control-sm input-reducido" name="correlativo_final[]" id="correlativo_final_0" placeholder="Final" readonly>
                                </div>
                                <div class="col-md-2">
                                    <label for="costototal_0" class="form-label">Costo Total (Bs.)</label>
                                    <input type="number" class="form-control form-control-sm input-reducido" name="costototal[]" id="costototal_0" placeholder="Costo" readonly>
                                </div>
                                <div class="col-md-2 d-none">
                                    <label for="monto_saldo_0" class="form-label">Monto Total</label>
                                    <input type="number" class="form-control form-control-sm input-reducido" name="monto_saldo[]" id="monto_saldo_0" readonly>
                                </div>

                                <div class="col-md-2 d-none">
                                    <label for="cantidad_saldo_0" class="form-label">Cantidad Total</label>
                                    <input type="number" class="form-control form-control-sm input-reducido" name="cantidad_saldo[]" id="cantidad_saldo_0" readonly>
                                </div>
                                <div class="col-md-1 d-flex align-items-center">
                                    <!-- Botón de eliminar con ícono de basurero -->
                                    <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)">
                                        <i class="fas fa-trash"></i> <!-- Ícono de basurero -->
                                    </button>
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
                                <button id="btnGuardarAdquisicion" type="button" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="overlay btn-toggle"></div>
@endsection
@push('scripts')
    <script>


// Espera a que todo el DOM esté cargado
document.addEventListener('DOMContentLoaded', function () {
    const btnAgregar = document.getElementById('btnAgregarInputs');
    const dynamicInputs = document.getElementById('dynamicInputs');
    let counter = 1; // Empezamos en 1 porque ya existe un input inicial
    // Agregar evento de eliminación para la primera fila
    const firstDeleteButton = document.querySelector('#dynamicInputs .btn-danger');
    if (firstDeleteButton) {
        firstDeleteButton.addEventListener('click', function () {
            const firstRow = firstDeleteButton.closest('.row');
            firstRow.remove(); // Eliminar la primera fila
        });
    }

    // Evento para agregar una nueva fila
    btnAgregar.addEventListener('click', function () {
        const newRow = document.createElement('div');
        newRow.className = 'row g-3 mt-2';
        newRow.innerHTML = `
            <div class="col-md-3">
                <select class="form-control form-control-sm input-reducido" name="id_concepto_valor[]" id="id_concepto_valor_${counter}">
                    <option value="">Seleccione un concepto valor</option>
                    @foreach ($conceptos as $concepto)
                        <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option> 
                    @endforeach
                </select>
            </div>
           <div class="col-md-2">
    <input type="number" class="form-control form-control-sm input-reducido" name="cantidad[]" id="cantidad_${counter}" placeholder="Cantidad">
</div>
            <div class="col-md-2">
                <input type="number" class="form-control form-control-sm input-reducido" name="correlativo_inicial[]" id="correlativo_inicial_${counter}" placeholder="Inicial" readonly>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control form-control-sm input-reducido" name="correlativo_final[]" id="correlativo_final_${counter}" placeholder="Final" readonly>
            </div>
            <div class="col-md-2">
                <input type="number" class="form-control form-control-sm input-reducido" name="costototal[]" id="costototal_${counter}" placeholder="Costo" readonly>
            </div>
            <div class="col-md-2 d-none">
                <input type="number" class="form-control form-control-sm input-reducido" name="monto_saldo[]" id="monto_saldo_${counter}" readonly>
            </div>
            <div class="col-md-2 d-none">
                <input type="number" class="form-control form-control-sm input-reducido" name="cantidad_saldo[]" id="cantidad_saldo_${counter}" readonly>
            </div>
           
            <div class="col-md-1">
                <button type="button" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> <!-- Icono de basurero -->
                </button>
            </div>
        `;
        
        // Agregar la nueva fila al contenedor
        dynamicInputs.appendChild(newRow);

        newRow.querySelectorAll('input[readonly]').forEach(input => {
            input.addEventListener('keydown', function (e) {
                e.preventDefault(); // Bloquea la edición manual
            });
        });
        // Incrementar el contador para la siguiente fila
        counter++;

        // Añadir el evento de eliminar fila a cada botón de eliminar
        const btnEliminar = newRow.querySelector('.btn-danger');
        btnEliminar.addEventListener('click', function () {
            newRow.remove(); // Eliminar la fila
        });
    });
});





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
            dataType: 'json',
            success: function (response) {
                console.log("Datos recibidos:", response);
                
                let correlativoInicial = response.correlativo_final + 1 || 0;
                let correlativoFinal = correlativoInicial + cantidad - 1;
                let precioUnitario = response.precio_unitario || 0;
                let costoTotal = precioUnitario * cantidad;
                let costo_stock = response.cantidad || 0;
                let montoSaldo = costo_stock + costoTotal;
                let cantidad_stock = response.costo || 0;
                let cantidadSaldo = cantidad_stock + cantidad

                $('#correlativo_inicial_' + index).val(correlativoInicial);
                $('#correlativo_final_' + index).val(correlativoFinal);
                $('#costototal_' + index).val(costoTotal);
                $('#monto_saldo_' + index).val(montoSaldo);
                $('#cantidad_saldo_' + index).val(cantidadSaldo);
            },
            error: function () {
                alert('Hubo un error al obtener los datos.');
            }
        });
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const btnGuardarValoruni = document.getElementById('btnGuardarAdquisicion');

    btnGuardarValoruni.addEventListener('click', function () {
        const fecha = document.getElementById('fecha').value;
        const proveedor = document.getElementById('id_prov').value;

        if (!fecha || !proveedor) {
            Swal.fire({
                title: "Error",
                text: "El campo de proveedor debe ser llenado!",
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }

        const idConceptoValor = document.querySelectorAll('select[name="id_concepto_valor[]"]');
        const cantidades = document.querySelectorAll('input[name="cantidad[]"]');
        const correlativoInicial = document.querySelectorAll('input[name="correlativo_inicial[]"]');
        const correlativoFinal = document.querySelectorAll('input[name="correlativo_final[]"]');
        const costosTotal = document.querySelectorAll('input[name="costototal[]"]');
        const montosSaldo = document.querySelectorAll('input[name="monto_saldo[]"]');
        const cantidadesSaldo = document.querySelectorAll('input[name="cantidad_saldo[]"]');

        const detalles = [];
        let camposVacios = false;
        let tiposDocumentos = []; // Array para los tipos de documento

        for (let i = 0; i < idConceptoValor.length; i++) {
            const tipoDocumento = idConceptoValor[i].value;

            // Verifica si el tipo de documento ya existe en el array
            if (tiposDocumentos.includes(tipoDocumento)) {
                Swal.fire({
                    title: "Error",
                    text: "No puedes agregar el mismo tipo de documento más de una vez.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }

            // Si no existe, lo agrega al array para la validación futura
            tiposDocumentos.push(tipoDocumento);

            // Validación de los demás campos
            if (!idConceptoValor[i].value || !cantidades[i].value || !correlativoInicial[i].value || !correlativoFinal[i].value || !costosTotal[i].value || !montosSaldo[i].value || !cantidadesSaldo[i].value) {
                camposVacios = true;
                break;
            }
            
            // Validación de correlativo inicial y final
            if (parseInt(correlativoFinal[i].value) < parseInt(correlativoInicial[i].value)) {
                Swal.fire({
                    title: "Error",
                    text: "Por favor introduzca una cantidad mayor a 0.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
                return;
            }

            const conceptoNombre = idConceptoValor[i].options[idConceptoValor[i].selectedIndex].text;
            detalles.push({
                id_concepto_valor: idConceptoValor[i].value,
                concepto_nombre: conceptoNombre,
                cantidad: cantidades[i].value,
                correlativoIni: correlativoInicial[i].value,
                correlativoFin: correlativoFinal[i].value,
                costoTotales: costosTotal[i].value,
                montoSaldos: montosSaldo[i].value,
                cantidadSaldos: cantidadesSaldo[i].value
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

        let tablaDetalles = '<div class="tabla-detalles-container">';

        tablaDetalles += '<div class="fecha-proveedor">';
        tablaDetalles += `<strong>Fecha de adquisición:</strong> ${fecha} <br>`;
        tablaDetalles += `<strong>Proveedor:</strong> ${proveedor}`;
        tablaDetalles += '</div>';

        tablaDetalles += '<table class="tabla-detalles">';
        tablaDetalles += '<thead>';
        tablaDetalles += '<tr>';
        tablaDetalles += '<th>Tipo documento</th>';
        tablaDetalles += '<th>Cantidad (unidades)</th>';
        tablaDetalles += '<th>Correlativo (Inicial)</th>';
        tablaDetalles += '<th>Correlativo (Final)</th>';
        tablaDetalles += '<th>Costo Total (Bs.)</th>';
        tablaDetalles += '</tr>';
        tablaDetalles += '</thead><tbody>';

        detalles.forEach(detalle => {
            tablaDetalles += '<tr>';
            tablaDetalles += `<td>${detalle.concepto_nombre}</td>`;
            tablaDetalles += `<td>${detalle.cantidad}</td>`;
            tablaDetalles += `<td>${detalle.correlativoIni}</td>`;
            tablaDetalles += `<td>${detalle.correlativoFin}</td>`;
            tablaDetalles += `<td>${detalle.costoTotales}</td>`;
            tablaDetalles += '</tr>';
        });

        tablaDetalles += '</tbody></table>';
        tablaDetalles += '</div>';

        // Confirmación antes de guardar con tabla de vista previa
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¿Quieres guardar esta adquisición?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Sí, guardar",
            cancelButtonText: "No, cancelar",
            reverseButtons: true,
            customClass: {
            icon: 'custom-icon'  
         },
            html: `
                <p><strong>Datos a guardar:</strong></p>
                <div style="max-height: 400px; overflow-y: auto;">${tablaDetalles}</div>
            `
        }).then((result) => {
            if (result.isConfirmed) {
                const cantidadDetalles = detalles.length;

                fetch('/guardarAdquis', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        fecha_adquisicion: fecha,
                        proveedor_adquisicion: proveedor,
                        cantidad_detalles: cantidadDetalles,
                        detalles: detalles
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: "Éxito",
                            text: "La solicitud se ha creado correctamente.",
                            icon: "success",
                            confirmButtonText: "OK"
                        }).then(() => {
                            window.location.href = "ent_val";
                        });
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: "Hubo un error al crear la solicitud.",
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


document.addEventListener('DOMContentLoaded', function () {
    const btnCancelar = document.querySelector('[data-bs-dismiss="modal"]'); // Selecciona el botón cancelar
    const formAdquisicion = document.getElementById('form_adquisicion'); // Selecciona el formulario

    btnCancelar.addEventListener('click', function () {
        // Restablecer el formulario a su estado vacío
        formAdquisicion.reset();

        // Opcional: Si se están agregando dinámicamente más elementos de entrada, puedes eliminarlos
        const dynamicInputs = document.getElementById('dynamicInputs');
        while (dynamicInputs.firstChild) {
            dynamicInputs.removeChild(dynamicInputs.firstChild);
        }

        // Opcional: Si deseas eliminar también los inputs adicionales, puedes hacerlo aquí
    });
});



    </script>
@endpush
