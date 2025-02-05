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
                            <li class="breadcrumb-item active" aria-current="page">Formulario de solicitud de valores</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row"> 
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Formulario de solicitud</h6>
                        <hr>
                        <form id="form_solicitud">
                            <div class="row g-3">
                                <div class="col-md-4">
                                <label for="remitente_nombre" class="form-label">Remitente</label>
                                <input type="hidden" name="remitente" id="remitente" value="{{ $user->id }}">
                                <input type="text" class="form-control" id="remitente_nombre" value="{{ $user->name }}" readonly>
                                </div>
                                <div class="col-md-4">
                                <label for="destinatario" class="form-label">Destinatario</label>
                                <select class="form-control" name="destinatario" id="destinatario">
                                            <option value="">Seleccione el destinatario</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-md-4">
                                <label for="fecha" class="form-label">Fecha solicitud</label>
                                <input type="date" class="form-control" name="fecha" id="fecha">
                                </div>
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
            const remitente = document.getElementById('remitente').value;
            const destinatario = document.getElementById('destinatario').value;
            const fecha = document.getElementById('fecha').value;

            if (!remitente || !destinatario || !fecha) {
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

            fetch('/guardarSol', {  
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    remitente: remitente,
                    destinatario: destinatario,
                    fecha_solicitud: fecha,
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
                        window.location.href = "sol_val"; 
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
        });
        });



    </script>
@endpush
