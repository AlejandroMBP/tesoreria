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
                            <li class="breadcrumb-item active" aria-current="page">Importar</li>
                        </ol>
                    </nav>
                </div>
                
            </div>
            <!--end breadcrumb-->
            <div class="row">
				<div class="col-xl-9 mx-auto">
					<h6 class="mb-0 text-uppercase">Reportes CSV</h6>
					<hr>
					<div class="card">
						<div class="card-body">
							<input id="fancy-file-upload" type="file" name="files" accept=".jpg, .png, image/jpeg, image/png" multiple="" class="ff_fileupload_hidden">
                            <div class="ff_fileupload_wrap">
                                <div class="ff_fileupload_dropzone_wrap">
                                    <button class="ff_fileupload_dropzone" type="button" aria-label="Browse, drag-and-drop, or paste files to upload">      
                                    </button>
                                    <div class="ff_fileupload_dropzone_tools">       
                                    </div>
                                </div>
                                <table class="ff_fileupload_uploads">
                                </table>
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
@endpush
