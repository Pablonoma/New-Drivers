<!--ventana para AddUser--->
<div class="modal fade" id="rechazarAlumno<?php echo $id_solicitud; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    Indica el motivo por el que rechazaras al alumno
                </h5>
            </div>
            <div class="editar p-4">
                <form class="formulario" method="POST">
                    <input type="hidden" name="id_solicitud" value="<?php echo $id_solicitud; ?>">
                    <label for="exampleInputCombustible" class="form-label font-weight-bold">Respuestas</label>
                    <select class="form-select mb-3" id="select_respuesta" required="true" name="respuesta">
                        <option selected disabled>Seleccionar el motivo</option>

                        <option value="Lamentablemente, no poseo cupos disponible en este momento. Te recomiendo que revises más adelante.">
                            Ya tengo muchos alumnos actualmente</option>
                        <option value="No cumples con los requisitos necesarios, verifica los requisitos y vuelve a enviar la solicitud">
                            No cumples con los requisitos necesarios</option>
                        <option value="Actualmente, no estoy disponible para impartir clases. Te invito a considerar otros instructores disponibles o esperar a que vuelva a estar disponible.">
                            Actualmente no estoy ejerciendo clases</option>
                        <option value="Lamentablemente, las caracteristicas actuales de mi vehiculo no están completamente adaptados para tu discapacidad. Te recomiendo buscar otro instructor">
                            Mi vehiculo no cumple con las caracteristicas para tu discapacidad</option>
                        <option value="No suelo dar clases a personas con tu perfil. Te recomendaría buscar un instructor más adecuado a tus necesidades.">
                            No suelo dar clases a personas con tu perfil.</option>
                    </select>

                    <button type="submit" name="rechazar" class="btn btn-warning w-100">Enviar Respuesta</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!--ventana para AddUser--->
<div class="modal fade" id="rechazarAlumnoExtra<?php echo $id_solicitud; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    Indica el motivo por el que se rechazará la clase extra
                </h5>
            </div>
            <div class="editar p-4">
                <form class="formulario" method="POST">
                    <input type="hidden" name="id_solicitud" value="<?php echo $id_solicitud; ?>">
                    <label for="exampleInputCombustible" class="form-label font-weight-bold">Respuestas</label>
                    <select class="form-select mb-3" id="select_respuesta" required="true" name="respuesta">
                        <option selected disabled>Seleccionar El motivo</option>

                        <option value="Lamentablemente, no poseo cupos disponible en este momento. Te recomiendo que revises más adelante.">
                            Ya tengo muchos alumnos actualmente</option>
                        <option value="Actualmente, no estoy disponible para impartir clases extras. Te invito a considerar otros instructores disponibles o esperar a que vuelva a estar disponible.">
                            Actualmente no estoy ejerciendo clases</option>
                        <option value="Por motivos personales, no podré impartir clases extras en este momento. Te sugiero considerar otras opciones o esperar a que vuelva a estar disponible.">
                            Motivos personales</option>
                        <option value="Actualmente, no tengo el vehículo disponible para impartir clases de conducción. Te recomiendo solicitar en otra ocasión.">
                            Vehículo no disponible</option>
                        <option value="Lamentablemente, he alcanzado el límite de clases que puedo impartir este mes. Te sugiero intentarlo próximamente.">
                            Límite de clases alcanzado</option>

                    </select>

                    <button type="submit" name="rechazar" class="btn btn-warning w-100">Enviar Respuesta</button>
                </form>
            </div>

        </div>
    </div>
</div>