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
                        <h6 class="mb-0 text-uppercase">REGISTRO DE VENTAS DEL DIA</h6>
                        <hr>
                        <form id="form_venta_valores_detalle" method="POST" action="{{ route('guardar_venta_valores') }}">
                            @csrf
                            <input type="hidden" name="venta_valor_id" value="{{ $venta_valor->id }}">
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
                                                    <option value="">Seleccione un concepto valor</option>
                                                    @foreach ($conceptos as $concepto)
                                                        <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option>
                                                    @endforeach
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
                                <button id="btnGuardar" type="submit" class="btn btn-primary">Guardar</button> 
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
                                    <option value="">Seleccione un concepto valor</option>
                                        @foreach ($conceptos as $concepto)
                                            <option value="{{ $concepto->id }}">{{ $concepto->nombre }}</option>
                                        @endforeach
                                
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

    //***********mi funcion script para guardar */
    document.getElementById("btnGuardar").addEventListener("click", function (e) {
    e.preventDefault(); 
    swalWithBootstrapButtons.fire({
        title: "¿Estás seguro de guardar las ventas de hoy?",
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
            // Obtener el valor del `venta_valor_id` desde tu variable o campo
            var ventaValorId = "{{ $venta_valor->id }}"; // Si ya tienes la variable disponible en Blade

            // Enviar los datos usando AJAX
            $.ajax({
                url: '{{ route("guardar_venta_valores") }}', // Ruta
                method: 'POST',
                data: $('#form_venta_valores_detalle').serialize() + '&venta_valor_id=' + ventaValorId, // Agregar el `venta_valor_id` manualmente
                success: function(response) {
                    if (response.success) {
                        swalWithBootstrapButtons.fire(
                            'Guardado',
                            'Las ventas se han guardado correctamente.',
                            'success'
                        );
                    } else {
                        swalWithBootstrapButtons.fire(
                            'Error',
                            'Hubo un problema al guardar las ventas.',
                            'error'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    swalWithBootstrapButtons.fire(
                        'Error',
                        'Hubo un error al procesar la solicitud.',
                        'error'
                    );
                }
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
