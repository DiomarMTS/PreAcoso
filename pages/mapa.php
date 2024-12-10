<?php
include '../config/datos.php';
include '../config/conexion.php';

session_start();

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

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>PreAcoso</title>

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css" />

    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="../assets/css/style.css" rel="stylesheet" />
    <link href="../assets/css/responsive.css" rel="stylesheet" />
    <link href="../assets/css/report.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body class="sub_page" style="height: 94vh; 
              background: -webkit-gradient(linear, left top, right top, from(#864ddf), to(#203376)); 
              background: linear-gradient(to right, #864ddf, #203376); height: auto;">
    <div class="hero_area">
        <header class="header_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <nav class="navbar navbar-expand-lg custom_nav-container ">
                            <a class="navbar-brand" href="../index.php">
                                <span>
                                    PreAcoso
                                </span>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="d-flex  flex-column flex-lg-row align-items-center">
                                    <ul class="navbar-nav  ">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="../index.php">Inicio <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="about.php">Inormacion </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="service.php">Servicios </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.php">Contactenos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="mapa.php">Ver Mapa</a>
                                        </li>
                                        <?php if (isset($_SESSION['first'])): ?>
                                            <!-- Dropdown para usuario logueado -->
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <?php echo htmlspecialchars($_SESSION['first']); ?>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="userDropdown">
                                                    <a class="dropdown-item" href="profile.php">Perfil</a>
                                                    <a class="dropdown-item" href="logout.php">Cerrar sesión</a>
                                                </div>
                                            </li>
                                        <?php else: ?>
                                            <!-- Enlace de login si no hay usuario logueado -->
                                            <li class="nav-item">
                                                <a class="nav-link" href="login.php">Login</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/peruLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <script>
        am5.ready(function() {
            var colors = ["#6782dc", "#ED9E59", "#A34054", "#662249", "#44174E", "#1B1931"];

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

    <div class="row"
        style="height: 94vh; 
              background: -webkit-gradient(linear, left top, right top, from(#864ddf), to(#203376)); 
              background: linear-gradient(to right, #864ddf, #203376); height: auto;">

        <!-- Columna izquierda -->
        <div class="col-12 col-md-2 " style="background-color: #ffff;">
            <div class="d-grid gap-2 mt-3 px-2">
                <button class="btn btn-info text-white">AYUDA</button>
                <button class="btn btn-success text-white">LIMPIAR</button>
            </div>

            <!-- Menú vertical -->
            <div class="list-group mt-3">
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-person-fill me-2"></i> DELITOS
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-exclamation-circle-fill me-2"></i> FALTAS
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-people-fill me-2"></i> VÍCTIMAS
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-person-badge-fill me-2"></i> VICTIMARIOS
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-house-door-fill me-2"></i> VICTIMIZACIÓN A HOGARES
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-shield-lock-fill me-2"></i> SEGURIDAD MUNICIPAL
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-tree-fill me-2"></i> SUPERFICIE DE SIEMBRA CON HOJA DE COCA
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-bank2 me-2"></i> GOBERNABILIDAD
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-building-fill me-2"></i> DEPENDENCIAS POLICIALES
                </a>
                <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bi bi-globe me-2"></i> CLASIFICACIÓN INTERNACIONAL DE DELITOS
                </a>
            </div>

            <!-- Footer con logo -->
            <div class="text-center mt-4">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/30/Sustainable_Development_Goals_logo.png/800px-Sustainable_Development_Goals_logo.png"
                    alt="ODS Logo" class="img-fluid mb-2" style="max-width: 100px;">
                <p class="mb-0">OBJETIVOS DE DESARROLLO SOSTENIBLE</p>
            </div>


        </div>

        <!-- Columna derecha -->
        <div class="col-12 col-md-8" id="chartdiv" style="height: 800px;">
        </div>

        <div class="col-12 col-md-2">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h6 class="card-title">Población de 15 y más, víctima de algún hecho de acoso en instituciones</h6>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center">
                            <span class="legend-color" style="background-color: #6782dc;"></span> De 29,3 a 33,1
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="legend-color" style="background-color: #ED9E59;"></span> De 25,5 a 29,3
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="legend-color" style="background-color: #A34054;"></span> De 21,7 a 25,5
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="legend-color" style="background-color: #662249;"></span> De 17,9 a 21,7
                        </li>
                        <li class="d-flex align-items-center">
                            <span class="legend-color" style="background-color: #44174E;"></span> De 14,1 a 17,9
                        </li>
                    </ul>
                    <p class="card-text">
                        <small>
                            Fuente: Instituto Nacional de Estadística e Informática – Encuesta Nacional de Programas
                        </small>
                    </p>
                </div>
            </div>
        </div>

    </div>

    <?php include '../includes/footer.php'; ?>