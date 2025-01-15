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
                            <li class="breadcrumb-item active" aria-current="page">Salida de valores</li>
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
                                <h6 class="fw-normal" style="font-size: 0.6rem;">SOLICITANTE: LIC. ALFREDO PEREZ GOMEZ</h6>
                                <h6 class="fw-normal" style="font-size: 0.6rem;">FECHA DE SOLICITUD: 24/11/24</h6>
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
                                    <tr>
                                        <td>PRORROGA DE TÍTULO DE BACHILLER</td>
                                        <td>300</td>
                                        
                                    </tr>
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
                            <form id="formulariosoli" class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabla-valores">
                                    <thead>
                                        <tr>
                                            <th>TIPO DE DOCUMENTO</th>
                                            <th>CANTIDAD</th>
                                            <th>CORRELATIVO INICIAL</th>
                                            <th>CORRELATIVO FINAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control" name="columna1[]">
                                                    <option value="">Seleccione</option>
                                                    <option value="valor1">Valor fffffffffffffffffffffffffffffffhdfhd</option>
                                                    <option value="valor2">Valor 2</option>
                                                    <option value="valor3">Valor 3</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control" name="columna2[]"></td>
                                            <td><input type="text" class="form-control" name="columna3[]"></td>
                                            <td><input type="text" class="form-control" name="columna4[]"></td>
                                        </tr>
                                    </tbody>
                                </table>
</div>
                                <div class="text-end">
                                <button id="agregar-fila" class="btn btn-sm d-inline-flex align-items-center justify-content-center" style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;">
                                    <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #95C11E; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">+</span> 
                                </button>   
                                </div>
                                <hr>
                                <div class="d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-danger">Cancelar</button>
                                    <button id="btnGuardar" type="button" class="btn btn-primary">Guardar</button> 
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
                            <td><input type="text" class="form-control" name="columna3[]"></td>
                            <td><input type="text" class="form-control" name="columna4[]"></td>
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
    e.preventDefault(); // Evita el envío directo del formulario
    swalWithBootstrapButtons.fire({
        title: "¿Estás seguro de entregar los valores universitarios?",
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
        // Aquí puedes proceder a enviar el formulario
        document.getElementById("formulariosoli").submit(); // Reemplaza "formulario" con el ID real de tu formulario
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
