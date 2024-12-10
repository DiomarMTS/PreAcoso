<?php include '../includes/header.php' ?>

<?php

$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consulta SQL para obtener los 
    $stmt = $pdo->prepare(" SELECT 
    YEAR(c.fechaHecho) AS anio,
    MONTH(c.fechaHecho) AS mes,
    dpto.nombre AS departamento,
    COUNT(c.id_caso) AS total_casos
FROM Caso c
INNER JOIN InsEducativa ins ON c.id_institucion = ins.id_institucion
INNER JOIN Distrito dist ON ins.id_Distrito = dist.id_Distrito
INNER JOIN Provincia prov ON dist.id_Provincia = prov.id_Provincia
INNER JOIN Departamento dpto ON prov.id_departamento = dpto.id_departamento
GROUP BY YEAR(c.fechaHecho), MONTH(c.fechaHecho), dpto.nombre
ORDER BY anio, mes, departamento;
    ");
    $stmt->execute();


    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}
?>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function() {
        // Create root element
        var root = am5.Root.new("chartdiv");

        const myTheme = am5.Theme.new(root);

        myTheme.rule("AxisLabel", ["minor"]).setAll({
            dy: 1
        });

        myTheme.rule("Grid", ["x"]).setAll({
            strokeOpacity: 0.05
        });

        // Set themes
        root.setThemes([
            am5themes_Animated.new(root),
            myTheme
        ]);

        // Create chart
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
            panX: true,
            panY: true,
            wheelX: "panX",
            wheelY: "zoomX",
            maxTooltipDistance: 0,
            pinchZoomX: true
        }));

        // Prepare data from PHP
        var rawData = <?php echo json_encode($datos); ?>;

        // Process data into series-friendly format
        var seriesData = {};
        rawData.forEach(function(item) {
            var date = new Date(item.anio, item.mes - 1, 1);
            var dateKey = date.getTime();

            if (!seriesData[item.departamento]) {
                seriesData[item.departamento] = [];
            }

            seriesData[item.departamento].push({
                date: dateKey,
                value: parseInt(item.total_casos)
            });
        });

        // Create axes
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
            maxDeviation: 0.2,
            baseInterval: {
                timeUnit: "month",
                count: 1
            },
            renderer: am5xy.AxisRendererX.new(root, {
                minorGridEnabled: true
            }),
            tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
            renderer: am5xy.AxisRendererY.new(root, {})
        }));

        // Color set for different series
        var colorSet = am5.ColorSet.new(root, {});

        // Add series for each department
        Object.keys(seriesData).forEach(function(departamento) {
            var series = chart.series.push(am5xy.LineSeries.new(root, {
                name: departamento,
                xAxis: xAxis,
                yAxis: yAxis,
                valueYField: "value",
                valueXField: "date",
                legendValueText: "{valueY}",
                fill: colorSet.next(),
                stroke: colorSet.next(),
                tooltip: am5.Tooltip.new(root, {
                    pointerOrientation: "horizontal",
                    labelText: departamento + ": {valueY} casos"
                })
            }));

            // Set data for this series
            series.data.setAll(seriesData[departamento]);

            // Make stuff animate on load
            series.appear();
        });

        // Add cursor
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
            behavior: "xy"
        }));
        cursor.lineY.set("visible", false);

        // Add scrollbar
        chart.set("scrollbarX", am5.Scrollbar.new(root, {
            orientation: "horizontal"
        }));

        // Add legend
        var legend = chart.rightAxesContainer.children.push(am5.Legend.new(root, {
            width: 200,
            paddingLeft: 15,
            height: am5.percent(100)
        }));

        // Legend hover effects
        legend.itemContainers.template.events.on("pointerover", function(e) {
            var itemContainer = e.target;
            var series = itemContainer.dataItem.dataContext;

            chart.series.each(function(chartSeries) {
                if (chartSeries != series) {
                    chartSeries.strokes.template.setAll({
                        strokeOpacity: 0.15,
                        stroke: am5.color(0x000000)
                    });
                } else {
                    chartSeries.strokes.template.setAll({
                        strokeWidth: 3
                    });
                }
            });
        });

        legend.itemContainers.template.events.on("pointerout", function(e) {
            chart.series.each(function(chartSeries) {
                chartSeries.strokes.template.setAll({
                    strokeOpacity: 1,
                    strokeWidth: 1
                });
            });
        });

        // Set legend data
        legend.data.setAll(chart.series.values);

        // Make stuff animate on load
        chart.appear(1000, 100);
    });
</script>

<!-- HTML -->
<br>
<div style="text-align: center;">
    <h1> Grafica de linea de casos reportados por cada region segun la fecha</h1><br><br>
</div>
<div id="chartdiv" style="  width: 100%; height: 500px; max-width: 100%;"></div>


<?php include '../includes/footer.php' ?>