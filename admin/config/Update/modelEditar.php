<!-- ********************************** *********************************** -->
<!--                                Usuario                               -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="editarUser<?php echo $dat['id_user']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar datos de <?php echo $dat['nombre']; ?></h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">

                <form action="../config/Update/funtions.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="tipoDoc" class="form-label">tipoDoc:</label>
                                <select class="form-select" name="tipoDoc" aria-label="Default select example" id="tipoDoc" required>
                                    <option value="1"> DNI</option>
                                    <OPTIon value="2"> Pasaporte</OPTIon>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="numDoc" class="form-label">Numero:</label>
                                <input type="number" class="form-control" id="numDoc" name="numDoc" min="1" step="1" value="<?php echo $dat['DNI']; ?>" oninput="validarDNI(this)" required>
                            </div>
                        </div>
                        <script>
                            function validarDNI(input) {
                                let valor = input.value;
                                valor = valor.replace(/\D/g, '');
                                if (valor.length === 9 || isNaN(valor) || valor <= 0 || parseInt(valor) > 99999999) {
                                    Swal.fire(
                                        'DNI inválida',
                                        'Inténtelo de nuevo con 8 números positivos',
                                        'error'
                                    );
                                    input.value = "";
                                }
                            }
                        </script>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $dat['nombre']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" value="<?php echo $dat['apellidoPaterno']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" value="<?php echo $dat['apellidoMaterno']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="contacto" class="form-label">Contacto:</label>
                                <input type="number" class="form-control" id="contacto" name="contacto" value="<?php echo $dat['contacto']; ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div>
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $dat['email']; ?>" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="pass" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $dat['pass']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="rol" class="form-label">Rol:</label>
                                <select class="form-select" name="rol" aria-label="Default select example" id="rol" required>
                                    <option value="4">Administrador</option>
                                    <option value="1">Estudiante</option>
                                    <option value="2">Familiar</option>
                                    <option value="3">Administrativo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>
                    <input type="hidden" name="accionUser" value="editarUser">
                    <input type="hidden" name="id" value="<?php echo $dat['id_user']; ?>">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>