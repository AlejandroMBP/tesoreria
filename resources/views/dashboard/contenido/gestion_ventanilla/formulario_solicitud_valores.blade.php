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
                        <form id="form_guardar_solicitudVal" class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabla-valores">
                                    <thead>
                                        <tr>
                                            <th>TIPO DE DOCUMENTO</th>
                                            <th>CANTIDAD EN UNIDADES</th>
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
        const actionsContainer = document.querySelector('.swal2-actions');
        if (actionsContainer) {
            actionsContainer.style.justifyContent = "center"; 
            actionsContainer.style.gap = "1rem"; 
        }
        }
    }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire({
                        title: "Enviado exitosamente",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("form_guardar_solicitudVal").submit();
                        setTimeout(() => {
                        location.reload();  
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
