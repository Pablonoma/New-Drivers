<!--ventana para AddUser--->

<style>

.rating {
    display: flex;
    justify-content: space-between;
}

.card-text {
    text-align: justify;
}

.star {
    font-size: 32px;
    color: #ddd;
    transition: color 0.3s;
    cursor: pointer;
}

.star:hover,
.star.checked {
    color: gold;
}
</style>

<div class="modal fade" id="addcalificate<?php echo $id_solicitud; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #FDD45B !important; border-color: #0d6efd;">
        <h5 class="modal-title" style="color: #16191c; text-align: center; font-size: 28px;">
          Solicita una clase extra
        </h5>
      </div>
      <form method="POST" action="">
        <input type="hidden" name="id_profe" value="<?php echo $usuario['id_profesor']; ?>">

        <div class="modal-body d-flex flex-column align-items-center justify-content-center" id="cont_modal">
          <div class="form-group text-center">
            <div class="profesor-calificar d-flex flex-column align-items-center">
              <img style="width: 100px;height: 100px;border-radius: 50%;" src="../../Logica/uploads/<?php echo $usuario['imagen_profesor'] ?>" alt="">

              <label for="recipient-name" class="col-form-label fs-3"><?php echo $usuario['nombre_profesor']; ?></label>
            </div>

            <label for="recipient-name" class="col-form-label fs-6"><b>Agrega alguna observación para determinar el proposito de tu clase extra.</b></label>
            <textarea class="form-control" name="observacion" aria-label="With textarea"></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" name="solicitar" class="btn btn-warning">Solicitar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!---fin ventana Update --->