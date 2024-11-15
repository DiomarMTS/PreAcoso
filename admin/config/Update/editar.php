<div class="modal fade" id="editarRol<?php echo $dat['id_rol']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar el Rol
                    <?php echo $dat['nombre_rol']; ?>
                </h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Update/funtions.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="rol" class="form-label">Rol:</label>
                                <input type="text" class="form-control" id="rol" name="rol" value="<?php echo $dat['nombre_rol']; ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <label for="modelo" class="form-label">Estado:</label>
                                <select class="form-select" name="estado" aria-label="Default select example" id="estado" require>
                                    <option value='Activo' <?php if ($dat['Estado'] == 'Activo')
                                                                echo 'selected'; ?>>Activo</option>
                                    <option value='Inactivo' <?php if ($dat['Estado'] == 'Inactivo')
                                                                    echo 'selected'; ?>>Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <br>
                    <input type="hidden" name="accionRol" value="editarRol">
                    <input type="hidden" name="id" value="<?php echo $dat['id_rol']; ?>">

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

<div class="modal fade" id="editarCategoria<?php echo $dat['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar Categoria</h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Update/funtions.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="categoria" class="form-label">Categoria:</label>
                                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $dat['nombre'] ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div>
                            <label for="descripcion" class="form-label">Descripcion:</label>
                            <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" required><?php echo $dat['descripcion']; ?></textarea>
                        </div>
                    </div>
                    <br>
                    <input type="hidden" name="accionCategoria" value="editarCategoria">
                    <input type="hidden" name="id" value="<?php echo $dat['id_categoria']; ?>">

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

<div class="modal fade" id="editarProducto<?php echo $dat['id_producto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar el Producto
                    <?php echo $dat['producto_nombre']; ?>
                </h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Update/funtions.php" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="producto" class="form-label">Producto:</label>
                                <input type="text" class="form-control" id="producto" name="producto" value="<?php echo $dat['producto_nombre']; ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>

                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="descripcion" class="form-label">Descripcion:</label>
                        <textarea class="form-control" aria-label="With textarea" id="descripcion" name="descripcion" value="<?php echo $dat['producto_descripcion']; ?>" required><?php echo $dat['producto_descripcion']; ?></textarea>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <label for="categoria" class="form-label">Categoria:</label>
                                <select class="form-select" name="categoria" aria-label="Default select example" id="categoria" require>
                                    <option value='1' <?php if ($dat['categoria_nombre'] == 'Bebidas')
                                                            echo 'selected'; ?>>Bebidas</option>
                                    <option value='2' <?php if ($dat['categoria_nombre'] == 'Lácteos')
                                                            echo 'selected'; ?>>Lácteos</option>
                                    <option value='3' <?php if ($dat['categoria_nombre'] == 'Carnes')
                                                            echo 'selected'; ?>>Carnes</option>
                                    <option value='4' <?php if ($dat['categoria_nombre'] == 'Snacks')
                                                            echo 'selected'; ?>>Snacks</option>
                                    <option value='5' <?php if ($dat['categoria_nombre'] == 'Limpieza')
                                                            echo 'selected'; ?>>Limpieza</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <label for="proveedor" class="form-label">proveedor:</label>
                                <select class="form-select" name="proveedor" aria-label="Default select example" id="proveedor" require>
                                    <option value='1' <?php if ($dat['proveedor_nombre'] == 'Gloria S.A.')
                                                            echo 'selected'; ?>>Gloria S.A.</option>
                                    <option value='2' <?php if ($dat['proveedor_nombre'] == 'Backus')
                                                            echo 'selected'; ?>>Backus</option>
                                    <option value='3' <?php if ($dat['proveedor_nombre'] == 'San Fernando')
                                                            echo 'selected'; ?>>San Fernando</option>
                                    <option value='4' <?php if ($dat['proveedor_nombre'] == 'Frito Lay')
                                                            echo 'selected'; ?>>Frito Lay</option>
                                    <option value='5' <?php if ($dat['proveedor_nombre'] == 'Clorox Perú')
                                                            echo 'selected'; ?>>Clorox Perú</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div>
                                <label for="precio" class="form-label">Precio:</label>
                                <input type="number" class="form-control" id="precio" min="1" step="0.01" name="precio" value="<?php echo $dat['precio']; ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div>
                                <label for="stock" class="form-label">stock:</label>
                                <input type="number" class="form-control" id="stock" min="1" step="1" name="stock" value="<?php echo $dat['stock']; ?>" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div>
                                <label for="stockMin" class="form-label">stock Minimo:</label>
                                <input type="number" class="form-control" id="stockMin" min="1" step="1" name="stockMin" oninput="validarStock(this)" value="<?php echo $dat['stockMin']; ?>" required>
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
                    <input type="hidden" name="accionProducto" value="editarProducto">
                    <input type="hidden" name="id" value="<?php echo $dat['id_producto']; ?>">

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
<!--                                 Proveedor                              -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="editarProveedor<?php echo $dat['id_proveedor']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar proveedor 
                <?php echo $dat['nombre'] ?>
                </h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Update/funtions.php" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="ruc" class="form-label">RUC</label>
                                <input type="number" class="form-control" id="ruc" name="ruc" min="1" step="1"
                                 value="<?php echo $dat['RUC']?>" oninput="validarRUC(this)" required>
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
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $dat['nombre'] ?>" required>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="direccion" class="form-label">Direcciòn</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $dat['direccion'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $dat['email'] ?>" required>
                    </div>




                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="number" class="form-control" min="0" name="telefono" step="1" id="telefono"
                                 value="<?php echo $dat['telefono'] ?>" oninput="validarTelefono(this)" placeholder="Telefono" required>
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
                                <select class="form-select" name="estado" aria-label="Default select example" id="estado" required>
                                    <option value='Inactivo'>Inactivo</option>
                                    <option value='Activo' <?php if ($dat['Estado'] == 'Activo')
                                                                echo 'selected'; ?>>Activo</option>
                                    <option value='Inactivo' <?php if ($dat['Estado'] == 'Inactivo')
                                                                    echo 'selected'; ?>>Inactivo</option>

                                </select>
                            </div>
                        </div>
                    </div>



                    <br>
                    <input type="hidden" name="accionProveedor" value="editarProveedor">
                    <input type="hidden" name="id" value="<?php echo $dat['id_proveedor']; ?>">

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
<!--                                 Empleado                               -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="editarEmpleado<?php echo $dat['id_empleado']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar Empleado
                    <?php echo $dat['nombre'] ?>
                </h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Update/funtions.php" method="POST" enctype="multipart/form-data">

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="dni" class="form-label">DNI</label>
                                <input type="number" class="form-control" id="dni" name="dni" min="1" step="1" oninput="validarDNI(this)" value="<?php echo $dat['id_empleado'] ?>" required>
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
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $dat['nombre'] ?>" required>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $dat['apellido'] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $dat['email'] ?>" required>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Telefono</label>
                                <input type="number" class="form-control" min="1" name="telefono" step="1" id="telefono" oninput="validarTelefono(this)" placeholder="Telefono" value="<?php echo $dat['telefono'] ?>" required>
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
                                <input type="number" class="form-control" id="salario" min="1" step="0.01" name="salario" value="<?php echo $dat['salario'] ?>" oninput="validarSalario(this)" required>
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
                                <option value='3' <?php if ($dat['nombre_rol'] == 'Empleado')
                                                        echo 'selected'; ?>>Empleado</option>
                                <option value='4' <?php if ($dat['nombre_rol'] == 'Cajero')
                                                        echo 'selected'; ?>>Cajero</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <input type="hidden" name="accionEmpleado" value="editarEmpleado">
                    <input type="hidden" name="id" value="<?php echo $dat['id_empleado']; ?>">

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
<!--                                 Cliente                                -->
<!-- ********************************** *********************************** -->

