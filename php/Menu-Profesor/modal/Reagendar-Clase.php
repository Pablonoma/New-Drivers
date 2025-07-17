<!-- ventana para AddUser--->
<div class="modal fade" id="cancelarClaseTeoricaReagendar<?php echo $id_clase; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    Indique la fecha y hora para reagendar la clase teórica.
                </h5>
            </div>
            <div class="editar p-4">
                <form class="formulario" method="POST">
                    <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>">
                    <div class="form-group" style="margin-top:5px;">
                        <label for="detalle">Motivo</label>
                        <textarea class="form-control mb-2" id="motivo" readonly name="motivo" style="color: #000000;" rows="3"><?php echo $motivo; ?></textarea>
                    </div>

                    <div class="form-group" style="margin-top:5px;">
                        <div class="row">
                            <div class="col">
                                <label for="fechaHora">Fecha de inicio</label>
                                <input type="datetime-local" class="form-control" name="comienzo" style="color: #000000;" id="comienzo" placeholder="Ingrese la fecha y hora de inicio de la clase">
                            </div>
                            <div class="col">
                                <label for="duracion">Fecha de termino</label>
                                <input type="datetime-local" class="form-control mb-3"  name="termino" style="color: #000000;" id="termino" placeholder="Ingrese la duración">
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="reagendarTeorica" class="btn btn-warning w-75">Reagendar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarRea">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- ventana para AddUser--->
<div class="modal fade" id="cancelarClasePracticaReagendar<?php echo $id_clase; ?>" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    Indique la fecha y hora para reagendar la clase práctica.
                </h5>
            </div>
            <div class="editar p-4">
                <form class="formulario" method="POST">
                    <input type="hidden" name="id_clase" value="<?php echo $id_clase; ?>">
                    <div class="form-group" style="margin-top:5px;">
                        <label for="detalle">Motivo</label>
                        <textarea class="form-control mb-2" id="motivo" readonly name="motivo" style="color: #000000;" rows="3"><?php echo $motivo; ?></textarea>
                    </div>

                    <div class="form-group" style="margin-top:5px;">
                        <div class="row">
                            <div class="col">
                                <label for="fechaHora">Fecha de inicio</label>
                                <input type="datetime-local" class="form-control" name="comienzo" style="color: #000000;" id="comienzo" placeholder="Ingrese la fecha y hora de inicio de la clase">
                            </div>
                            <div class="col">
                                <label for="duracion">Fecha de termino</label>
                                <input type="datetime-local" class="form-control mb-3"  name="termino" style="color: #000000;" id="termino" placeholder="Ingrese la duración">
                            </div>
                        </div>
                    </div>

                    <button type="submit" name="reagendarPractica" class="btn btn-warning w-75">Reagendar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarRea">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#cerrarRea, #cerrarReaP, #cerrarCancel, #cerrarFin').click(function() {
            $('#cancelarClasePracticaReagendar<?php echo $id_clase; ?>, #cancelarClaseTeoricaReagendar<?php echo $id_clase; ?>, #cancelarClase<?php echo $id_clase; ?>, #finalizarClase<?php echo $id_clase; ?>').modal('hide');
        });
    });
</script>