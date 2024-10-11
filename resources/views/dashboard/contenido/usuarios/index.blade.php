@extends('dashboard.app')

@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Usuarios</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Activos</li>
                        </ol>
                    </nav>
                </div>

                <div class="ms-auto">
                    <button type="button" class="btn btn-grd btn-grd-branding px-5" onclick="openCreateModal()">Crear
                        Usuarios</button>
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
                                        <div class="">
                                            <p class="mb-0 fw-semibold">Bienvenido</p>
                                            <h4 class="fw-semibold mb-0 fs-4 mb-0">{{ Auth::user()->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center gap-5">
                                        <div class="">
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">{{ $usActivos }}<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Usuarios Activos</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-success" role="progressbar"
                                                    style="width: {{ ($usActivos / ($usActivos + $usInactivos)) * 100 }}%"
                                                    aria-valuenow="{{ ($usActivos / ($usActivos + $usInactivos)) * 100 }}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <div class="vr"></div>
                                        <div class="">
                                            <h4 class="mb-1 fw-semibold d-flex align-content-center">{{ $usInactivos }}<i
                                                    class="ti ti-arrow-up-right fs-5 lh-base text-success"></i>
                                            </h4>
                                            <p class="mb-3">Ausuarios inactivos</p>
                                            <div class="progress mb-0" style="height:5px;">
                                                <div class="progress-bar bg-grd-danger" role="progressbar"
                                                    style="width: {{ ($usInactivos / ($usActivos + $usInactivos)) * 100 }}%"
                                                    aria-valuenow="{{ ($usInactivos / ($usActivos + $usInactivos)) * 100 }}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-5">
                                    <div class="welcome-back-img pt-4">
                                        <img src="assets/images/gallery/welcome-back-3.png" height="180" alt="">
                                    </div>
                                </div>
                            </div><!--end row-->
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="activos-tab" data-bs-toggle="tab" data-bs-target="#activos"
                            type="button" role="tab" aria-controls="activos" aria-selected="true">Usuarios
                            Activos</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="inactivos-tab" data-bs-toggle="tab" data-bs-target="#inactivos"
                            type="button" role="tab" aria-controls="inactivos" aria-selected="false">Usuarios
                            Inactivos</button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="myTabContent">
                    <!-- Usuarios Activos -->
                    <div class="tab-pane fade show active" id="activos" role="tabpanel" aria-labelledby="activos-tab">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">Usuarios Activos</h6>
                                <hr>
                                <table class="table mb-0 table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Nombre de usuario</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuariosActivos as $us)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $us->name }}</td>
                                                <td class="align-middle">{{ $us->username }}</td>
                                                <td class="align-middle">{{ $us->email }}</td>
                                                <td class="align-middle">{{ $us->getRoleNames()->implode(',') }}</td>
                                                <td class="align-middle">{{ $us->estado == 1 ? 'Activo' : 'Inactivo' }}
                                                </td>
                                                <td class="align-middle">

                                                    <button type="button"
                                                        class="btn btn-warning btn-circle rounded-circle"
                                                        onclick="openEditModal({{ $us->id }}, '{{ addslashes($us->name) }}','{{ $us->username }}', '{{ $us->email }}')">
                                                        <i class="material-icons-outlined">edit</i>
                                                    </button>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('usuario.cambioEstado', $us->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-circle raised rounded-circle">
                                                            <i class="material-icons-outlined">delete</i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Usuarios Inactivos -->
                    <div class="tab-pane fade" id="inactivos" role="tabpanel" aria-labelledby="inactivos-tab">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">Usuarios Inactivos</h6>
                                <hr>
                                <table class="table mb-0 table-dark table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Nombre usuario</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Rol</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Editar</th>
                                            <th scope="col">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuariosInactivos as $us)
                                            <tr>
                                                <td class="align-middle">{{ $loop->iteration }}</td>
                                                <td class="align-middle">{{ $us->name }}</td>
                                                <td class="align-middle">{{ $us->username }}</td>
                                                <td class="align-middle">{{ $us->email }}</td>
                                                <td class="align-middle">{{ $us->getRoleNames()->implode(',') }}</td>
                                                <td class="align-middle">{{ $us->estado == 1 ? 'Activo' : 'Inactivo' }}
                                                </td>
                                                <td class="align-middle">
                                                    <button type="button"
                                                        class="btn btn-warning btn-circle rounded-circle"
                                                        onclick="openEditModal({{ $us->id }}, '{{ addslashes($us->name) }}','{{ $us->username }}','{{ $us->email }}')">
                                                        <i class="material-icons-outlined">edit</i>
                                                    </button>
                                                </td>
                                                <td class="align-middle">
                                                    <form action="{{ route('usuario.cambioEstado', $us->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-danger btn-circle raised rounded-circle">
                                                            <i class="material-icons-outlined">delete</i>
                                                        </button>
                                                    </form>
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
    @include('dashboard.contenido.usuarios.crear')
    @include('dashboard.contenido.usuarios.edit')
@endsection
@push('scripts')
    <script>
        function openEditModal(id, name, username, email, role) {

            // Nota. Asignamos los campos del formulario del modal
            document.getElementById('userId').value = id;
            document.getElementById('name').value = name;
            document.getElementById('username').value = username;
            document.getElementById('userEmail').value = email;

            //estamos asignando el rol al usuario ya creado
            document.getElementById('userRole').value = role;

            // Actualizamos mediante la ruta update
            var form = document.getElementById('editUserForm');
            form.action = '{{ route('usuario.update', ':id') }}'.replace(':id', id);

            // Mostramos el modal
            var editModal = new bootstrap.Modal(document.getElementById('editUserModal'));
            editModal.show();
        }

        function openCreateModal() {

            var createModal = new bootstrap.Modal(document.getElementById('createUserModal'));
            createModal.show();
        }
    </script>
@endpush
