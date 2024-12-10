<div class="modal fade" id="agregarRol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Rol</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Insert/insertRol.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="rol" class="form-label">Rol:</label>
                                <input type="text" class="form-control" id="rol" name="rol" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <label for="modelo" class="form-label">Estado:</label>
                                <select class="form-select" name="estado" aria-label="Default select example" id="estado" require>
                                    <option value='Activo'>Activo</option>
                                    <option value='Inactivo'>Inactivo</option>
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

<!-- ********************************** *********************************** -->
<!--                                Categoria                               -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="agregarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Categoria</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Insert/insertCategoria.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="categoria" class="form-label">Categoria:</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div>
                            <label for="modelo" class="form-label">Descripcion:</label>
                            <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" required></textarea>
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

<!-- ********************************** *********************************** -->
<!--                                 Producto                               -->
<!-- ********************************** *********************************** -->


<div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Producto</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Insert/insertProducto.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="producto" class="form-label">Producto:</label>
                                <input type="text" class="form-control" id="producto" name="producto" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="categoria" class="form-label">Categoria:</label>
                                <select class="form-select" name="categoria" aria-label="Default select example" id="categoria" require>
                                    <?php
                                    require_once '../../config/confiig.php';
                                    include_once '../../config/conexion.php';
                                    $consulta = "SELECT `id_categoria`, `nombre` FROM `categorias`";
                                    $resultado = $pdo->prepare($consulta);
                                    $resultado->execute();
                                    while ($dat = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$dat['id_categoria']}'>{$dat['nombre']}</option>";
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <label for="proveedor" class="form-label">proveedor:</label>
                                <select class="form-select" name="proveedor" aria-label="Default select example" id="proveedor" require>
                                    <?php
                                    require_once '../../config/confiig.php';
                                    include_once '../../config/conexion.php';

                                    $consulta = "SELECT `id_proveedor`, `nombre` FROM `proveedores`";
                                    $resultado = $pdo->prepare($consulta);
                                    $resultado->execute();

                                    while ($dat = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$dat['id_proveedor']}'>{$dat['nombre']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <div>
                                <label for="precio" class="form-label">Precio:</label>
                                <input type="number" class="form-control" id="precio" min="1" step="0.01" name="precio" oninput="validarPrecio(this)" required>
                            </div>
                            <script>
                                function validarPrecio(input) {
                                    const valor = input.value;
                                    if (isNaN(valor) || valor <= 0 || (valor * 100) % 1 !== 0) {
                                        Swal.fire(
                                            'Precio invalido',
                                            'Intentelo de nuevo',
                                            'error'
                                        )
                                        input.value = "";
                                    }
                                }
                            </script>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                <label for="stock" class="form-label">stock:</label>
                                <input type="number" class="form-control" id="stock" min="1" step="1" name="stock" oninput="validarStock(this)" required>
                            </div>
                            <script>
                                function validarStock(input) {
                                    const valor = input.value;
                                    if (isNaN(valor) || valor <= 0) {
                                        Swal.fire(
                                            'Cantidad invalida',
                                            'Intentelo de nuevo',
                                            'error'
                                        )
                                        input.value = "";
                                    }
                                }
                            </script>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                <label for="stockMin" class="form-label">stock Minimo:</label>
                                <input type="number" class="form-control" id="stockMin" min="1" step="1" name="stockMin" oninput="validarStock(this)" required>
                            </div>
                            <script>
                                function validarStock(input) {
                                    const valor = input.value;
                                    if (isNaN(valor) || valor <= 0) {
                                        Swal.fire(
                                            'Cantidad invalida',
                                            'Intentelo de nuevo',
                                            'error'
                                        )
                                        input.value = "";
                                    }
                                }
                            </script>
                        </div>
                    </div>
                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="registerProducto" name="registerProducto">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>

