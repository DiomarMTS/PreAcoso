<?php include '../includes/header.php' ?>

<br>
<div style="text-align: center;">
    <h1> Grafica de circular de los tipos de medidas propuestas</h1><br><br>
</div>

<div style="text-align: center;">
    <form id="yearForm" method="POST">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-1">
                <div>
                    <label for="anio1" class="form-label">año 1:</label>
                    <select class="form-select" name="anio1" id="anio1" required>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-1">
                <div>
                    <label for="anio2" class="form-label">año 2:</label>
                    <select class="form-select" name="anio2" id="anio2" required>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-primary mt-4">Actualizar Gráfico</button>
            </div>
        </div>
    </form>
</div>

<?php
$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

// Default years if not set
$anio1 = isset($_POST['anio1']) ? $_POST['anio1'] : 2019;
$anio2 = isset($_POST['anio2']) ? $_POST['anio2'] : 2022;

try {
    $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("
        SELECT 
            YEAR(c.fechaHecho) AS anio, 
            tm.descripcion AS tipo_medida, 
            COUNT(c.id_caso) AS total_casos 
        FROM 
            Caso c 
        INNER JOIN 
            TipoMedida tm ON c.id_tipoMedida = tm.id_tipoMedida 
        WHERE 
            YEAR(c.fechaHecho) IN (:anio1, :anio2) 
        GROUP BY 
            YEAR(c.fechaHecho), 
            tm.descripcion 
        ORDER BY 
            anio, 
            total_casos DESC
    ");

    $stmt->bindParam(':anio1', $anio1, PDO::PARAM_INT);
    $stmt->bindParam(':anio2', $anio2, PDO::PARAM_INT);
    $stmt->execute();

    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
}
?>

<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>


<!-- Chart code -->
<script>
    am5.ready(function() {
        // Global variables to store chart objects
        var root, chartContainer, chart, series, chart2, series2, legend;

        // Function to create or update charts
        function createOrUpdateCharts(rawData) {
            // Destroy existing chart if it exists
            if (root) {
                root.dispose();
            }

            // Create root element
            root = am5.Root.new("chartdiv");

            // Set themes
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            root.container.set("layout", root.verticalLayout);

            // Create container to hold charts
            chartContainer = root.container.children.push(am5.Container.new(root, {
                layout: root.horizontalLayout,
                width: am5.p100,
                height: am5.p100
            }));

            // Separate data for each year
            var dataYear1 = [];
            var dataYear2 = [];

            rawData.forEach(function(item) {
                var dataItem = {
                    category: item.tipo_medida,
                    value: parseInt(item.total_casos)
                };

                if (item.anio == document.getElementById('anio1').value) {
                    dataYear1.push(dataItem);
                } else if (item.anio == document.getElementById('anio2').value) {
                    dataYear2.push(dataItem);
                }
            });

            // Function to create chart
            function createPieChart(container, data, year) {
                var pieChart = container.children.push(
                    am5percent.PieChart.new(root, {
                        endAngle: 270,
                        innerRadius: am5.percent(60)
                    })
                );

                var pieSeries = pieChart.series.push(
                    am5percent.PieSeries.new(root, {
                        valueField: "value",
                        categoryField: "category",
                        endAngle: 270,
                        alignLabels: false
                    })
                );

                // Central label
                pieSeries.children.push(am5.Label.new(root, {
                    centerX: am5.percent(50),
                    centerY: am5.percent(50),
                    text: year + "\nTotal: {valueSum}",
                    populateText: true,
                    fontSize: "1.5em"
                }));

                pieSeries.slices.template.setAll({
                    cornerRadius: 8
                });

                pieSeries.states.create("hidden", {
                    endAngle: -90
                });

                pieSeries.labels.template.setAll({
                    textType: "circular"
                });

                pieSeries.data.setAll(data);

                return {
                    chart: pieChart,
                    series: pieSeries
                };
            }

            // Create first chart
            var chartData1 = createPieChart(chartContainer, dataYear1, document.getElementById('anio1').value);
            chart = chartData1.chart;
            series = chartData1.series;

            // Create second chart
            var chartData2 = createPieChart(chartContainer, dataYear2, document.getElementById('anio2').value);
            chart2 = chartData2.chart;
            series2 = chartData2.series;

            // Cross-interaction function
            function getSlice(dataItem, series) {
                var otherSlice;
                am5.array.each(series.dataItems, function(di) {
                    if (di.get("category") === dataItem.get("category")) {
                        otherSlice = di.get("slice");
                    }
                });
                return otherSlice;
            }

            // Add interaction events (similar to previous script)
            series.slices.template.events.on("pointerover", function(ev) {
                var slice = ev.target;
                var dataItem = slice.dataItem;
                var otherSlice = getSlice(dataItem, series2);
                if (otherSlice) {
                    otherSlice.hover();
                }
            });

            series.slices.template.events.on("pointerout", function(ev) {
                var slice = ev.target;
                var dataItem = slice.dataItem;
                var otherSlice = getSlice(dataItem, series2);
                if (otherSlice) {
                    otherSlice.unhover();
                }
            });

            series2.slices.template.events.on("pointerover", function(ev) {
                var slice = ev.target;
                var dataItem = slice.dataItem;
                var otherSlice = getSlice(dataItem, series);
                if (otherSlice) {
                    otherSlice.hover();
                }
            });

            series2.slices.template.events.on("pointerout", function(ev) {
                var slice = ev.target;
                var dataItem = slice.dataItem;
                var otherSlice = getSlice(dataItem, series);
                if (otherSlice) {
                    otherSlice.unhover();
                }
            });

            // Create legend
            legend = root.container.children.push(am5.Legend.new(root, {
                x: am5.percent(50),
                centerX: am5.percent(50)
            }));

            // Legend interaction
            legend.itemContainers.template.events.on("pointerover", function(ev) {
                var dataItem = ev.target.dataItem.dataContext;
                var slice1 = getSlice(dataItem, series);
                var slice2 = getSlice(dataItem, series2);
                if (slice1) slice1.hover();
                if (slice2) slice2.hover();
            });

            legend.itemContainers.template.events.on("pointerout", function(ev) {
                var dataItem = ev.target.dataItem.dataContext;
                var slice1 = getSlice(dataItem, series);
                var slice2 = getSlice(dataItem, series2);
                if (slice1) slice1.unhover();
                if (slice2) slice2.unhover();
            });

            // Set legend data
            legend.data.setAll(series.dataItems);

            // Animate appearance
            series.appear(1000, 100);
            series2.appear(1000, 100);
        }

        // Initial chart creation with PHP data
        var rawData = <?php echo json_encode($datos); ?>;
        createOrUpdateCharts(rawData);

        // Add event listener to form submission
        document.getElementById('yearForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // AJAX request to get new data
            var formData = new FormData(this);
            fetch(window.location.href, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(html => {
                    // Extract JSON data from the response
                    var tempDiv = document.createElement('div');
                    tempDiv.innerHTML = html;
                    var scriptTag = tempDiv.querySelector('script[type="application/json"]');

                    if (scriptTag) {
                        var newData = JSON.parse(scriptTag.textContent);
                        createOrUpdateCharts(newData);
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
</script>
<!-- HTML -->

<div id="chartdiv" style="  width: 100%; height: 500px;"></div>
<script type="application/json">
    <?php echo json_encode($datos); ?>
</script>


<?php include '../includes/footer.php' ?>