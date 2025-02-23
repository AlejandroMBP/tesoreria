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
                <h6 class="mb-0 text-uppercase">Administración de valores  </h6>
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
                        <h5 class="modal-title text-white">Registrar nuevo ingreso de valor </h5> 
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <img src="{{asset('assets/images/gallery/documents.png')}}" alt="Imagen del proveedor" class="img-fluid rounded mb-3" style="max-width: 80%; height: auto;">
                                    <p>Ingrese los Valores universitarios</p>
                                    <table class="table table-bordered">
                                        <tbody> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form id="form_guardar_valoruni">
                                      
                                    <input type="hidden" name="id_concepto_valor" id="id_concepto_valor">                      
                                    <input type="hidden" id="precio_unitario">
                                    <input type="hidden" id="costo">
                                    <input type="hidden" id="costonuevo">
                                    <input type="hidden" id="cantidad">
                                    <input type="hidden" id="cantidadnuevo">
                                 
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <label for="cantidad_valor" class="form-label">Cantidad</label>
                                            <input type="number" class="form-control" id="cantidad_valor" placeholder="Ingrese la cantidad en unidades">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <label for="correlativo_inicial" class="form-label">Correlativo Inicial</label>
                                            <input type="number" class="form-control" id="correlativo_inicial" placeholder="Ingrese el correlativo inicial" readonly>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="correlativo_final" class="form-label">Correlativo Final</label>
                                            <input type="number" class="form-control" id="correlativo_final" placeholder="Ingrese el correlativo final" readonly>
                                        </div>  
                                                                      
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <label for="serie_valor" class="form-label">Serie</label>
                                            <input type="text" class="form-control" id="serie_valor" placeholder="Ingrese la serie">
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <label for="montototal" class="form-label">Monto</label>
                                            <input type="number" class="form-control" id="montototal" placeholder="Ingrese el monto total en Bs">
                                           
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button id="btnGuardarValoruni" type="button" class="btn btn-primary">Guardar</button> 
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection

@push('scripts')

