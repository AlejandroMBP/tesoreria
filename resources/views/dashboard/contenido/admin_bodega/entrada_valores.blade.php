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
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Entrada de valores</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col-xxl-8 d-flex align-items-stretch">
                    <div class="card w-100 overflow-hidden rounded-4">
                        <div class="card-body position-relative p-4">
                            <div class="row">
                                <div class="col-12 col-sm-7">
                                    <div class="d-flex align-items-center gap-3 mb-5">
                                        <img src="https://placehold.co/110x110/png" class="rounded-circle bg-grd-info p-1"
                                            width="60" height="60" alt="user">
                                        <div>
                                            <p class="mb-0 fw-semibold">Bienvenido/a</p>
                                            <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-5">
                                        <div>
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">65.4K<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Valores escasos</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-danger" role="progressbar"
                                                    style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="vr"></div>
                                        <div>
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">78.4<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Valores suficientes</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-success" role="progressbar"
                                                    style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="welcome-back-img pt-4">
                                        <img src="assets/images/gallery/image_bodega2.jpg" height="266" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ***Pestañas para usuarios activos e inactivos ***-->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0 text-uppercase">Administración de valores universitarios</h6>
                <div class="d-flex align-items-center">
                    <button class="btn btn-inverse-success px-5" data-bs-toggle="modal" data-bs-target="#crearAdquiModal"><i class="bi bi-plus-square"> </i>Crear nuevo usuario</button>       
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-success" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="pill" href="#tabEntLista" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class="bi bi-person me-1 fs-6"></i></div>
                                    <div class="tab-title">Lista de adquisiciones</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- **** Contenido de las pestañas **** -->
                    <div class="tab-pane fade show active" id="tabEntLista" role="tabpanel">
                        <div class="table-responsive">
                            <table id="tablaListaAdquisiciones" class="table table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha adquisición</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lista_adquisiciones as $adquisiciones)
                                        <tr>
                                            <td>{{ $adquisiciones->id }}</td>
                                            <td>{{ $adquisiciones->fecha_adquisicion }}</td>
                                            <td>
                                                <button class="btnEliminar btn btn-danger btn-sm">Eliminar</button>
                                                
                                                <a href="{{ route('registrar_entrada', [$adquisiciones->id]) }}"
                                                    class="btn btn-sm d-inline-flex align-items-center justify-content-center"
                                                    style="background-color: #95C11E; color: #080C29; border-color: #95C11E; gap: 5px; text-decoration: none;">
                                                        Realizar registro
                                                </a>
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
    </main>
    <div class="overlay btn-toggle"></div>
@endsection

<!-- Modal -->
<div class="modal fade" id="crearAdquiModal" tabindex="-1" aria-labelledby="crearAdquiModalLabel" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 bg-primary py-2">
                <h5 class="modal-title text-white">Crear nueva adqusición</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="order-summary">
                    <div class="card mb-0">
                        <div class="card-body">
                            <form id="form_guardar_adquisicion">
                                <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="fecha" class="form-label">Fecha adquisición</label>
                                    <input type="date" class="form-control" id="fecha" readonly>
                                </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button id="btnGuardarAdquisicion" type="button" class="btn btn-primary">Guardar</button> 
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
//**************SCRIPT PARA OBTENER LA FECHA DE HOY ********************************* */
document.addEventListener("DOMContentLoaded", function () {
        let fechaInput = document.getElementById("fecha");
        let hoy = new Date().toISOString().split('T')[0]; 
        fechaInput.value = hoy;
    });
     //********************Script tabla lista adquisiones********************************
     $(document).ready(function() {
            $('#tablaListaAdquisiciones').DataTable({
                responsive: true,
                paging: true,  
                searching: true,  
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
    //********************Script guardar adquisiones********************************
    document.addEventListener('DOMContentLoaded', function () {
  
  const btnGuardarAdquisicion = document.getElementById('btnGuardarAdquisicion');

  btnGuardarAdquisicion.addEventListener('click', function () {
      const fecha = document.getElementById('fecha').value;
      
      if (!fecha) {
          Swal.fire({
              title: "Error",
              text: "Todos los campos son obligatorios.",
              icon: "error",
              confirmButtonText: "OK"
          });
          return;
      }
      fetch('/guardar_adquisicion', {  
          method: 'POST',
          headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
          },
          body: JSON.stringify({
              fecha: fecha,
             
          })
      })
      .then(response => response.json())
      .then(data => {
          if (data.success) {
              Swal.fire({
                  title: "Éxito",
                  text: "La adquisición se ha creado correctamente.",
                  icon: "success",
                  confirmButtonText: "OK"
              }).then(() => {
                  location.reload(); 
              });
          } else {
              Swal.fire({
                  title: "Error",
                  text: "Hubo un error al crear la adquisición.",
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
