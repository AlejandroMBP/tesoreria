@extends('dashboard.app')

@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Gestión de Roles</h6>
            <hr>
            <button class="btn btn-grd btn-grd-branding px-5" onclick="openCreateModal()">
                Crear nuevo rol
            </button>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre del Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                {{-- <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">Editar</a> --}}
                                <button class="btn btn-warning"
                                    onclick="openEditModal({{ $role->id }}, '{{ $role->name }}', '{{ json_encode($role->permissions->pluck('id')) }}')">Editar</button>
                                <form id="deleteRoleForm{{ $role->id }}"
                                    action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger"
                                        onclick="confirmDelete({{ $role->id }})">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    @include('roles.pruebam')
    @include('roles.edit')
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function openCreateModal() {
            var createRolModal = new bootstrap.Modal(document.getElementById('createRolModal'));
            createRolModal.show();
        }


        function openEditModal(id, name, permissions) {

            document.getElementById('rolId').value = id;
            document.getElementById('rolName').value = name;

            //console.log(permissions);

            let checkboxes = document.querySelectorAll('input[type="checkbox"][name="permissions[]"]');

            checkboxes.forEach(function(checkbox) {
                // Obtener el ID del permiso desde el valor del checkbox
                let permissionId = parseInt(checkbox.id.replace('switch',
                    ''));

                if (permissions.includes(permissionId)) {
                    checkbox.checked = true; // Marcamos el checkbox
                } else {
                    checkbox.checked = false; // Desmarcamos el checkbox
                }
            });

            console.log(id); // Verifica que el ID sea correcto

            let form = document.getElementById('editRolForm');
            form.action = '{{ route('roles.update', ':id') }}'.replace(':id', id);

            var editModal = new bootstrap.Modal(document.getElementById('editRolModal'));
            editModal.show();
        }
        //uso de libreria sweetalert2

        function confirmDelete(roleId) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: "No podrás recuperar este rol después de eliminarlo.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si el usuario confirma, envía el formulario
                    document.getElementById('deleteRoleForm' + roleId).submit();
                }
            });
        }
    </script>
@endpush