<div class="modal fade" id="editarCliente<?php echo $dat['id_usuario']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Editar Cliente
                    <?php echo $dat['nombre']; ?>
                </h3>
                <button type="button" class="btn btn-primary" data-dismiss="modal">
                    <i class="fa fa-times" aria-hidden="true"></i></button>
            </div>
            <div class="modal-body">

                <form action="../config/Update/funtions.php" method="POST" enctype="multipart/form-data">

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label for="names" class="form-label">Nombre de usuario</label>
                            <input type="text" class="form-control" id="names" name="names" value="<?php echo $dat['nombre_usuario']; ?>" required>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $dat['nombre']; ?>" required>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $dat['apellido']; ?>" required>
                        </div>

                    </div>


                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $dat['email']; ?>" required>
                    </div>


                    <div class="row">

                        <div class="col-sm-6">
                            <div>
                                <label for="modelo" class="form-label">Estado:</label>
                                <select class="form-select" name="estado" aria-label="Default select example" id="estado" required>
                                    <option value='Inactivo'>Inactivo</option>
                                    <option value='Activo' <?php if ($dat['Estado'] == 'Activo')
                                                                echo 'selected'; ?>>Activo</option>
                                    <option value='Inactivo' <?php if ($dat['Estado'] == 'Inactivo')
                                                                    echo 'selected'; ?>>Inactivo</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div>
                                <label for="rol" class="form-label">Cargo:</label>
                                <select class="form-select" name="rol" aria-label="Default select example" id="rol" required>
                                    <option value='1' <?php if ($dat['nombre_rol'] == 'Cliente')
                                                            echo 'selected'; ?>>Cliente</option>
                                    <option value='2' <?php if ($dat['nombre_rol'] == 'Administrador')
                                                            echo 'selected'; ?>>Administrador</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <br>
                    <input type="hidden" name="accionCliente" value="editarCliente">
                    <input type="hidden" name="id" value="<?php echo $dat['id_usuario']; ?>">

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="register" name="registrar">Guardar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>