<!-- ********************************** *********************************** -->
<!--                                 Proveedor                              -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="agregarProveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Agregar proveedor</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Insert/insertProveedor.php" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="ruc" class="form-label">RUC</label>
                                <input type="number" class="form-control" id="ruc" name="ruc" min="1" step="1" oninput="validarRUC(this)" required>
                            </div>
                        </div>
                        <script>
                            function validarRUC(input) {
                                let valor = input.value;
                                valor = valor.replace(/\D/g, '');
                                if (valor.length === 12 || isNaN(valor) || valor <= 0 || parseInt(valor) > 99999999999) {
                                    Swal.fire(
                                        'RUC inválida',
                                        'Inténtelo de nuevo con 11 números positivos',
                                        'error'
                                    );
                                    input.value = "";
                                }
                            }
                        </script>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direcciòn</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>




                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="number" class="form-control" min="0" name="telefono" step="1" id="telefono" oninput="validarTelefono(this)" placeholder="Telefono" required>
                            </div>
                        </div>

                        <script>
                            function validarTelefono(input) {
                                let valor = input.value;
                                valor = valor.replace(/\D/g, '');
                                if (valor.length === 10 || isNaN(valor) || valor <= 0 || parseInt(valor) > 999999999) {
                                    Swal.fire(
                                        'telefono inválida',
                                        'Inténtelo de nuevo con 9 números positivos',
                                        'error'
                                    );
                                    input.value = "";
                                }
                            }
                        </script>

                        <div class="col-sm-6">
                            <div>
                                <label for="modelo" class="form-label">Estado:</label>
                                <select class="form-select" name="estado" aria-label="Default select example" id="estado" require>
                                    <option value='Activo'>Activo</option>
                                    <option value='Inactivo'>Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>



                    <br>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

            </div>

            </form>
        </div>
    </div>
</div>

<!-- ********************************** *********************************** -->
<!--                                 Empleados                              -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="agregarEmpleado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Empleado</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Insert/insertEmpleado.php" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="number" class="form-control" id="dni" name="dni" min="1" step="1" oninput="validarDNI(this)" required>
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

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="number" class="form-control" min="1" name="telefono" step="1" id="telefono" oninput="validarTelefono(this)" placeholder="Telefono" required>
                            </div>
                        </div>

                        <script>
                            function validarTelefono(input) {
                                let valor = input.value;
                                valor = valor.replace(/\D/g, '');
                                if (valor.length === 10 || isNaN(valor) || valor <= 0 || parseInt(valor) > 999999999) {
                                    Swal.fire(
                                        'telefono inválida',
                                        'Inténtelo de nuevo con 9 números positivos',
                                        'error'
                                    );
                                    input.value = "";
                                }
                            }
                        </script>

                        <div class="col-sm-4">
                            <div>
                                <label for="modelo" class="form-label">Estado:</label>
                                <select class="form-select" name="estado" aria-label="Default select example" id="estado" required>
                                    <option value='Activo'>Activo</option>
                                    <option value='Inactivo'>Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                <label for="salario" class="form-label">Salario:</label>
                                <input type="number" class="form-control" id="salario" min="1" step="0.01" name="salario" oninput="validarSalario(this)" required>
                            </div>
                        </div>
                        <script>
                            function validarSalario(input) {
                                const valor = input.value;
                                if (isNaN(valor) || valor <= 0 || (valor * 100) % 1 !== 0) {
                                    Swal.fire(
                                        'saldo invalido',
                                        'Intentelo de nuevo',
                                        'error'
                                    )
                                    input.value = "";
                                }
                            }
                        </script>
                    </div>



                    <div class="col-sm-6">
                        <div>
                            <label for="rol" class="form-label">Cargo:</label>
                            <select class="form-select" name="rol" aria-label="Default select example" id="rol" required>
                                <?php
                                require_once '../../config/confiig.php';
                                include_once '../../config/conexion.php';

                                $consulta = "SELECT `id_rol`, `nombre_rol` FROM `roles` WHERE id_rol NOT IN (1,2);";
                                $resultado = $pdo->prepare($consulta);
                                $resultado->execute();

                                while ($dat = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='{$dat['id_rol']}'>{$dat['nombre_rol']}</option>";
                                }
                                ?>
                            </select>
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

