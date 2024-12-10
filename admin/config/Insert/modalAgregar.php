<!-- ********************************** *********************************** -->
<!--                                Usuario                               -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="agregarUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Usuario</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">

                <form action="../config/Insert/insertUser.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="tipoDoc" class="form-label">tipoDoc:</label>
                                <select class="form-select" name="tipoDoc" aria-label="Default select example" id="tipoDoc" required>
                                    <?php
                                    require_once '../../config/datos.php';
                                    include_once '../../config/conexion.php';

                                    $consulta = "SELECT `id_tipoDoc`, `descripcion` FROM `tipodoc` WHERE id_tipoDoc;";
                                    $resultado = $pdo->prepare($consulta);
                                    $resultado->execute();

                                    while ($dat = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$dat['id_tipoDoc']}'>{$dat['descripcion']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="numDoc" class="form-label">Numero:</label>
                                <input type="number" class="form-control" id="numDoc" name="numDoc" min="1" step="1" oninput="validarDNI(this)" required>
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
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="apellidoPaterno" class="form-label">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="apellidoMaterno" class="form-label">Apellido Materno:</label>
                                <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="contacto" class="form-label">Contacto:</label>
                                <input type="text" class="form-control" id="contacto" name="contacto" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div>
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="pass" class="form-label">Contraseña:</label>
                                <input type="password" class="form-control" id="pass" name="pass" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div>
                                <label for="rol" class="form-label">Rol:</label>
                                <select class="form-select" name="rol" aria-label="Default select example" id="rol" required>
                                    <?php
                                    require_once '../../config/datos.php';
                                    include_once '../../config/conexion.php';

                                    $consulta = "SELECT `id_rol`, `descripcion` FROM `rol` WHERE id_rol NOT IN (1,2);";
                                    $resultado = $pdo->prepare($consulta);
                                    $resultado->execute();

                                    while ($dat = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$dat['id_rol']}'>{$dat['descripcion']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>