<?php require_once "../includes/header.php" ?>

<! -----------------contenido -----------------!>

    <div class="container">

    </div>

    <?php
    require_once '../../config/confiig.php';
    include_once '../../config/conexion.php';

    $consulta = "SELECT p.id_producto, p.nombre AS producto_nombre, p.descripcion AS producto_descripcion, p.precio, p.stock,p.stockMin,
     p.img AS producto_img, c.nombre AS categoria_nombre, pr.nombre AS proveedor_nombre
      FROM productos p 
      INNER JOIN categorias c ON p.id_categoria = c.id_categoria 
      INNER JOIN proveedores pr ON p.id_proveedor = pr.id_proveedor;";
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
            <li><a class="dropdown-item" href="../fpdf/ProductoPDF.php" target="_blank">Stock General</a></li>
            <li><a class="dropdown-item" href="../fpdf/ProductoStock.php" target="_blank">Stock Minimo</a></li>
            <li><a class="dropdown-item" href="../fpdf/ProductoStockCritico.php" target="_blank">Stock Critico</a></li>
        </ul>
    </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1>Lista de Productos</h1>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarProducto">
                            <i class="bi bi-plus-circle"></i> Agregar
                        </button>
                    </div>
                    <table id="tablaProductos" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center text-white" style="background-color: #e3101f;">
                            <tr>
                                <th>ID</th>
                                <th>IMG</th>
                                <th>Producto</th>
                                <th>Descripción</th>
                                <th>Proveedor</th>
                                <th>Categoria</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Stock Min</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['id_producto'] ?></td>
                                    <td><?php echo $dat['producto_img'] ?></td>
                                    <td><?php echo $dat['producto_nombre'] ?></td>
                                    <td><?php echo $dat['producto_descripcion'] ?></td>
                                    <td><?php echo $dat['proveedor_nombre'] ?></td>
                                    <td><?php echo $dat['categoria_nombre'] ?></td>
                                    <td><?php echo $dat['precio'] ?></td>
                                    <td><?php echo $dat['stock'] ?></td>
                                    <td><?php echo $dat['stockMin'] ?></td>
                                    <td>
                                        <div class="text-center">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editarProducto<?php echo $dat['id_producto']; ?>">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <a href="../config/Delete/EliminarProducto.php?id=<?php echo $dat['id_producto']; ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">
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
    </div>


    <! ----------------- fin contenido -----------------!>
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
        <script type="text/javascript" src="../assets/js/table/mainPro.js"></script>
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@10'></script>
        <script src="../js/jquery.min.js"></script>
        <?php include '../config/Insert/agregar.php' ?>
        </body>


        </html>