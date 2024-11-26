<?php
include '../includes/header.php';
require_once '../config/datos.php';

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

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/peruLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script>
    am5.ready(function() {
        // Paleta de colores (del más claro al más oscuro)
        var colors = ["#E9BCB9", "#ED9E59", "#A34054", "#662249", "#44174E", "#1B1931"];

        // Datos de departamentos desde PHP
        var departamentosData = <?php echo json_encode($departamentos); ?>;

        console.log("Datos de departamentos desde PHP:", departamentosData);

        // Crear objeto de mapeo de cantidades
        var departamentoCantidades = {};
        departamentosData.forEach(function(item) {
            // Normalizar nombres de departamentos
            var departamentoNormalizado = normalizedDepartamentoName(item.Departamento);
            departamentoCantidades[departamentoNormalizado] = item.TotalCasos;
        });

        console.log("Mapa de cantidades por departamento:", departamentoCantidades);

        // Función para normalizar nombres de departamentos
        function normalizedDepartamentoName(nombre) {
            return nombre
                .normalize("NFD")
                .replace(/[\u0300-\u036f]/g, "") // Eliminar acentos
                .toUpperCase()
                .replace(/\s+/g, ''); // Eliminar espacios
        }

        // Calcular el valor máximo para normalización
        var maxCantidad = Math.max(...departamentosData.map(item => item.TotalCasos));

        console.log("Cantidad máxima de casos:", maxCantidad);

        // Inicializar mapa
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

            // Asegurar que el índice esté dentro del rango
            normalizedIndex = Math.min(Math.max(normalizedIndex, 0), colors.length - 1);

            console.log(`Departamento: ${departamento}, Cantidad: ${cantidad}, Color: ${colors[normalizedIndex]}`);

            return colors[normalizedIndex];
        }

        // Aplicar colores a los polígonos después de validar los datos
        polygonSeries.events.on("datavalidated", function() {
            polygonSeries.mapPolygons.each(function(polygon) {
                var departamento = polygon.dataItem.dataContext.name;
                if (departamento) {
                    var color = getColorForDepartamento(departamento);
                    polygon.set("fill", am5.color(color));
                } else {
                    polygon.set("fill", am5.color("#1c1c1c")); // Gris por defecto para datos faltantes
                }
            });
        });

        // Tooltip dinámico
        polygonSeries.mapPolygons.template.setAll({
            tooltipText: function(target) {
                if (!target.dataItem || !target.dataItem.dataContext) return "Sin datos";
                var departamento = target.dataItem.dataContext.name;
                var departamentoNormalizado = normalizedDepartamentoName(departamento);
                var cantidad = departamentoCantidades[departamentoNormalizado] || 0;
                return departamento + ": " + cantidad + " casos";
            },
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


<section style="height: 94vh;
  background: -webkit-gradient(linear, left top, right top, from(#864ddf), to(#203376));
  background: linear-gradient(to right, #864ddf, #203376);">
    <div id="chartdiv" class="col-10" style="width: 100%; height: 700px"></div>
</section>
<?php include '../includes/footer.php'; ?>