<script>
    //**************funcion para cargar lista de  los valores escasos***************/
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
                                                <p class="mb-0" style="font-weight: bold;">${valor.nombre} </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center mt-3">
                                                <img src="{{asset('assets/images/gallery/documents.png')}}" width="150" alt="">
                                            </div>
                                            <div class="mt-4 text-center">
                                                <p class="mb-0" style="color: red; font-size: 1.2rem; font-weight: bold;"">${valor.cantidad} unidades</p>
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
                                                        data-correlativo-final="${valor.correlativo_final}"
                                                        data-id_concepto_valor="${valor.id_concepto_valor}"
                                                        data-precio_unitario="${valor.precio_unitario}"
                                                        data-costo="${valor.costo}">
                                                        
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
                                                <img src="{{asset('assets/images/gallery/documents.png')}}" width="150" alt="">
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
                                                        data-correlativo-final="${valor.correlativo_final}"
                                                        data-id_concepto_valor="${valor.id_concepto_valor}"
                                                        data-precio_unitario="${valor.precio_unitario}"
                                                        data-costo="${valor.costo}">
                                                        
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
    $(document).ready(function () {
    // ****** ABRIMOS EL MODAL PASANDO LOS DATOS NECESARIOS ******
    $('#ingresarValorModal').on('shown.bs.modal', function (e) {
        var button = $(e.relatedTarget); 
        var id = button.data('id');
        var nombre = button.data('nombre');
        var cantidad = button.data('cantidad');
        var fecha = button.data('fecha');
        var correlativoInicial = button.data('correlativo-inicial');
        var correlativoFinal = button.data('correlativo-final');
        var idconceptovalor = button.data('id_concepto_valor');
        var precio = parseFloat(button.data('precio_unitario')) || 0; 
        var costo = parseFloat(button.data('costo')) || 0;

        $('#ingresarValorModal .modal-title').text(`Registrar nuevo ingreso de ${nombre}`);
        $('#id_concepto_valor').val(idconceptovalor);
        $('#montototal').val(precio.toFixed(2)); 
        $('#precio_unitario').val(precio.toFixed(2)); 
        $('#costo').val(costo.toFixed(2));
        $('#cantidad').val(cantidad);
        
        var nuevoCorrelativoInicial = correlativoFinal === 0 ? 1 : correlativoFinal + 1;
        $('#correlativo_inicial').val(nuevoCorrelativoInicial);

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
            <tr>
                <td>Precio</td>
                <td>${precio.toFixed(2)}</td>
            </tr>
        `);
        calcularCostoNuevo();
    });

    // ****** CALCULAR MONTO TOTAL Y ACTUALIZAR CANTIDAD NUEVO CUANDO SE INGRESA CANTIDAD ******
    $('#cantidad_valor').on('input', function () {
        var cantidad = $(this).val().trim(); 
        var cantidadOriginal = parseFloat($('#cantidad').val()) || 0;  
        
        if (cantidad === "" || isNaN(cantidad) || parseFloat(cantidad) <= 0) {
            $('#montototal').val($('#precio_unitario').val());
            $('#cantidadnuevo').val(cantidadOriginal);  
            calcularCostoNuevo(); 
            return;
        }

        var cantidadNum = parseFloat(cantidad) || 0; 
        var precioUnitario = parseFloat($('#precio_unitario').val()) || 0; 
        var total = cantidadNum * precioUnitario; 
        $('#montototal').val(total.toFixed(2));

        // Calcular la cantidad nueva acumulada
        var cantidadNueva = cantidadNum + cantidadOriginal;
        $('#cantidadnuevo').val(cantidadNueva);

        calcularCostoNuevo();
    });

    // ****** FUNCIÓN PARA CALCULAR COSTO NUEVO ******
    function calcularCostoNuevo() {
        var costo = parseFloat($('#costo').val()) || 0;
        var montototal = parseFloat($('#montototal').val()) || 0;
        var costonuevo = costo + montototal; 

        $('#costonuevo').val(costonuevo.toFixed(2));
    }
});


//********************Script botón guardar valor universitario********************************
document.addEventListener('DOMContentLoaded', function () {
  console.log("El documento ha sido cargado");
  
  const btnGuardarValoruni = document.getElementById('btnGuardarValoruni');
  console.log(btnGuardarValoruni); // Verifica si el botón está correctamente seleccionado.

  btnGuardarValoruni.addEventListener('click', function () {
      console.log("Botón de guardar clickeado");
      const id_adquisicion = document.getElementById('id_adquisicion').value;
      const id_concepto_valor = document.getElementById('id_concepto_valor').value;
      const cantidad_v = document.getElementById('cantidad_valor').value;
      const correlativo_ini = document.getElementById('correlativo_inicial').value;
      const correlativo_fin = document.getElementById('correlativo_final').value;
      const serie_val = document.getElementById('serie_valor').value;
      const monto_val = document.getElementById('montototal').value;
      const costonuevo = document.getElementById('costonuevo').value;
      const cantidadnuevo = document.getElementById('cantidadnuevo').value;

      console.log(id_adquisicion, cantidad_v, correlativo_ini, correlativo_fin, serie_val, monto_val, id_concepto_valor,costonuevo,cantidadnuevo); 

      if (!id_adquisicion || !cantidad_v || !correlativo_ini || !correlativo_fin || !serie_val || !monto_val || !id_concepto_valor || !costonuevo || !cantidadnuevo) {
          Swal.fire({
              title: "Error",
              text: "Todos los campos son obligatorios.",
              icon: "error",
              confirmButtonText: "OK"
          });
          return;
      }
      
      fetch('/guardar_adqui_detalle', {
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
              id_adqui: id_adquisicion,
              cantidad: cantidad_v,
              correlativo_ini: correlativo_ini,
              correlativo_final: correlativo_fin,
              serie: serie_val,
              monto: monto_val,
              id_concepto_valor: id_concepto_valor,
              costonuevo: costonuevo, 
              cantidadnuevo: cantidadnuevo 
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


/*function getCorrelativoInicial() {
    var conceptoId = document.getElementById('id_concepto_valor').value;
    if (!conceptoId) return;

    $.ajax({
        url: '/obtener-correlativo/' + conceptoId, 
        method: 'GET',
        success: function(response) {   
            document.getElementById('correlativo_inicial').value = response.correlativo_inicial;
            document.getElementById('correlativo_final').value = response.correlativo_inicial;
        },
        error: function(error) {
            console.error('Error al obtener correlativo inicial', error);
        }
    });
}
function getCosto() {
    var conceptoId = document.getElementById('id_concepto_valor').value;
    if (!conceptoId) return;

    $.ajax({
        url: '/obtener-costo/' + conceptoId, 
        method: 'GET',
        success: function(response) {
            // Asignar el correlativo_inicial al input
            document.getElementById('costo').value = response.costo;
            // Inicializamos correlativo_final con el mismo valor de correlativo_inicial
            document.getElementById('costo').value = response.costo;
        },
        error: function(error) {
            console.error('Error al obtener costo', error);
        }
    });
}*/

// Cambiar el valor de correlativo_final cuando se ingresa la cantidad
document.getElementById('cantidad_valor').addEventListener('input', function() {
    var cantidad = parseInt(document.getElementById('cantidad_valor').value) || 0;
    var correlativoInicial = parseInt(document.getElementById('correlativo_inicial').value) || 0;
    var nuevoCorrelativo = correlativoInicial + cantidad - 1;

    // Actualizamos solo el correlativo_final
    document.getElementById('correlativo_final').value = nuevoCorrelativo;
});


</script>

   
@endpush
