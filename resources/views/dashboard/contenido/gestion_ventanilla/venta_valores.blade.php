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
                            <li class="breadcrumb-item active" aria-current="page">Venta de valores diarios</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row"> 
                <!-- Boton Crear nuevo Usuario -->
                <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearValorunivModal"><i class="bi bi-plus-square"> </i>Crear nuevo informe de venta</button> 
                </div>
                <hr>
                <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tablaVentaValores" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;">#</th>
                                    <th style="text-align: center; vertical-align: middle;">FECHA DE VENTA</th>
                                    <th style="text-align: center; vertical-align: middle;">NRO DE INFORME</th>
                                    <th style="text-align: center; vertical-align: middle;">RESPONSABLE DE CAJA</th>
                                    <th style="text-align: center; vertical-align: middle;">ESTADO</th>
                                    <th style="text-align: center; vertical-align: middle;">ACCIÓN</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($venta_val as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td style="text-align: center;">{{ $venta->fecha_venta }}</td>
                    <td style="text-align: center;">{{ $venta->nro_informe }}</td>
                    <td>{{ $venta->id_user }}</td>
                    <td>
                        @if($venta->estado == 1)
                            <span>PENDIENTE</span>
                        @elseif($venta->estado == 2)
                            <span>IMPRESA</span>
                        @endif
                    </td>
                    <td>
                       
                        @if($venta->estado == 1)
                            <a href="{{ route('registro_ventas_valores', [$venta->id] ) }}" class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                               style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px; text-decoration: none;">
                                REGISTRAR
                            </a>
                        @elseif($venta->estado == 2)
                            <a href="{{ route('imprimir_venta', $venta->id) }}" class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                               style="background-color: #4CAF50; color: #fff; border-color: #4CAF50; gap: 5px; text-decoration: none;">
                                IMPRIMIR
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div> 
            
            <!--********************* Modal para crear un nuevo valor ****************************-->
            <div class="modal fade" id="crearValorunivModal" tabindex="-1" aria-labelledby="crearValorunivModalLabel" >
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header border-bottom-0 bg-primary py-2">
                                        <h5 class="modal-title text-white">Crear nuevo Valor Universitario</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="order-summary">
                                            <div class="card mb-0">
                                                <div class="card-body">
                                                    <form id="form_guardar_valoruni">
                                                        <div class="row g-3">
                                                            <div class="col-12 col-md-6">
                                                                <label for="fechaventa" class="form-label">Fecha de informe de venta</label>
                                                                <input type="date" class="form-control" id="fechaventa" placeholder="Ingrese la fecha de venta">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label for="nroinforme" class="form-label">Nro de informe</label>
                                                                <input type="number" class="form-control" id="nroinforme" placeholder="Ingrese el # de informe">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-top-0">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                        <button id="btnGuardarVenta" type="button" class="btn btn-primary">Guardar</button> 
                                    </div>
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
$('#tablaVentaValores').DataTable({
    responsive: true,
    paging: true,
    searching: true,
    language: {
        url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
    }
});
const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
    //********************Script botón guardar venta_valores********************************
    document.addEventListener('DOMContentLoaded', function () {
  
    const btnGuardarVenta = document.getElementById('btnGuardarVenta');

    btnGuardarVenta.addEventListener('click', function () {
        const fecha_vent = document.getElementById('fechaventa').value;
        const nroinforme = document.getElementById('nroinforme').value;
        if (!fecha_vent || !nroinforme) {
            Swal.fire({
                title: "Error",
                text: "Todos los campos son obligatorios.",
                icon: "error",
                confirmButtonText: "OK"
            });
            return;
        }
        fetch('/guardarVentaValor', {  
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                fecha_venta: fecha_vent,
                nro_informe: nroinforme
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: "Éxito",
                    text: "El Valor universitario se ha creado correctamente.",
                    icon: "success",
                    confirmButtonText: "OK"
                }).then(() => {
                    location.reload(); 
                });
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Hubo un error al crear el Valor universitario.",
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
