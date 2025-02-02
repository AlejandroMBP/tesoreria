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
                            <li class="breadcrumb-item active" aria-current="page">Registro de entrada de valores nuevos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            
            <!-- ***Pestañas para usuarios activos e inactivos ***-->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0 text-uppercase">Administración de valores  {{$adquisicion->fecha_adquisicion}}</h6>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <!-- Pestañas de navegación -->
                    <ul class="nav nav-tabs nav-success" role="tablist">                       
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabEntEscaso" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Valores escasos</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#tabEntSuficiente" role="tab" aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-person me-1 fs-6"></i></div>
                                    <div class="tab-title">Valores suficientes</div>
                                </div>
                            </a>
                        </li>
                    </ul>

                    <!-- Contenido de las pestañas -->
                    <div class="tab-content mt-3">
                        <!-- Pestaña de Valores escasos -->
                        <div class="tab-pane fade show active" id="tabEntEscaso" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" id="contenedorEntEscaso">
                                <p class="text-center">Cargando datos...</p>
                            </div>
                        </div>

                        <!-- Pestaña de Valores suficientes -->
                        <div class="tab-pane fade" id="tabEntSuficiente" role="tabpanel">
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3" id="contenedorEntSuficiente">
                                <p class="text-center">Cargando datos...</p>
                            </div>
                        </div>
                    </div>  

                </div>
            </div>
        </div>
   

    <!-- Modal para registrar nuevo ingreso de valor -->
    <div class="modal fade" id="ingresarValorModal" tabindex="-1" aria-labelledby="ingresarValorModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header border-bottom-0 bg-primary py-2">
                    <h5 class="modal-title text-white">Registrar nuevo ingreso de valor</h5> 
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <img src="assets/images/gallery/documents.png" alt="Imagen del proveedor" class="img-fluid rounded mb-3" style="max-width: 80%; height: auto;">
                                <p>Ingrese los Valores universitarios</p>
                                <table class="table table-bordered">
                                    <tbody> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <form id="form_nuevo_ingreso">
                                <div class="mb-3">
                                    <label for="fechaingresovalor" class="form-label">Fecha de hoy:</label>
                                    <input type="date" class="form-control" id="fechaingresovalor" placeholder="Ingrese la fecha de ingreso de valor">
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-1">
                                        <label for="unidades" class="form-label">Unidades:</label>
                                        <input type="text" class="form-control" id="unidades" placeholder="Ingrese el número de celular">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="total" class="form-label">Valor total en Bs.:</label>
                                        <input type="text" class="form-control" id="total" placeholder="Ingrese el número de celular">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-1">
                                        <label for="correlativo_inicial" class="form-label">Correlativo inicial:</label>
                                        <input type="text" class="form-control" id="correlativo_inicial" placeholder="Ingrese el número de celular">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="serie_ini" class="form-label">Serie:</label>
                                        <input type="text" class="form-control" id="serie_ini" placeholder="Ingrese el número de celular">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-1">
                                        <label for="correlativo_final" class="form-label">Correlativo final:</label>
                                        <input type="text" class="form-control" id="correlativo_final" placeholder="Ingrese el número de celular">
                                    </div>
                                    <div class="col-md-6 mb-1">
                                        <label for="serie_fin" class="form-label">Serie:</label>
                                        <input type="text" class="form-control" id="serie_fin" placeholder="Ingrese el número de celular">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btnGuardarNuevoIngreso" type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('scripts')
