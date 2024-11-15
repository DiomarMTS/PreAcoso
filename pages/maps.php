<?php include '../includes/header.php' ?>


<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/peruLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
    am5.ready(function() {

        // Create root element
        var root = am5.Root.new("chartdiv");

        // Set themes
        root.setThemes([
            am5themes_Animated.new(root)
        ]);

        // Create the map chart
        var chart = root.container.children.push(am5map.MapChart.new(root, {
            panX: "translateX",
            panY: "translateY",
            projection: am5map.geoMercator()
        }));

        // Create main polygon series for Peru
        var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
            geoJSON: am5geodata_peruLow // Cambia a `peruLow` para mostrar solo Perú
        }));

        polygonSeries.mapPolygons.template.setAll({
            tooltipText: "{name}",
            toggleKey: "active",
            interactive: true
        });

        polygonSeries.mapPolygons.template.states.create("hover", {
            fill: root.interfaceColors.get("primaryButtonHover")
        });

        polygonSeries.mapPolygons.template.states.create("active", {
            fill: root.interfaceColors.get("primaryButtonHover")
        });

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

        // Add zoom control
        var zoomControl = chart.set("zoomControl", am5map.ZoomControl.new(root, {}));
        zoomControl.homeButton.set("visible", true);

        // Set clicking on "water" to zoom out
        chart.chartContainer.get("background").events.on("click", function() {
            chart.goHome();
        });

        // Make stuff animate on load
        chart.appear(1000, 100);

    }); // end am5.ready()
</script>

<!-- HTML -->
<section style="height: 94vh;
  background: -webkit-gradient(linear, left top, right top, from(#864ddf), to(#203376));
  background: linear-gradient(to right, #864ddf, #203376);">

    <div class="container">
        <div class="row">
            <div class="col-2" style="background: #ffff;">

            </div>
            <div id="chartdiv" class="col-10" style="width: 100%;height: 700px">
            </div>
        </div>

    </div>
</section>

<?php include '../includes/footer.php' ?>