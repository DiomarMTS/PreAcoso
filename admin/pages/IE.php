<?php

require_once "../includes/header.php" ?>

<! -----------------contenido -----------------!>

    <div class="container-fluid">

        <?php
        require_once '../../config/datos.php';
        include_once '../../config/conexion.php';

        $consulta = "SELECT i.id_institucion AS id_institucion,
                            i.nombre AS nombre_institucion,
                            u.descripcion AS descripcion_ubicacion,
                            ug.nombre AS nombre_UGEL,
                            dr.nombre AS nombre_DRE,
                            d.nombre AS distrito,
                            p.nombre AS provincia,
                            dep.nombre AS departamento
                    FROM InsEducativa i
                    INNER JOIN ugel ug ON i.id_UGEL = ug.id_UGEL
                    INNER JOIN dre dr ON ug.id_DRE = dr.id_DRE
                    INNER JOIN Ubicacion u ON i.id_ubicacion = u.id_ubicacion
                    INNER JOIN Distrito d ON i.id_Distrito = d.id_Distrito
                    INNER JOIN Provincia p ON d.id_Provincia = p.id_Provincia
                    INNER JOIN Departamento dep ON p.id_departamento = dep.id_departamento;";
        $resultado = $pdo->prepare($consulta);
        $resultado->execute();
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Lista de Usuarios</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarUser">
                <i class="bi bi-plus-circle"></i> Agregar
            </button>
        </div>

        <div class="table-responsive">
            <table id="tablaIE" class="table table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>I. E.</th>
                        <th>Descripcion</th>
                        <th>UGEL</th>
                        <th>DRE</th>
                        <th>Distrito</th>
                        <th>Provincia</th>
                        <th>Despartamento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $dat) {
                    ?>
                        <tr>
                            <td><?php echo $dat['id_institucion']; ?></td>
                            <td><?php echo $dat['nombre_institucion']; ?></td>
                            <td><?php echo $dat['descripcion_ubicacion']; ?></td>
                            <td><?php echo $dat['nombre_UGEL']; ?></td>
                            <td><?php echo $dat['nombre_DRE']; ?> </td>
                            <td><?php echo $dat['distrito']; ?></td>
                            <td><?php echo $dat['provincia']; ?></td>
                            <td><?php echo $dat['departamento']; ?></td>

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
                    <span>Integrador II &copy; Estanos para ayudar</span>
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
        <script type="text/javascript" src="../assets/js/table/mainIE.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script src="../js/jquery.min.js"></script>

        </body>

        <?php
        include '../config/Insert/modalAgregar.php'
        ?>

        </html>