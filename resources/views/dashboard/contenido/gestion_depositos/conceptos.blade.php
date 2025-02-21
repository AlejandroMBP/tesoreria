@extends('dashboard.app')
@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestión de depósitos</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Conceptos</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
                
            <!-- Boton Crear nuevo Usuario -->
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearConceptoModal">Crear nuevo</button>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-success" role="tablist">
                        <li class="nav-item" role="presentatio n">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabConceptosactivos" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-house-door me-1 fs-6"></i></div>
                                    <div class="tab-title">Conceptos activos</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="pill" href="#tabConceptosinactivos" role='tab' aria-selected='false' tabindex='-1'>
                                <div class='d-flex align-items-center'>
                                    <div class='tab-icon'><i class='bi bi-person me-1 fs-6'></i></div>
                                    <div class='tab-title'>Conceptos inactivos</div>
                                </div>
                            </a>
                        </li>
                    
                        <!--********************** Modal para crear un concepto*****************************-->
                    <div class="modal fade" id="crearConceptoModal" tabindex="-1" aria-labelledby="crearConceptoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" style="max-width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-primary py-2">
                                    <h5 class="modal-title">Crear nuevo concepto</h5>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="order-summary">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                                <form id="form_guardar_concepto">
                                                    <div class="row g-3">
                                                        <div class="col-12 col-md-6">
                                                            <label for="nombre_valor" class="form-label">Tipo de documento:</label>
                                                            <input type="text" class="form-control" id="nombre_valor" placeholder="Ingrese el tipo de documento">
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="preciounitario" class="form-label">Precio unitario:</label>
                                                            <input type="number" class="form-control" id="preciounitario" placeholder="Ingrese el precio unitario">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button id="btnGuardarConcepto" type="button" class="btn btn-primary">Guardar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                     <!--********************** Modal para editar un concepto *****************************-->
                     <div class="modal fade" id="editarConceptoModal" tabindex="-1" aria-labelledby="editarConceptoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" style="max-width: 80%;">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0 bg-primary py-2">
                                    <h5 class="modal-title">Editar concepto</h5>
                                    <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                                        <i class="material-icons-outlined">close</i>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <div class="order-summary">
                                        <div class="card mb-0">
                                            <div class="card-body">
                                            <form id="form_editar_concepto">
                                            <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <label for="tipoconcepto" class="form-label">Tipo de concepto (Nombre):</label>
                                                        <input type="text" class="form-control" id="tipoconcepto" placeholder="Ingrese el tipo de documento">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="montominimo" class="form-label">Monto mínimo</label>
                                                        <input type="text" class="form-control" id="montominimo" placeholder="Ingrese el precio (monto minimo)">
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <label for="montominimo" class="form-label">Unidad involucrada</label>
                                                        <input type="text" class="form-control" id="montominimo" placeholder="Ingrese el precio (monto minimo)">
                                                    </div>
                                                    
                                                    <div class="col-12 col-md-6">
                                                        <label for="involucrados" class="form-label">Involucrados</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text"><i class="material-icons-outlined fs-5">description</i></span>
                                                            <select class="form-select" id="involucrados">
                                                                <option selected="">Selecciona el tipo de documento</option>
                                                                <option value="1">Nacionales</option>
                                                                <option value="2">Extranjeros</option>
                                                                <option value="3">Ambos</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                    <button id="btnEditarConcepto" type="button" class="btn btn-primary">Guardar</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                    </ul>
                    <!--Pestaña de Proveedor activo-->
                    <div class='tab-content' id='espacioactivo'>
                        
                        <div class='tab-pane fade show active' id='tabConceptosactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaConceptosActivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Unidad involucrada</th>
                                            <th>Tipo de concepto</th>
                                            <th>Concepto</th>
                                            <th>Tipo (nacional/extranjero)</th>
                                            <th>Costo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($conceptos_activos as $concepto)
                                        <tr>
                                            <td>{{ $concepto->id }}</td>
                                            <td>{{ $concepto->unidadMovimiento_id }}</td>
                                            <td>{{ $concepto->id_tipo }}</td>
                                            <td>{{ $concepto->concepto }}</td>
                                            <td>{{ $concepto->tipoNacionalidad }}</td>
                                            <td>{{ $concepto->montoMinimo}}</td>
                                            <td><button class="btnActivoConcepto btn btn-success btn-sm" data-id="{{ $concepto->id }}">Activo</button></td>
                                            <td>
                                            <button class="btn btn-warning btn-sm btnEditarConcepto" data-id="{{ $concepto->id }}" data-bs-toggle="modal" data-bs-target="#editarValoruniModal">
                                                Editar
                                            </button>
                                                <button class="btnEliminarConcepto btn btn-danger btn-sm" data-id="{{ $concepto->id }}">Eliminar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--Pestaña de Usuario inactivo -->
                    <div class='tab-content' id='espacioinactivo'>   
                        <div class='tab-pane fade show' id='tabConceptosinactivos' role='tabpanel'>
                            <div class="table-responsive">
                                <table id="tablaConceptosInactivos" class="table table-bordered dt-responsive nowrap">
                                    <thead>
                                    <tr>
                                            <th>#</th>
                                            <th>Unidad involucrada</th>
                                            <th>Tipo de concepto</th>
                                            <th>Concepto</th>
                                            <th>Tipo (nacional/extranjero)</th>
                                            <th>Costo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                        <tbody>
                                        @foreach($conceptos_inactivos as $concepto)
                                            <tr>
                                                <td>{{ $concepto->id }}</td>
                                                <td>{{ $concepto->unidadMovimiento_id }}</td>
                                                <td>{{ $concepto->id_tipo }}</td>
                                                <td>{{ $concepto->concepto }}</td>
                                                <td>{{ $concepto->tipoNacionalidad }}</td>
                                                <td>{{ $concepto->montoMinimo}}</td>
                                                <td><button class="btnInactivoConcepto btn btn-danger btn-sm" data-id="{{ $concepto->id }}">Inactivo</button></td>
                                                <td>
                                                <button class="btn btn-warning btn-sm btnEditarConcepto" data-id="{{ $concepto->id }}" data-bs-toggle="modal" data-bs-target="#editarValoruniModal">
                                                    Editar
                                                </button>
                                                    <button class="btnEliminarConcepto btn btn-danger btn-sm" data-id="{{ $concepto->id }}">Eliminar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    $(document).ready(function() {
        $('#tablaConceptosActivos').DataTable({
            responsive: true,
            paging: true,  
            searching: true,  
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });

    $(document).ready(function() {
        $('#tablaConceptosInactivos').DataTable({
            responsive: true,
            paging: true,  
            searching: true,  
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
    const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
       //********************Script botón guardar valor universitario********************************
    document.addEventListener('DOMContentLoaded', function () {
  
  const btnGuardarConcepto = document.getElementById('btnGuardarConcepto');

  btnGuardarConcepto.addEventListener('click', function () {
      const nombre = document.getElementById('nombre_valor').value;
      const preciounitario = document.getElementById('preciounitario').value;
      if (!nombre || !preciounitario) {
          Swal.fire({
              title: "Error",
              text: "Todos los campos son obligatorios.",
              icon: "error",
              confirmButtonText: "OK"
          });
          return;
      }
      fetch('/guardarConcepto', {  
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
              nombre: nombre,
              precio_unitario: preciounitario
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

        //********************Script botón editar concepto********************************
    document.getElementById("btnEditarConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de editar el Concepto?",
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
                        title: "Guardado",
                        text: "Se ha modificado exitosamente",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("form_editar_concepto").submit();
                        setTimeout(() => {
                        location.reload();  
                        }, 1000); 
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha modificado el Concepto",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón eliminar concepto********************************
        document.getElementById("btnEliminarConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de eliminar el Concepto?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar!",
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
                        title: "Guardado",
                        text: "Se eliminó el Concepto correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha eliminado el Concepto correctamente",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón eliminar concepto********************************
        document.getElementById("btnEliminarConcepto2").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de eliminar el Concepto?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar!",
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
                        title: "Guardado",
                        text: "Se eliminó el Concepto correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha eliminado el Concepto correctamente",
                        icon: "error"
                    });
                }
            });
        });
        //********************Script botón activo a inactivo********************************
        document.addEventListener('DOMContentLoaded', function() {
            const btnActivosVal = document.querySelectorAll('.btnActivoConcepto');
            
            btnActivosConcepto.forEach(function(btnActivoConcepto) {
                btnActivoConcepto.addEventListener('click', function (e) {
                    e.preventDefault();
                    const userId = this.getAttribute('data-id');
                    swalWithBootstrapButtons.fire({
                        title: "¿Estás seguro de inactivar el Concepto?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí, inactivar!",
                        cancelButtonText: "No, cancelar!",
                        reverseButtons: true 
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch('/concepto_univ/' + userId + '/inactivarConcepto', {
                                method: 'PUT', 
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                },
                                body: JSON.stringify({ estado: 0 })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    swalWithBootstrapButtons.fire({
                                        title: "Guardado",
                                        text: "El Concepto ha sido desactivado correctamente.",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        location.reload(); 
                                    });
                                } else {
                                    swalWithBootstrapButtons.fire({
                                        title: "Error",
                                        text: "Hubo un error al desactivar el Concepto",
                                        icon: "error"
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                swalWithBootstrapButtons.fire({
                                    title: "Error",
                                    text: "Hubo un error al realizar la acción.",
                                    icon: "error"
                                });
                            });
                        } else if (result.dismiss === Swal.DismissReason.cancel) {
                            swalWithBootstrapButtons.fire({
                                title: "Cancelado",
                                text: "El Concepto no ha sido desactivado.",
                                icon: "error"
                            });
                        }
                    });
                });
            });
        });
        //********************Script botón inactivo a activo********************************
        document.getElementById("btnInactivoConcepto").addEventListener("click", function (e) {
            e.preventDefault();
            swalWithBootstrapButtons.fire({
                title: "¿Estás seguro de activar el Concepto?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, activar!",
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
                        title: "Guardado",
                        text: "El Concepto se ha activo correctamente.",
                        icon: "success",
                        confirmButtonText: "OK"
                    }).then(() => {
                        document.getElementById("formulariosoli").submit();
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelado",
                        text: "No se ha activado el Concepto",
                        icon: "error"
                    });
                }
            });
        });

</script>
@endpush
