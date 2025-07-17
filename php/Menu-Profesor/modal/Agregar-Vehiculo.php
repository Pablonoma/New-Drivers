<!--ventana para AddUser--->
<div class="modal fade" id="addVehiculo" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="position: relative; z-index: 3;">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #272b32  !important; border-color: #198754;">
                <h5 class="modal-title" style="color:#FDD45B ; text-align: center; font-size: 20px;">
                    Agregar Vehiculo
                </h5>
            </div>
            <form class="formulario p-4" id="formulario" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_profe" value="<?php echo $id_profe; ?>">
                <input type="file" name="file" id="file-upload" accept="image/*" class="box">

                <div class="mb-3">
                    <label for="exampleInputModelo" class="form-label font-weight-bold">Modelo del vehículo</label>
                    <input type="text" name="modelo" class="form-control bg-dark-x border-2" placeholder="Fiat 500, Honda Civic, Kia Morning, etc " aria-describedby="emailHelp" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputAño" class="form-label font-weight-bold">Año del vehículo</label>
                    <input type="number" name="ano" class="form-control bg-dark-x border-2 mb-2" placeholder="Ingresa el año del vehículo" required oninput="if(this.value.length > 4) this.value = this.value.slice(0,4);">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPersonas" class="form-label font-weight-bold">Cantidad de personas</label>
                    <input type="number" name="personas" class="form-control bg-dark-x border-2 mb-2" placeholder="Ingresa la cantidad de personas de tu vehículo" required oninput="if(this.value.length > 1) this.value = this.value.slice(0,1);">
                </div>
                <label for="exampleInputCombustible" class="form-label font-weight-bold">Combustible</label>
                <select class="form-select mb-3" id="select_combustible" required="true" name="combustible">
                    <option selected disabled>Seleccionar tipo de combustible</option>

                    <option value="Gasolina">Gasolina/Bencina</option>
                    <option value="Electrico">Eléctrico</option>
                    <option value="Petroleo">Petróleo</option>


                </select>

                <label for="exampleInpuComando" class="form-label font-weight-bold">¿El vehículo cuenta con doble comando?</label>
                <select class="form-select mb-3" id="select_doble_comando" required="true" name="doble_comando">
                    <option selected disabled>Seleccione su respuesta</option>

                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>

                <label for="exampleInputTransmision" class="form-label font-weight-bold">Transmisión</label>
                <select class="form-select mb-3" id="select_transmision" required="true" name="transmision">
                    <option selected disabled>Seleccionar Tipo de transmisión</option>

                    <option value="Mecanico">Mecánico</option>
                    <option value="Automatico">Automático</option>
                    <option value="Mecanico/Automatico">Mecánico/Automático</option>
                </select>

                <div class="mb-3">
                    <label for="exampleInputPatente" class="form-label font-weight-bold">Patente del vehículo</label>
                    <input type="text" name="patente" class="form-control bg-dark-x border-2" placeholder="FF-FF-FF" aria-describedby="emailHelp" required>
                </div>

                <button type="submit" name="registrar" class="btn btn-success w-100">Agregar Nuevo Vehículo</button>
            </form>

        </div>
    </div>
</div>