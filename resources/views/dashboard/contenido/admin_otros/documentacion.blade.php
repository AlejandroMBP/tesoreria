@extends('dashboard.app')
@section('contenido')
<main class="main-wrapper">
    <div class="main-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Documentación</div>
        </div>
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="assets/images/gallery/manual.jpeg" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Manual de usuario - ADMIN</h5>
                <p class="card-text mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
                <button class="btn btn-grd btn-grd-primary w-100 raised">Ver manual</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="assets/images/gallery/manual.jpeg" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Manual de usuario - Bodega</h5>
                <p class="card-text mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
                <button class="btn btn-grd btn-grd-danger w-100 raised">Ver manual</button>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="assets/images/gallery/manual.png" class="w-100 mb-4 rounded" alt="...">
                <h5 class="card-title mb-4">Manual de usuario - Ventanilla de Valores</h5>
                <p class="card-text mb-4">Many desktop publishing packages and web page editors now use Lorem Ipsum.</p>
                <button class="btn btn-grd btn-grd-warning w-100 raised">Ver manual</button>
              </div>
            </div>
          </div>
        </div>
    </div>
</main>
    @endsection
    @push('scripts')
    <script>
       
</script>
@endpush
    

