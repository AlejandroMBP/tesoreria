<div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-bottom-0 py-2 bg-grd-info">
                <h5 class="modal-title" id="createUserModalLabel">Crear Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <form id="createUserForm" action="{{ route('usuario.store') }}" method="POST">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="name_create" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name_create" name="name" required>
                        </div>
                        <div class="col-md-12">
                            <label for="username_create" class="form-label">Nombre Usuario</label>
                            <input type="text" class="form-control" id="username_create" name="username" required>
                        </div>
                        <div class="col-md-12">
                            <label for="password_create" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password_create" name="password"
                                    required>
                                <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                    <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="password_confirmation_create" class="form-label">Confirmar Password</label>
                            <input type="password" class="form-control" id="password_confirmation_create"
                                name="password_confirmation" required>
                            <div id="error_message" class="text-danger" style="display: none;">Las contraseñas no son
                                iguales</div>
                        </div>
                        <div class="col-md-12">
                            <label for="userEmail_create" class="form-label">Email</label>
                            <input type="email" class="form-control" id="userEmail_create" name="email" required>
                        </div>
                        <div class="col-md-12">
                            <label for="userRole_create" class="form-label">Rol</label>
                            <select class="form-select" id="userRole_create" name="role" required>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-grd-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-grd-info">Crear Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
/*
esta parte de js se puede agregar a un archivo por el momento lo mantengo para
recordar las funciones
*/
<script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password_create');
    const eyeIcon = document.getElementById('eyeIcon');

    togglePassword.addEventListener('click', () => {
        // cambiamos el imput de password a texto
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);

        // cambiamos el icono del ojo
        eyeIcon.classList.toggle('bi-eye');
        eyeIcon.classList.toggle('bi-eye-slash');
    });

    //escuchamos el evento del boton de submit

    document.getElementById('createUserForm').addEventListener('submit', function(event) {
        const password = document.getElementById('password_create').value;
        const confirmPassword = document.getElementById('password_confirmation_create').value;
        const errorMessage = document.getElementById('error_message');

        // Verifica si las contraseñas son iguales
        if (password !== confirmPassword) {
            event.preventDefault(); // Evita que se envíe el formulario
            errorMessage.style.display = 'block'; // Muestra el mensaje de error
        } else {
            errorMessage.style.display = 'none'; // Oculta el mensaje
        }
    });
</script>
