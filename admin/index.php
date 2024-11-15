<?php
include '../config/datos.php';
include '../config/conexion.php';
?>

<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrador</title>
    <link rel="icon" href="../assets/images/images.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Proveedor', 'Cantidad'],
                <?php
                require_once '../config/confiig.php';
                include_once '../config/conexion.php';

                $consulta = "SELECT pr.nombre AS proveedor, COUNT(p.id_producto) AS cantidad_productos
                                        FROM productos p
                                        JOIN proveedores pr ON p.id_proveedor = pr.id_proveedor
                                        GROUP BY pr.nombre;";
                $resultado = $pdo->prepare($consulta);
                $resultado->execute();
                $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach ($data as $dat) {
                    echo "['" . $dat['proveedor'] . "', " . $dat['cantidad_productos'] . "],";
                }
                ?>
            ]);

            var options = {
                title: 'Cantidad de Productos por Proveedor',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Año', 'Abarrotes', 'Bebidas', 'Limpieza'],
                ['2020', 980, 750, 500],
                ['2021', 780, 560, 350],
                ['2022', 660, 720, 300],
                ['2023', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Tipo de Productos más Vendidos (Anuales)',
                },
                bars: 'horizontal' // Required for Material Bar Charts.
            };

            var chart = new google.charts.Bar(document.getElementById('barchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>



    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Meses', 'Abarrotes', 'Bebidas', 'Limpieza'],
                ['Enero', 900, 400, 200],
                ['Febrero', 1010, 760, 450],
                ['Marzo', 660, 1120, 300],
                ['Abril', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Productos más Vendidos (Mensual)',
                    subtitle: 'Enero, Febrero, Marzo, Abril',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>

</head>

<body id="page-top" style="background-color: rgb(249, 245, 240);">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background: #cd0c17; ">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-chevron-compact-up" style="color: #cd0c17;"></i><img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg ">
                </div>
                <div class="sidebar-brand-text mx-3" style="height: 5px;">
                    Bienvenido
                    <?php echo htmlspecialchars($_SESSION['first']); ?> <?php echo htmlspecialchars($_SESSION['last']); ?>

                </div>
            </a>
            <br>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="bi bi-house"></i>
                    <span>Inicio</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Tablas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-person-circle"></i>
                    <span>Personal</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">vistas General</h6>
                        <a class="collapse-item" href="pages/clientes.php">Usuarios</a>
                        <a class="collapse-item" href="pages/empleados.php">Empleados</a>
                        <a class="collapse-item" href="pages/roles.php">Roles</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <span>Control de Stock</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">gestión personalizada</h6>
                        <a class="collapse-item" href="pages/proveedores.php">Proveedores</a>
                        <a class="collapse-item" href="pages/categorias.php">Categorias</a>
                        <a class="collapse-item" href="pages/productos.php">Productos</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Vistas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="bi bi-cart4"></i>
                    <span>Ventas</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Apartado Ventas</h6>
                        <a class="collapse-item" href="pages/ventas.php ">ventas</a>
                        <a class="collapse-item" href="pages/ventasSemanal.php ">Semanal</a>
                        <a class="collapse-item" href="pages/ventasMensual.php ">Mensual</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="pages/reporte.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Reporte</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-1 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($_SESSION['first']); ?></span>
                                <img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Configuración
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-------contenido --------------->
                <div class="container-fluid">



                    <!-- Content Row -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1></h1>

                        <a href="assets/REPORTE.pdf" download="REPORTE.pdf"> <button type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-filetype-pdf"></i> Guia
                            </button> </a>


                    </div>


                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ganancias (Estimadas)
                                            </div>
                                            <?php
                                            require_once '../config/confiig.php';
                                            include_once '../config/conexion.php';

                                            // Obtener precio y stock de los productos
                                            $consulta = "SELECT `precio`, `stock` FROM `productos`";
                                            $resultado = $pdo->prepare($consulta);
                                            $resultado->execute();
                                            $productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

                                            // Inicializar el total del inventario
                                            $totalInventario = 0;

                                            // Calcular el valor total del inventario
                                            foreach ($productos as $producto) {
                                                $totalInventario += $producto['precio'] * $producto['stock'];
                                            }
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> S/.
                                                <?php echo number_format($totalInventario, 2); ?>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ganancias (Stock minimo)
                                            </div>
                                            <?php
                                            require_once '../config/confiig.php';
                                            include_once '../config/conexion.php';

                                            // Obtener productos cuyo stock es menor o igual al stock mínimo
                                            $consulta = "SELECT p.precio, p.stock, p.stockMin FROM productos AS p WHERE p.stock <= p.stockMin";
                                            $resultado = $pdo->prepare($consulta);
                                            $resultado->execute();
                                            $productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

                                            // Inicializar el total del inventario
                                            $totalInventario = 0;

                                            // Calcular el valor total del inventario
                                            foreach ($productos as $producto) {
                                                $totalInventario += $producto['precio'] * $producto['stock'];
                                            }
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo number_format($totalInventario, 2); ?>
                                            </div>
                                        </div>


                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Productos con Stock Bajo
                                            </div>
                                            <?php
                                            require_once '../config/confiig.php';
                                            include_once '../config/conexion.php';

                                            // Obtener productos cuyo stock es menor o igual al stock mínimo
                                            $consulta = "SELECT p.stock FROM productos AS p WHERE p.stock <= p.stockMin";
                                            $resultado = $pdo->prepare($consulta);
                                            $resultado->execute();
                                            $productos = $resultado->fetchAll(PDO::FETCH_ASSOC);

                                            // Inicializar la cantidad total de productos con stock bajo
                                            $cantidadTotal = 0;

                                            // Calcular la cantidad total de productos con stock bajo
                                            foreach ($productos as $producto) {
                                                $cantidadTotal += $producto['stock'];
                                            }
                                            ?>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php echo number_format($cantidadTotal, 0); ?>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Solicitudes Pendientes</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Graficas -->
                    <div class="row">
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card" id="piechart" style="width: 100%; height: 500px; border-radius: 10px;"></div>
                        </div>


                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card" id="piechart_3d" style="width: 100%; height: 500px;"></div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-xl-6 mb-4">
                            <div class="card" id="barchart_material" style="width: 100%; height: 500px;"></div>
                        </div>
                        <div class="col-xl-6 mb-4">
                            <div class="card" id="columnchart_material" style="width: 100%; height: 500px;"></div>
                        </div>
                    </div>


                </div>
                <!-------fin del contenido-------->
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

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Listo para Salir?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Esta seguro que quiere cerrar sesion</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="../pages/logout.php">Cerrar sesion</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="assets/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="assets/js/demo/chart-area-demo.js"></script>
        <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>