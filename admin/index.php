<?php
//include 'config/datos.php';
include '../config/datos.php';
include '../config/conexion.php';

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../pages/login.php");
    exit;
}

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
    <link rel="icon" href="../assets/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">



    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Año', 'Lima', 'Arequipa', 'Cusco'],
                ['2020', 980, 750, 500],
                ['2021', 780, 560, 350],
                ['2022', 1023, 1000, 922],
                ['2023', 1500, 1200, 950]
            ]);

            var options = {
                chart: {
                    title: 'Top 3 Regiones de Perú con Más Casos de Acoso Sexual Reportados',
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
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="height: 94vh;
                background: -webkit-gradient(linear, left top, right top, from(#864ddf), to(#203376));
                background: linear-gradient(to right, #864ddf, #203376);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-chevron-compact-up" style="color: #cd0c17;"></i><img class="img-profile rounded-circle" src="assets/img/undraw_profile.svg ">
                </div>
                <div class="sidebar-brand-text mx-3" style="height: 5px;">
                    Bienvenido
                    <?php echo htmlspecialchars($_SESSION['first']); ?>

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
                    <span>Persona</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">vistas General</h6>
                        <a class="collapse-item" href="pages/Administrador.php">Administrador</a>
                        <a class="collapse-item" href="pages/Estudiante.php">Estudiantes</a>
                        <a class="collapse-item" href="pages/Familiare.php">Familiar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="bi bi-journal-bookmark-fill"></i>
                    <span>Control de casos</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">gestión personalizada</h6>
                        <a class="collapse-item" href="pages/IE.php">Ins. Educativa</a>
                        <a class="collapse-item" href="pages/Grafica.php">Graficas</a>
                        <a class="collapse-item" href="pages/TipoMedida.php">Productos</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Consultas
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="bi bi-cart4"></i>
                    <span>Casos</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Apartado Casos</h6>
                        <a class="collapse-item" href="#">Evalucion</a>
                        <a class="collapse-item" href="#">normas</a>
                        <a class="collapse-item" href="#">casos en proceso</a>
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
                                <span class="mr-1 d-none d-lg-inline text-gray-600 small"><?php echo htmlspecialchars($_SESSION['correo']); ?></span>
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
                            </button>
                        </a>
                    </div>

                    <div style="text-align: center;">
                        <h1>Bienvenido a la pagina Administrativa</h1>
                    </div>
                    <br>
                    <?php
                    $servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

                    try {
                        $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // Consulta SQL específica
                        $stmt = $pdo->prepare("SELECT d.nombre AS Departamento, COUNT(c.id_Caso) AS TotalCasos 
                                                FROM Caso c 
                                                JOIN Usuario u ON c.id_user = u.id_user 
                                                JOIN InsEducativa ie ON c.id_institucion = ie.id_institucion 
                                                JOIN Distrito dis ON ie.id_Distrito = dis.id_Distrito 
                                                JOIN Provincia p ON dis.id_Provincia = p.id_Provincia 
                                                JOIN Departamento d ON p.id_departamento = d.id_departamento 
                                                GROUP BY d.nombre 
                                                ORDER BY TotalCasos DESC");
                        $stmt->execute();
                        $departamentos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        die("Error en la conexión a la base de datos: " . $e->getMessage());
                    }
                    ?>

                    <!-- Graficas -->
                    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/geodata/peruLow.js"></script>
                    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

                    <script>
                        am5.ready(function() {
                            var colors = ["#4CAF50", "#81C784", "#A8D08D", "#FFEB3B", "#FF9800", "#F57C00", "#F44336"];

                            var departamentosData = <?php echo json_encode($departamentos); ?>;

                            console.log("Datos de departamentos desde PHP:", departamentosData);

                            var departamentoCantidades = {};
                            departamentosData.forEach(function(item) {
                                var departamentoNormalizado = normalizedDepartamentoName(item.Departamento);
                                departamentoCantidades[departamentoNormalizado] = item.TotalCasos;
                            });

                            console.log("Mapa de cantidades por departamento:", departamentoCantidades);

                            function normalizedDepartamentoName(nombre) {
                                return nombre
                                    .normalize("NFD")
                                    .replace(/[\u0300-\u036f]/g, "")
                                    .toUpperCase()
                                    .replace(/\s+/g, '');
                            }

                            var maxCantidad = Math.max(...departamentosData.map(item => item.TotalCasos));

                            console.log("Cantidad máxima de casos:", maxCantidad);


                            var root = am5.Root.new("chartdiv");

                            root.setThemes([
                                am5themes_Animated.new(root)
                            ]);

                            var chart = root.container.children.push(am5map.MapChart.new(root, {
                                panX: "translateX",
                                panY: "translateY",
                                projection: am5map.geoMercator()
                            }));

                            var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
                                geoJSON: am5geodata_peruLow
                            }));

                            // Función para obtener color basado en la cantidad
                            function getColorForDepartamento(departamento) {
                                var departamentoNormalizado = normalizedDepartamentoName(departamento);
                                var cantidad = departamentoCantidades[departamentoNormalizado] || 0;

                                // Normalizar la cantidad (entre 0 y 5)
                                var normalizedIndex = Math.floor((cantidad / maxCantidad) * (colors.length - 1));

                                normalizedIndex = Math.min(Math.max(normalizedIndex, 0), colors.length - 1);

                                console.log(`Departamento: ${departamento}, Cantidad: ${cantidad}, Color: ${colors[normalizedIndex]}`);

                                return colors[normalizedIndex];
                            }

                            polygonSeries.events.on("datavalidated", function() {
                                polygonSeries.mapPolygons.each(function(polygon) {
                                    var departamento = polygon.dataItem.dataContext.name;
                                    if (departamento) {
                                        var departamentoNormalizado = normalizedDepartamentoName(departamento);
                                        var cantidad = departamentoCantidades[departamentoNormalizado] || 0;

                                        // Añadir el dato 'cantidad' al contexto de datos
                                        polygon.dataItem.dataContext.cantidad = cantidad;

                                        var color = getColorForDepartamento(departamento);
                                        polygon.set("fill", am5.color(color));
                                    } else {
                                        polygon.set("fill", am5.color("#1c1c1c")); // Gris por defecto para datos faltantes
                                    }
                                });
                            });


                            // Tooltip dinámico
                            polygonSeries.mapPolygons.template.setAll({
                                tooltipText: "{name}: {cantidad} ",
                                toggleKey: "active",
                                interactive: true
                            });


                            polygonSeries.mapPolygons.template.states.create("hover", {
                                fill: root.interfaceColors.get("primaryButtonHover")
                            });

                            polygonSeries.mapPolygons.template.states.create("active", {
                                fill: root.interfaceColors.get("primaryButtonHover")
                            });

                            // Funcionalidad de selección y zoom
                            var previousPolygon;
                            polygonSeries.mapPolygons.template.on("active", function(active, target) {
                                if (previousPolygon && previousPolygon != target) {
                                    previousPolygon.set("active", false);
                                }
                                if (target.get("active")) {
                                    polygonSeries.zoomToDataItem(target.dataItem);
                                } else {
                                    chart.goHome();
                                }
                                previousPolygon = target;
                            });

                            // Configurar zoom y control de navegación
                            var zoomControl = chart.set("zoomControl", am5map.ZoomControl.new(root, {}));
                            zoomControl.homeButton.set("visible", true);

                            // Evento para restablecer el zoom al hacer clic en el fondo
                            chart.chartContainer.get("background").events.on("click", function() {
                                chart.goHome();
                            });

                            // Animación al cargar
                            chart.appear(1000, 100);
                        }); // end am5.ready()
                    </script>

                    <div id="chartdiv" style="height: 550px; width: 100%;">
                    </div>


                </div>
                <!-------fin del contenido-------->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Desarrollado &copy; PreAcoso</span>
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