<script>
    //**************funcion para cargar listar los valores escasos***************/
    $(document).ready(function () {
        function cargarValoresEscasosEnt() {
            $.ajax({
                url: '{{ url("stock/valores-escasos") }}',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log(response); 
                    let cards = '';
                    response.forEach(function (valor) {
                        
                        cards += `
                            <div class="row row-cols-10 row-cols-lg-20 row-cols-xl-9 g-3">
                                <div class="col">
                                    <div class="card rounded-4 mb-0 border">
                                        <div class="card-body text-center">
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="font-weight: bold;">${valor.nombre}</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <img src="assets/images/gallery/documents.png" width="150" alt="">
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="color: green; font-size: 1.2rem; font-weight: bold;"">${valor.cantidad} unidades</p>
                                                <p class="text">Fecha último ingreso: ${valor.fecha_adquisicion}</p>
                                                <p class="text">Estado: ${valor.estado}</p>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <button class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                                                        style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;" 
                                                        data-bs-toggle="modal" data-bs-target="#ingresarValorModal" 
                                                        data-id="${valor.id}"
                                                        data-nombre="${valor.nombre}"
                                                        data-cantidad="${valor.cantidad}"
                                                        data-fecha="${valor.fecha_adquisicion}"
                                                        data-correlativo-inicial="${valor.correlativo_inicial}"
                                                        data-correlativo-final="${valor.correlativo_final}">
                                                    <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #95C11E; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">+</span>
                                                    Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                    });
                    $('#contenedorEntEscaso').html(cards);
                },
                error: function () {
                    $('#contenedorEntEscaso').html('<p class="text-danger">Error al cargar los datos.</p>');
                }
            });
        }
        //**************funcion para cargar listar los valores suficientes***************/
        function cargarEntSuficientes() {
            $.ajax({
                url: '{{ url("stock/valores-suficientes") }}',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    console.log(response);  
                    let cards = '';
                    response.forEach(function (valor) {
                      
                        cards += `
                            <div class="row row-cols-10 row-cols-lg-20 row-cols-xl-9 g-3">
                                <div class="col">
                                    <div class="card rounded-4 mb-0 border">
                                        <div class="card-body text-center">
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="font-weight: bold;">${valor.nombre}</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <img src="assets/images/gallery/documents.png" width="150" alt="">
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="color: green; font-size: 1.2rem; font-weight: bold;"">${valor.cantidad} unidades</p>
                                                <p class="text">Fecha último ingreso: ${valor.fecha_adquisicion}</p>
                                                <p class="text">Estado: ${valor.estado}</p>
                                            </div>
                                            <div class="mt-4 text-center">
                                                <button class="btn btn-sm d-inline-flex align-items-center justify-content-center" 
                                                        style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px;" 
                                                        data-bs-toggle="modal" data-bs-target="#ingresarValorModal" 
                                                        data-id="${valor.id}"
                                                        data-nombre="${valor.nombre}"
                                                        data-cantidad="${valor.cantidad}"
                                                        data-fecha="${valor.fecha_adquisicion}"
                                                        data-correlativo-inicial="${valor.correlativo_inicial}"
                                                        data-correlativo-final="${valor.correlativo_final}">
                                                    <span style="display: inline-block; width: 20px; height: 20px; background-color: #080C29; color: #95C11E; font-weight: bold; font-size: 14px; text-align: center; line-height: 20px; border-radius: 4px;">+</span>
                                                    Agregar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        });
                    $('#contenedorEntSuficiente').html(cards);
                },
                error: function () {
                    $('#contenedorEntSuficiente').html('<p class="text-danger">Error al cargar los datos.</p>');
                }
            });
        }
        cargarValoresEscasosEnt();

        $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
            let target = $(e.target).attr("href");

            if (target === "#tabEntEscaso") {
                cargarValoresEscasosEnt();
            } else if (target === "#tabEntSuficiente") {
                cargarEntSuficientes();
            }
        });
    });
    //******ABRIMOS EL MODAL PASANDO LOS DATOS NECESARIOS*******
    $('#ingresarValorModal').on('shown.bs.modal', function (e) {
    
    var button = $(e.relatedTarget); 
    var id = button.data('id');
    var nombre = button.data('nombre');
    var cantidad = button.data('cantidad');
    var fecha = button.data('fecha');
    var correlativoInicial = button.data('correlativo-inicial');
    var correlativoFinal = button.data('correlativo-final');
  
    $('#ingresarValorModal .modal-title').text(`Registrar nuevo ingreso de ${nombre}`);
    $('#ingresarValorModal .table tbody').html(`
        
        <tr>
            <td>Cantidad de unidades</td>
            <td>${cantidad}</td>
        </tr>
        <tr>
            <td>Fecha último ingreso</td>
            <td>${fecha}</td>
        </tr>
        <tr>
            <td>Correlativo inicial</td>
            <td>${correlativoInicial}</td>
        </tr>
        <tr>
            <td>Correlativo final</td>
            <td>${correlativoFinal}</td>
        </tr>
    `);
});

</script>

   
@endpush
