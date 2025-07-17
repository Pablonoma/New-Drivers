<!--ventana para AddUser--->
<div class="modal fade" id="editUser<?php echo $usuario['id_user']; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0d6efd !important; border-color: #0d6efd;">
        <h5 class="modal-title" style="color: #fff; text-align: center; font-size: 20px;">
          Editar Usuario
        </h5>
      </div>
      <form method="POST" action="">
        <input type="hidden" name="id_user" value="<?php echo $usuario['id_user']; ?>">

        <div class="modal-body" id="cont_modal">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label ">Modificar nombre:</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $usuario['nombre']; ?>" required="true">

            <label for="recipient-name" class="col-form-label ">Modificar teléfono</label>
            <input type="number" name="telefono" class="form-control" value="<?php echo $usuario['telefono']; ?>" required="true" oninput="if(this.value.length > 9) this.value = this.value.slice(0,9);">

            <label for="recipient-name" class="col-form-label ">Modificar fecha de nacimiento:</label>
            <input type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $usuario['fecha_nacimiento']; ?>" required="true">

            <label for="recipient-name" class="col-form-label ">Modificar ubicación:</label>
            <input type="text" name="ubicacion" class="form-control" value="<?php echo $usuario['ubicacion']; ?>" required="true">

            <label for="recipient-name" class="col-form-label ">Modificar correo eléctronico:</label>
            <input type="email" name="correo" class="form-control" value="<?php echo $usuario['correo']; ?>" required="true">
            
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" name="editar" class="btn btn-success">Guardar Cambios</button>
        </div>
      </form>

    </div>
  </div>

</div>
<!---fin ventana Update --->