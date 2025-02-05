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
                            <li class="breadcrumb-item active" aria-current="page">Formulario de registro de cheque</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->


            <div class="row">
                <hr>
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Formulario de registro de cheque</h6>
                        <hr>
                        <form class="row g-3" id="form_guardar_cheque" method="POST" action="{{ route('cheques.guardar') }}">
                            @csrf
                            <div class="col-md-6">
                                <label for="hoja_ruta_Rectorado" class="form-label">Hoja Ruta Rectorado</label>
                                <input type="text" class="form-control" id="hoja_ruta_Rectorado"
                                    name="hoja_ruta_Rectorado" required>
                            </div>
                            <div class="col-md-6">
                                <label for="hoja_ruta_DAF" class="form-label">Hoja Ruta DAF</label>
                                <input type="text" class="form-control" id="hoja_ruta_DAF" name="hoja_ruta_DAF">
                            </div>
                            <div class="col-md-6">
                                <label for="figura" class="form-label">Figura</label>
                                <select id="figura" name="figura" class="form-select">
                                    <option selected>Choose...</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="pago_electronico">Pago Electrónico</option>
                                    <option value="ambos">Ambos</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label for="fecha_ingreso_tesoreria" class="form-label">Fecha de ingreso a tesorería</label>
                                <input type="date" class="form-control" id="fecha_ingreso_tesoreria"
                                    name="fecha_ingreso_tesoreria">
                            </div>
                            <div class="col-md-6">
                                <label for="numero_tipo" class="form-label">Nro. tipo</label>
                                <input type="text" class="form-control" id="numero_tipo" name="numero_tipo">
                            </div>
                            <div class="col-md-6">
                                <label for="tipo" class="form-label">Tipo</label>
                                {{-- <input type="text" class="form-control" id="tipo" name="tipo"> --}}
                                <select id="tipo" name="tipo" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>devengado</option>
                                    <option>preventivo</option>
                                    <option>acreedor</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="resumen" class="form-label">Resumen</label>
                                <textarea class="form-control" id="resumen" name="resumen" rows="3"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="numero_cheque" class="form-label">Número cheque</label>
                                <input type="text" class="form-control" id="numero_cheque" name="numero_cheque">
                            </div>
                            <div class="col-md-6">
                                <label for="nombre_beneficiario" class="form-label">Nombre beneficiario</label>
                                <input type="text" class="form-control" id="nombre_beneficiario"
                                    name="nombre_beneficiario">
                            </div>
                            <div class="col-md-6">
                                <label for="monto_cheque" class="form-label">Monto cheque</label>
                                <input type="text" class="form-control" id="monto_cheque" name="monto_cheque">
                            </div>
                            <div class="col-md-6">
                                <label for="comprobante" class="form-label">Comprobante</label>
                                <input type="text" class="form-control" id="comprobante" name="comprobante">
                            </div>
                            <div class="col-md-6">
                                <label for="cuenta" class="form-label">Cuenta</label>
                                <input type="text" class="form-control" id="cuenta" name="cuenta">
                            </div>
                            <div class="col-md-6">
                                <label for="n_verde_DAF" class="form-label">Nro. verde DAF</label>
                                <input type="text" class="form-control" id="n_verde_DAF" name="n_verde_DAF">
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_despacho_para_firmas" class="form-label">Fecha despacho para
                                    firmas</label>
                                <input type="date" class="form-control" id="fecha_despacho_para_firmas"
                                    name="fecha_despacho_para_firmas">
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_reingreso" class="form-label">Fecha reingreso</label>
                                <input type="date" class="form-control" id="fecha_reingreso" name="fecha_reingreso">
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_entrega_beneficiario" class="form-label">Fecha de entrega a
                                    beneficiario</label>
                                <input type="date" class="form-control" id="fecha_entrega_beneficiario"
                                    name="fecha_entrega_beneficiario">
                            </div>
                            <div class="col-md-6">
                                <label for="fecha_remision_archivo_contable" class="form-label">Fecha remisión archivo
                                    contable</label>
                                <input type="date" class="form-control" id="fecha_remision_archivo_contable"
                                    name="fecha_remision_archivo_contable">
                            </div>
                            <div class="col-md-12">
                                <label for="observacion" class="form-label">Observación</label>
                                <textarea class="form-control" id="observacion" name="observacion"></textarea>
                            </div>
                            <!-- Estado -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Estado:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" id="1"
                                        value="1" checked>
                                    <label class="form-check-label" for="1">Activo</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" id="0"
                                        value="0">
                                    <label class="form-check-label" for="0">Inactivo</label>
                                </div>
                            </div>
                            <!-- Revisión -->
                            <div class="col-md-6">
                                <label for="revision" class="form-label fw-bold">Revisión:</label>
                                <select id="revision" name="revision" class="form-select">
                                    <option selected>Choose...</option>
                                    <option>anulado</option>
                                    <option>cancelado</option>
                                    <option>adicionado</option>
                                </select>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mt-3">
                                <button type="button" class="btn btn-danger">Cancelar</button>
                                <button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button>
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
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        document.getElementById("btnGuardar").addEventListener("click", function(e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de guardar el cheque?",
                text: "No podrás revertir esta acción.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, guardar!",
                cancelButtonText: "No, cancelar!",
                reverseButtons: true,
                didRender: () => {
                    const actionsContainer = document.querySelector('.swal2-actions');
                    if (actionsContainer) {
                        actionsContainer.style.justifyContent = "center";
                        actionsContainer.style.gap = "1rem";
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Guardado exitosamente",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("form_guardar_cheque").submit();
                        setTimeout(() => {
                            window.location.href = "{{ route('cheque') }}";
                        }, 1000);
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha enviado el formulario.",
                        icon: "error"
                    });
                }
            });
        });
    </script> 
@endpush