<!-- ********************************** *********************************** -->
<!--                                 Usuario                             -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="agregarCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Agregar Cliente</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Insert/insertCliente.php" method="POST" enctype="multipart/form-data">

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="names" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="names" name="names" required>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>

                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>


                    <div class="row">

                        <div class="col-sm-6">
                            <div>
                                <label for="modelo" class="form-label">Estado:</label>
                                <select class="form-select" name="estado" aria-label="Default select example" id="estado" required>
                                    <option value='Activo'>Activo</option>
                                    <option value='Inactivo'>Inactivo</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <label for="rol" class="form-label">Cargo:</label>
                                <select class="form-select" name="rol" aria-label="Default select example" id="rol" required>
                                    <?php
                                    require_once '../../config/confiig.php';
                                    include_once '../../config/conexion.php';

                                    $consulta = "SELECT `id_rol`, `nombre_rol` FROM `roles` WHERE id_rol IN (1,2);";
                                    $resultado = $pdo->prepare($consulta);
                                    $resultado->execute();

                                    while ($dat = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                        echo "<option value='{$dat['id_rol']}'>{$dat['nombre_rol']}</option>";
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


<script>
    const stock = document.querySelector("#stock");
    const codigo = document.querySelector("#codigo");

    function validarCosto(input) {
        const valor = input.value;
        if (isNaN(valor) || valor <= 0 || (valor * 100) % 1 !== 0) {
            Swal.fire(
                'Costo invalido',
                'Intentelo de nuevo',
                'error'
            )
            input.value = "";
        }
    }

    function validarPrecio(input) {
        const valor = input.value;
        if (isNaN(valor) || valor <= 0 || (valor * 100) % 1 !== 0) {
            Swal.fire(
                'Precio invalido',
                'Intentelo de nuevo',
                'error'
            )
            input.value = "";
        }
    }

    function validarSalario(input) {
        const valor = input.value;
        if (isNaN(valor) || valor <= 0 || (valor * 100) % 1 !== 0) {
            Swal.fire(
                'saldo invalido',
                'Intentelo de nuevo',
                'error'
            )
            input.value = "";
        }
    }

    function validarStock(input) {
        const valor = input.value;
        if (isNaN(valor) || valor <= 0) {
            Swal.fire(
                'Cantidad invalida',
                'Intentelo de nuevo',
                'error'
            )
            input.value = "";
        }
    }

    function validarTelefono(input) {
        let valor = input.value;
        valor = valor.replace(/\D/g, '');
        if (valor.length === 10 || isNaN(valor) || valor <= 0 || parseInt(valor) > 999999999) {
            Swal.fire(
                'telefono inválida',
                'Inténtelo de nuevo con 9 números positivos',
                'error'
            );
            input.value = "";
        }
    }

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

    function validarRUC(input) {
        let valor = input.value;
        valor = valor.replace(/\D/g, '');
        if (valor.length === 12 || isNaN(valor) || valor <= 0 || parseInt(valor) > 99999999999) {
            Swal.fire(
                'RUC inválida',
                'Inténtelo de nuevo con 11 números positivos',
                'error'
            );
            input.value = "";
        }
    }


    function generarCodigo() {
        const date = new Date();
        const msmtsrl = "MT";

        // Generar un código aleatorio de 6 caracteres
        const caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        let codigo = "";
        for (let i = 0; i < 6; i++) {
            const randomIndex = Math.floor(Math.random() * caracteres.length);
            codigo += caracteres.charAt(randomIndex);
        }

        // Usar la fecha y MSMTSRL para formar parte del código
        const codigoFinal = codigo + (date.getMonth() + 1) + msmtsrl + codigo;

        // Actualizar el valor del campo de entrada sin recargar la página
        document.getElementById("codigo").value = codigoFinal;
    }
</script>