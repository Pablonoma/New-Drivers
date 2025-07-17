<!--ventana para AddUser--->
<div class="modal fade" id="cancelarClase<?php echo $id_clase; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    ¿Por qué desea cancelar la clase?
                </h5>
            </div>
            <div class="editar p-4">
                <form class="formulario" method="POST">
                    <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>">
                    <input type="hidden" name="comienzo" value="<?php echo $usuario['horario_comienzo_clase']?>">
                    <div class="form-group" style="margin-top:5px;">
                        <label for="detalle">Motivo</label>
                        <textarea class="form-control mb-2" id="motivo" name="motivo" style="color: #000000;" rows="3" placeholder="Escriba su motivo para cancelar la clase"></textarea>
                    </div>

                    <button type="submit" name="cancelar" class="btn btn-warning w-75">Cancelar Clase</button>
                    <button type="button" class="btn btn-secondary"  data-dismiss="modal" id="cerrarCancel">Cerrar</button>

                </form>
            </div>

        </div>
    </div>
</div>


<!--ventana para AddUser--->
<div class="modal fade" id="cancelarClasereagendar<?php echo $id_clase; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    ¿Por qué desea cancelar y Reagendar la clase?
                </h5>
            </div>
            <div class="editar p-4">
                <form class="formulario" method="POST">
                    <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>">
                    <input type="hidden" name="comienzo" value="<?php echo $usuario['horario_comienzo_clase']?>">
                    <div class="form-group" style="margin-top:5px;">
                        <label for="detalle">Motivo</label>
                        <textarea class="form-control mb-2" id="motivo" name="motivo" style="color: #000000;" rows="3" placeholder="Explique el motivo por el que desea cancelar la clase"></textarea>
                    </div>

                    <div class="form-group" style="margin-top:5px;">
                        <div class="row">
                            <div class="col">
                                <label for="fechaHora">Fecha de inicio</label>
                                <input type="datetime-local" class="form-control" name="comienzo" style="color: #000000;" id="comienzo" placeholder="Ingrese la fecha y hora de inicio de la clase">
                            </div>
                            <div class="col">
                                <label for="duracion">Fecha de termino</label>
                                <input type="datetime-local" class="form-control mb-3" name="termino" style="color: #000000;" id="termino" placeholder="Ingrese la duración">
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="reagendar" class="btn btn-warning w-75">Cancelar Clase</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarRea">Cerrar</button>
                </form>
            </div>

        </div>
    </div>
</div>

<!--ventana para AddUser--->
<div class="modal fade" id="finalizarClase<?php echo $id_clase; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    ¿Que observaciones tiene sobre la clase?
                </h5>
            </div>
            <div class="editar p-4">
                <form class="formulario" method="POST">
                    <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>">
                    <div class="form-group" style="margin-top:5px;">
                        <label for="detalle">Observaciones</label>
                        <textarea class="form-control mb-2" id="observacion" name="observacion" style="color: #000000;" rows="3" placeholder="Ingresa tus observaciones"></textarea>
                    </div>

                    <button type="submit" name="finalizar" class="btn btn-warning w-75">Finalizar Clase</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarFin">Cerrar</button>
                </form>
            </div>

        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cerrarRea, #cerrarReaP, #cerrarCancel, #cerrarFin').click(function() {
            $('#cancelarClasereagendar<?php echo $id_clase; ?>, #cancelarClasereagendarPractica<?php echo $id_clase; ?>, #cancelarClase<?php echo $id_clase; ?>, #finalizarClase<?php echo $id_clase; ?>').modal('hide');
        });
    });
</script>

