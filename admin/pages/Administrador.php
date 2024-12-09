<?php

require_once "../includes/header.php" ?>

<! -----------------contenido -----------------!>

    <div class="container-fluid">

        <?php
        require_once '../../config/datos.php';
        include_once '../../config/conexion.php';

        $consulta = "SELECT 
    u.id_user,
    u.DNI,
    u.nombre,
    u.apellidoPaterno,
    u.apellidoMaterno,
    u.contacto,
    u.email,
    u.pass,
    td.descripcion AS tipo_documento,
    r.descripcion AS rol
FROM 
    Usuario u
INNER JOIN 
    Rol r ON u.id_rol = r.id_rol
INNER JOIN 
    TipoDoc td ON u.id_tipoDoc = td.id_tipoDoc
WHERE 
    r.descripcion = 'Administrador';";
        $resultado = $pdo->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lista de Usuarios</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarUsuario">
                <i class="bi bi-plus-circle"></i> Agregar
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaUsuarios" class="table table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Contacto</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Tipo de Documento</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $dat) {
                    ?>
                        <tr>
                            <td><?php echo $dat['id_user']; ?></td>
                            <td><?php echo $dat['numDocumento']; ?></td>
                            <td><?php echo $dat['nombre']; ?></td>
                            <td><?php echo $dat['apellido']; ?></td>
                            <td><?php echo $dat['contacto']; ?></td>
                            <td><?php echo $dat['email']; ?></td>
                            <td><?php echo $dat['pass']; ?></td>
                            <td><?php echo $dat['tipo_documento']; ?></td>
                            <td><?php echo $dat['rol']; ?></td>
                            <td>
                                <div class="text-center">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarUsuario<?php echo $dat['id_user']; ?>">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                    <a href="../config/Delete/eliminarUsuario.php?id=<?php echo $dat['id_user']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                        <i class="bi bi-trash3-fill"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>


    <! ----------------- fin contenido -----------------!>


        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Desarrollado por Grupo 5 &copy; Tienda Rojas</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Esta seguro que quiere cerrar sesion</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../../pages/logout.php">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../assets/js/sb-admin-2.min.js"></script>
        <script src="../assets/vendor/chart.js/Chart.min.js"></script>
        <script src="../assets/js/demo/chart-area-demo.js"></script>
        <script src="../assets/js/demo/chart-pie-demo.js"></script>


        <script type="text/javascript" src="../assets/vendor/datatables/datatables.min.js"></script>
        <!-- código propio JS -->
        <script type="text/javascript" src="../assets/js/table/mainUser.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script src="../js/jquery.min.js"></script>

        </body>

        <?php include '../config/Insert/agregar.php' ?>

        </html>