<!--ventana para AddUser--->
<div class="modal fade" id="addUser" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #198754 !important; border-color: #198754;">
                <h5 class="modal-title" style="color: #fff; text-align: center; font-size: 20px;">
                    Añadir Usuario
                </h5>
            </div>
            <form class="formulario p-4" id="formulario" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label font-weight-bold">Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control bg-dark-x border-2" placeholder="Ingresa tu Nombre y Apellido" aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label font-weight-bold">Número de teléfono</label>
                    <input type="number" name="numero" class="form-control bg-dark-x border-2 mb-2" placeholder="Ingresa tu Número de telefono" required oninput="if(this.value.length > 9) this.value = this.value.slice(0,9);">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label font-weight-bold">Fecha de nacimiento</label>
                    <input type="date" name="fechaN" class="form-control bg-dark-x border-2 mb-2" placeholder="Ingresa tu Fecha de nacimiento" required>
                </div>

                <div class="mb-3">
                    <label for="ubicacion" class="form-label font-weight-bold">Ubicación</label>
                    <input type="text" name="ubicacion" class="form-control bg-dark-x border-2" placeholder="Ingresa tu ubicacion" aria-describedby="emailHelp" required>
                </div>

                <!-- Correo electronico Dinamico -->
                <div class="formulario__grupo mb-3" id="grupo__correo">
                    <label for="correo" class="form-label font-weight-bold">Correo electrónico</label>
                    <div class="formulario__grupo-input">
                        <input type="email" name="correo" class="formulario__input form-control bg-dark-x border-2 mb-2" placeholder="Ingresa tu Correo electronico" required>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">El correo electrónico solo puede contener letras, números, puntos, guiones y guiones bajos.</p>
                </div>

                <!-- Contraseña Dinamica -->
                <div class="formulario__grupo mb-3" id="grupo__password">
                    <label for="password" class="form-label font-weight-bold">Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input type="password" name="password" class="formulario__input form-control bg-dark-x border-1 mb-2" placeholder="Ingresa tu contraseña" id="password" required>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">La contraseña debe tener al menos 4 caracteres.</p>
                </div>

                <div class="formulario__grupo mb-3" id="grupo__password2">
                    <label for="password2" class="form-label font-weight-bold">Confirmar Contraseña</label>
                    <div class="formulario__grupo-input">
                        <input type="password" name="password2" class="formulario__input form-control bg-dark-x border-1 mb-2" placeholder="Ingresa tu contraseña" id="password2" required>
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Por favor, asegúrate de que las contraseñas sean idénticas.</p>
                </div>
                <button type="submit" name="registrar" class="btn btn-success w-100">Agregar Nuevo Usuario</button>
            </form>

        </div>
    </div>
</div>