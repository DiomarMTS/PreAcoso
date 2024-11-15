<?php require_once "../includes/header.php" ?>

<! -----------------contenido -----------------!>

    <div class="container-fluid">

        <?php
        require_once '../../config/confiig.php';
        include_once '../../config/conexion.php';

        $consulta = "SELECT `id_proveedor`, `nombre`, `direccion`, `telefono`, `email`, `Estado`, `RUC` FROM `proveedores`;";
        $resultado = $pdo->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1></h1>

            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-filetype-pdf"></i> Reporte
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="../fpdf/Proveedor.php" target="_blank">General</a></li>
                <li><a class="dropdown-item" href="../fpdf/ProveedorActivos.php" target="_blank">Activos</a></li>
                <li><a class="dropdown-item" href="../fpdf/ProveedorInactivos.php" target="_blank">Inactivos</a></li>
            </ul>
        </div>
        <br>
        <div class="container">

            <div class="table-responsive">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1>Lista de Proveedores</h1>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarProveedor">
                        <i class="bi bi-plus-circle"></i> Agregar
                    </button>
                </div>
                <table id="tablaProveedor" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>RUC</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $dat) {
                        ?>
                            <tr>
                                <td><?php echo $dat['id_proveedor'] ?></td>
                                <td><?php echo $dat['RUC'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['direccion'] ?></td>
                                <td><?php echo $dat['telefono'] ?></td>
                                <td><?php echo $dat['email'] ?></td>
                                <td><?php echo $dat['Estado'] ?></td>
                                <td>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarProveedor<?php echo $dat['id_proveedor']; ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <a href="../config/Delete/eliminarProveedor.php?id=<?php echo $dat['id_proveedor']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
                                            <i class="bi bi-trash3-fill"></i>
                                        </a>
                                    </div>
                                </td>
                                <?php include '../config/Update/editar.php' ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

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

        <!-- Bootstrap core JavaScript-->
        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../assets/js/sb-admin-2.min.js"></script>



        <!-- Page level plugins -->
        <script src="../assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="../assets/js/demo/chart-area-demo.js"></script>
        <script src="../assets/js/demo/chart-pie-demo.js"></script>


        <script type="text/javascript" src="../assets/vendor/datatables/datatables.min.js"></script>
        <!-- código propio JS -->
        <script type="text/javascript" src="../assets/js/table/mainProv.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script src="../js/jquery.min.js"></script>


        </body>
        <?php include '../config/Insert/agregar.php' ?>

        </html>