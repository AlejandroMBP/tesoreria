@extends('dashboard.app')

@section('contenido')
    <main class="main-wrapper">
        <div class="main-content">
            <h6 class="mb-0 text-uppercase">Crear Nuevo Rol</h6>
            <hr>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre del Rol</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre del rol"
                        required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Permisos</label>
                    <div>
                        @foreach ($permissions as $permission)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                    id="perm{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label"
                                    for="perm{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Crear Rol</button>
            </form>
        </div>
    </main>
@endsection
