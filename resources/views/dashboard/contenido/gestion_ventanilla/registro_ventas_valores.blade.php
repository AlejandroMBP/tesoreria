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
                <!-- Boton Crear nuevo Usuario -->
                
                <hr>
                <div class="card">
                <div class="card-body">
                <h6 class="mb-0 text-uppercase">REGISTRO DE VENTAS DEL DIA</h6>
                <hr>
                <form id="formulariosoli" class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabla-valores">
                                    <thead>
                                        <tr>
                                            <th>TIPO DE DOCUMENTO</th>
                                            <th>CANTIDAD EN UNIDADES</th>
                                            <th>CORRELATIVO INICIAL</th>
                                            <th>CORRELATIVO FINAL</th>
                                            <th>MONTO TOTAL (Bs.)</th>
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
                                            <td><input type="text" class="form-control" name="columna5[]"></td>
                                           
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
                                <td><input type="text" class="form-control" name="columna5[]"></td>
                             
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
        title: "¿Estás seguro de guardar las ventas de hoy",
        text: "",
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
