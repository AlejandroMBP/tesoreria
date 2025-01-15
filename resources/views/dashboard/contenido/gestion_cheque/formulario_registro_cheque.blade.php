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
                <!-- Boton Crear nuevo Usuario -->
                
                <hr>
                <div class="card">
                <div class="card-body">
                <h6 class="mb-0 text-uppercase">Reportes CSV</h6>
                <hr>
                <form class="row g-3">
									<div class="col-md-6">
										<label for="input1" class="form-label">Hoja Ruta Rectorado</label>
										<input type="text" class="form-control" id="input1" placeholder="First Name">
									</div>
									<div class="col-md-6">
										<label for="input2" class="form-label">Hoja Ruta DAF</label>
										<input type="text" class="form-control" id="input2" placeholder="Last Name">
									</div>
									<div class="col-md-6">
										<label for="input3" class="form-label">Figura</label>
										<input type="text" class="form-control" id="input3" placeholder="Phone">
									</div>
									<div class="col-md-6">
										<label for="input4" class="form-label">Fecha de ingreso a tesoreria</label>
										<input type="email" class="form-control" id="input4">
									</div>
									<div class="col-md-6">
										<label for="input5" class="form-label">Nro. tipo</label>
										<input type="password" class="form-control" id="input5">
									</div>
									<div class="col-md-6">
										<label for="input6" class="form-label">Tipo</label>
										<input type="date" class="form-control" id="input6">
									</div>
                                    <div class="col-md-12">
										<label for="input11" class="form-label">Resúmen</label>
										<textarea class="form-control" id="input11" placeholder="Address ..." rows="3"></textarea>
									</div>
                                    <div class="col-md-6">
										<label for="input1" class="form-label">Número cheque</label>
										<input type="text" class="form-control" id="input1" placeholder="First Name">
									</div>
									<div class="col-md-6">
										<label for="input2" class="form-label">Nombre beneficiario</label>
										<input type="text" class="form-control" id="input2" placeholder="Last Name">
									</div>
									<div class="col-md-6">
										<label for="input3" class="form-label">Monto cheque</label>
										<input type="text" class="form-control" id="input3" placeholder="Phone">
									</div>
									<div class="col-md-6">
										<label for="input4" class="form-label">comprobante</label>
										<input type="email" class="form-control" id="input4">
									</div>
                                    <div class="col-md-6">
										<label for="input1" class="form-label">Cuenta</label>
										<input type="text" class="form-control" id="input1" placeholder="First Name">
									</div>
									<div class="col-md-6">
										<label for="input2" class="form-label">Nro. verde DAF</label>
										<input type="text" class="form-control" id="input2" placeholder="Last Name">
									</div>
									<div class="col-md-6">
										<label for="input3" class="form-label">Fecha despacho para firmas</label>
										<input type="text" class="form-control" id="input3" placeholder="Phone">
									</div>
									<div class="col-md-6">
										<label for="input4" class="form-label">Fecha reingreso</label>
										<input type="email" class="form-control" id="input4">
									</div>
                                    <div class="col-md-6">
										<label for="input3" class="form-label">Fecha de entrega a beneficiario</label>
										<input type="text" class="form-control" id="input3" placeholder="Phone">
									</div>
									<div class="col-md-6">
										<label for="input4" class="form-label">Fecha remision archivo contable</label>
										<input type="email" class="form-control" id="input4">
									</div>
                                    <div class="col-md-12">
										<label for="input4" class="form-label">Observación</label>
										<input type="email" class="form-control" id="input4">
									</div>
                                    <hr>
                                    <div class="row align-items-center">
                                        
                                        <!-- Estado -->
                                        <div class="col-md-6">
                                            <label class="form-label fw-bold">Estado:</label>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="estado" id="activo" value="activo" checked>
                                            <label class="form-check-label" for="activo">Activo</label>
                                            </div>
                                            <div class="form-check">
                                            <input class="form-check-input" type="radio" name="estado" id="inactivo" value="inactivo">
                                            <label class="form-check-label" for="inactivo">Inactivo</label>
                                            </div>
                                        </div>

                                        <!-- Revisión -->
                                        <div class="col-md-6">
                                            <label for="input7" class="form-label fw-bold">Revisión:</label>
                                            <select id="input7" class="form-select">
                                            <option selected>Choose...</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                            </select>
                                        </div>
                                        </div>
                                        <hr>
								
									<div class="col-md-12">
										<div class="d-md-flex d-grid align-items-center gap-3">
                                        <button id="btnGuardar" type="button" class="btn btn-primary">Guardar</button> 
											<button type="button" class="btn btn-grd-royal px-4">Cancelar</button>
										</div>
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
        $(document).ready(function() {
        $('#agregar-fila').click(function(event) {
            event.preventDefault();
            // Agregar una nueva fila al final de la tabla
            var nuevaFila = `<tr>
                                <td>
                                    <select class="form-control" name="columna1[]">
                                        <option value="">Seleccione</option>
                                        <option value="valor1">Valor 1</option>
                                        <option value="valor2">Valor 2</option>
                                        <option value="valor3">Valor 3</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="columna2[]"></td>
                             
                            </tr>`;
                $('#tabla-valores tbody').append(nuevaFila);
            });
        });
        // alert al enviar el formulario de entrega de valores universitarios
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: "btn btn-success",
        cancelButton: "btn btn-danger"
    },
    buttonsStyling: false
    });

    document.getElementById("btnGuardar").addEventListener("click", function (e) {
    e.preventDefault(); 
    swalWithBootstrapButtons.fire({
        title: "¿Estás seguro de enviar la solicitud?",
        text: "No podrás revertir esta acción.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Sí, enviar!",
        cancelButtonText: "No, cancelar!",
        reverseButtons: true,
        didRender: () => {
        // Agregar espacio entre botones en línea
        const actionsContainer = document.querySelector('.swal2-actions');
        if (actionsContainer) {
            actionsContainer.style.justifyContent = "center"; // Centrar botones
            actionsContainer.style.gap = "1rem"; // Agregar espacio entre botones
        }
        }
    }).then((result) => {
        if (result.isConfirmed) {
        //  procede a enviar el formulario
        document.getElementById("formulariosoli").submit();
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
