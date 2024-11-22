<?php require_once '../includes/header.php' ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Datos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
    .container {
        justify-content: center;
    }

    /* Para pantallas pequeñas */
    @media (max-width: 768px) {
        .clase-personalizada {
            font-size: 24px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Centra los gráficos */
            gap: 70px;
            /* Reduce el espacio entre gráficos */
            margin: 10px;
            /* Espacio alrededor de la caja */
        }

        .chart-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Centrar horizontalmente */
            width: 100%;
            /* Asegura que los gráficos ocupen el ancho completo en pantallas pequeñas */
            margin: 10px 0;
            /* Espaciado vertical */
        }

        .chart-section canvas {
            max-width: 100%;
            /* Asegura que el gráfico sea responsivo */
            width: 90%;
            /* Controla el ancho del gráfico */
            /* Mantiene la proporción */
        }

        .chart-section h2 {
            text-align: center;
            margin-bottom: 10px;
            /* Espaciado entre título y gráfico */
        }
    }

    /* Para pantallas grandes */
    @media (min-width: 869px) {
        .clase-personalizada {
            font-size: 30px;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            /* Centra los gráficos */
            gap: 30px;
            /* Mayor espacio entre gráficos */
            margin: 30px;
            /* Más espacio alrededor de la caja */
        }

        .chart-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* Centra los gráficos */
            width: 70%;
            /* Cada gráfico ocupa un 30% del ancho */
            margin: 20px 0;
            /* Espaciado vertical */
        }

        .chart-section canvas {
            max-width: 100%;
            /* Asegura que el gráfico sea responsivo */
            width: 100%;
            /* Controla el ancho del gráfico */
            height: 700px;
            /* Ajusta la altura en pantallas grandes */
        }

        .chart-section h2 {
            text-align: center;
            margin-bottom: 20px;
            /* Mayor espaciado entre título y gráfico */
        }
    }

    /* Ajustar el tamaño del gráfico de filtro por ubicación */
    #graficoFiltroUbicacion {
        width: 300px !important;
        /* Ajustar el ancho */
        height: 300px !important;
        /* Ajustar la altura */
    }
    </style>


</head>

<body>
    <div>
        <!-- end welcome section -->
        <div class="container">

            <div class="chart-section">
                <h2>Distribución de Tipos de Violencia</h2>
                <canvas id="graficoViolencia"></canvas>
            </div>

            <div class="chart-section">
                <h2>Evolución de Casos por Fecha</h2>
                <canvas id="graficoEvolucion"></canvas>
            </div>


            <div class="chart-section">
                <h2>Distribución de Cargos de Agresores</h2>
                <canvas id="graficoCargosAgresores"></canvas>
            </div>
            <div class="chart-section">
                <h2>Normas aplicadas</h2>
                <canvas id="graficoNormasAplicadas"></canvas>
            </div>
        </div>

        <script>
        $(document).ready(function() {
            function cargarDatos() {
                $.ajax({
                    url: '../config/consulta.php',
                    method: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var filas = '';
                        var tiposViolencia = {};
                        var casosPorFecha = {};
                        var cargosAgresores = {};
                        var normasAplicadas = {};
                        var tiposMedida = {};

                        $.each(data, function(index, item) {
                            filas += '<tr>' +
                                '<td>' + item.id_Caso + '</td>' +
                                '<td>' + item.fechaHecho + '</td>' +
                                '<td>' + item.cargoAgresor + '</td>' +
                                '<td>' + item.tipoViolencia + '</td>' +
                                '<td>' + item.NombreUsuario + '</td>' +
                                '<td>' + item.ApellidoUsuario + '</td>' +
                                '<td>' + item.InstitucionEducativa + '</td>' +
                                '<td>' + item.NormaAplicada + '</td>' +
                                '<td>' + item.TipoMedida + '</td>' +
                                '</tr>';

                            // Agrupar por tipo de violencia
                            if (tiposViolencia[item.tipoViolencia]) {
                                tiposViolencia[item.tipoViolencia]++;
                            } else {
                                tiposViolencia[item.tipoViolencia] = 1;
                            }

                            // Agrupar por fecha
                            var fecha = item.fechaHecho.split(' ')[0];
                            if (casosPorFecha[fecha]) {
                                casosPorFecha[fecha]++;
                            } else {
                                casosPorFecha[fecha] = 1;
                            }

                            // Agrupar por cargo de agresor
                            if (cargosAgresores[item.cargoAgresor]) {
                                cargosAgresores[item.cargoAgresor]++;
                            } else {
                                cargosAgresores[item.cargoAgresor] = 1;
                            }

                            // Agrupar por norma aplicada
                            if (normasAplicadas[item.NormaAplicada]) {
                                normasAplicadas[item.NormaAplicada]++;
                            } else {
                                normasAplicadas[item.NormaAplicada] = 1;
                            }

                            // Agrupar por tipo de medida
                            if (tiposMedida[item.TipoMedida]) {
                                tiposMedida[item.TipoMedida]++;
                            } else {
                                tiposMedida[item.TipoMedida] = 1;
                            }
                        });

                        // Poblar la tabla
                        $('#tablaDatos tbody').html(filas);

                        // Generar gráficos
                        generarGrafico(tiposViolencia);
                        generarGraficoEvolucion(casosPorFecha);
                        generarGraficoCargosAgresores(cargosAgresores);
                        generarGraficoNormasAplicadas(normasAplicadas); // Nuevo gráfico
                    },
                    error: function(xhr, status, error) {
                        console.error('Error en la solicitud AJAX: ' + error);
                    }
                });
            }

            // Gráfico de distribución de tipos de violencia (horizontal)
            function generarGrafico(tiposViolencia) {
                var ctx = document.getElementById('graficoViolencia').getContext('2d');
                var labels = Object.keys(tiposViolencia);
                var data = Object.values(tiposViolencia);

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Distribución de tipos de violencia',
                            data: data,
                            backgroundColor: '#FF6F61',
                            borderColor: '#D85B3B',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        indexAxis: 'y',
                        plugins: {
                            title: {
                                display: true,
                                font: {
                                    size: 18
                                }
                            },
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Cantidad de casos'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Tipos de violencia'
                                }
                            }
                        }
                    }
                });
            }

            // Gráfico de evolución de casos por fecha
            function generarGraficoEvolucion(casosPorFecha) {
                var ctx = document.getElementById('graficoEvolucion').getContext('2d');
                var labels = Object.keys(casosPorFecha).reverse();
                var data = Object.values(casosPorFecha).reverse();

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Evolución de casos por fecha',
                            data: data,
                            fill: false,
                            borderColor: '#33C1FF',
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                font: {
                                    size: 18
                                }
                            },
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Fecha'
                                }
                            },
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Cantidad de casos'
                                }
                            }
                        }
                    }
                });
            }

            // Gráfico de distribución de cargos de agresores
            function generarGraficoCargosAgresores(cargosAgresores) {
                var ctx = document.getElementById('graficoCargosAgresores').getContext('2d');
                var labels = Object.keys(cargosAgresores);
                var data = Object.values(cargosAgresores);

                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Distribución de Cargos de Agresores',
                            data: data,
                            backgroundColor: ['#FF5733', '#FFBD33', '#33FF57', '#3357FF'],
                            borderColor: '#fff',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                font: {
                                    size: 18
                                }
                            },
                            legend: {
                                position: 'top'
                            }
                        }
                    }
                });
            }

            // Nuevo gráfico: Distribución de normas aplicadas
            function generarGraficoNormasAplicadas(normasAplicadas) {
                var ctx = document.getElementById('graficoNormasAplicadas').getContext('2d');
                var labels = Object.keys(normasAplicadas);
                var data = Object.values(normasAplicadas);

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Distribución de normas aplicadas',
                            data: data,
                            backgroundColor: '#76D7C4', // Verde claro
                            borderColor: '#48C9B0', // Verde más intenso
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        indexAxis: 'y', // Esto hará que el gráfico sea horizontal
                        plugins: {
                            title: {
                                display: true,
                                font: {
                                    size: 18
                                }
                            },
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Cantidad de casos'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Normas aplicadas'
                                }
                            }
                        }
                    }
                });
            }


            setInterval(cargarDatos, 30000); // Cargar datos cada 30 segundos
            cargarDatos(); // Cargar datos inicialmente
        });
        </script>

        <h1>Filtro por Ubicación</h1>

        <!-- Filtros -->
        <div>
            <label for="departamento">Departamento:</label>
            <select id="departamento">
                <option value="">Seleccione un Departamento</option>
            </select>

            <label for="provincia">Provincia:</label>
            <select id="provincia" disabled>
                <option value="">Seleccione una Provincia</option>
            </select>

            <label for="distrito">Distrito:</label>
            <select id="distrito" disabled>
                <option value="">Seleccione un Distrito</option>
            </select>

            <button id="filtrar">Aplicar Filtros</button>
        </div>

        <div id="resultados">
            <!-- Resultados del filtro -->
        </div>

        <!-- Contenedor para el gráfico -->
        <div class="clase-personalizada">
            <canvas id="grafico" width="200" height="90"></canvas>

            <script>
            $(document).ready(function() {
                const apiUrl = '../config/consulta2.php';
                let chart; // Variable para almacenar el gráfico

                // Inicializar el gráfico vacío
                // Inicializar el gráfico vacío
                function inicializarGrafico() {
                    const ctx = document.getElementById('grafico').getContext('2d');
                    chart = new Chart(ctx, {
                        type: 'bar', // Mantiene el tipo de gráfico como 'bar'
                        data: {
                            labels: [], // Etiquetas dinámicas
                            datasets: [{
                                label: 'Casos por Tipo de Violencia',
                                data: [], // Datos dinámicos
                                backgroundColor: 'rgba(255,93,177,1)',
                                borderColor: 'rgba(255,93,177,3)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            indexAxis: 'y', // Configura las barras de manera horizontal
                            scales: {
                                x: {
                                    beginAtZero: true // Asegura que el eje X comience desde cero                
                                },
                                y: {
                                    beginAtZero: true // Asegura que el eje Y también comience desde cero
                                }
                            }
                        }
                    });
                }


                // Actualizar el gráfico con nuevos datos
                function actualizarGrafico(data) {
                    const tiposViolencia = {};
                    data.forEach(item => {
                        tiposViolencia[item.TipoViolencia] = (tiposViolencia[item.TipoViolencia] || 0) +
                            1;
                    });

                    // Actualiza las etiquetas y los datos del gráfico
                    chart.data.labels = Object.keys(tiposViolencia);
                    chart.data.datasets[0].data = Object.values(tiposViolencia);
                    chart.update();
                }

                // Cargar departamentos al inicio
                function cargarDepartamentos() {
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            let opciones = '<option value="">Seleccione un Departamento</option>';
                            const departamentos = [...new Set(data.map(item => item.Departamento))];
                            departamentos.forEach(dep => {
                                opciones += `<option value="${dep}">${dep}</option>`;
                            });
                            $('#departamento').html(opciones);
                        },
                        error: function() {
                            alert("Error al cargar departamentos.");
                        }
                    });
                }

                // Configuración para los filtros
                $('#departamento').change(function() {
                    const departamentoSeleccionado = $(this).val();
                    if (departamentoSeleccionado) {
                        $.ajax({
                            url: apiUrl,
                            method: 'GET',
                            data: {
                                departamento: departamentoSeleccionado
                            },
                            dataType: 'json',
                            success: function(data) {
                                let opciones =
                                    '<option value="">Seleccione una Provincia</option>';
                                const provincias = [...new Set(data.map(item => item
                                    .Provincia))];
                                provincias.forEach(prov => {
                                    opciones +=
                                        `<option value="${prov}">${prov}</option>`;
                                });
                                $('#provincia').html(opciones).prop('disabled', false);
                                $('#distrito').html(
                                        '<option value="">Seleccione un Distrito</option>')
                                    .prop(
                                        'disabled', true);
                            },
                            error: function() {
                                alert("Error al cargar provincias.");
                            }
                        });
                    } else {
                        $('#provincia, #distrito').html(
                                '<option value="">Seleccione una opción</option>')
                            .prop(
                                'disabled', true);
                    }
                });

                $('#provincia').change(function() {
                    const departamentoSeleccionado = $('#departamento').val();
                    const provinciaSeleccionada = $(this).val();
                    if (provinciaSeleccionada) {
                        $.ajax({
                            url: apiUrl,
                            method: 'GET',
                            data: {
                                departamento: departamentoSeleccionado,
                                provincia: provinciaSeleccionada
                            },
                            dataType: 'json',
                            success: function(data) {
                                let opciones =
                                    '<option value="">Seleccione un Distrito</option>';
                                const distritos = [...new Set(data.map(item => item
                                    .Distrito))];
                                distritos.forEach(dis => {
                                    opciones +=
                                        `<option value="${dis}">${dis}</option>`;
                                });
                                $('#distrito').html(opciones).prop('disabled', false);
                            },
                            error: function() {
                                alert("Error al cargar distritos.");
                            }
                        });
                    } else {
                        $('#distrito').html('<option value="">Seleccione un Distrito</option>').prop(
                            'disabled',
                            true);
                    }
                });

                $('#filtrar').click(function() {
                    const filtros = {
                        departamento: $('#departamento').val(),
                        provincia: $('#provincia').val(),
                        distrito: $('#distrito').val()
                    };
                    $.ajax({
                        url: apiUrl,
                        method: 'GET',
                        data: filtros,
                        dataType: 'json',
                        success: function(data) {
                            if (data.length > 0) {
                                //Por consola
                                console.log(data);
                                /*let resultados = '<ul>';
                                data.forEach(item => {
                                    resultados += `<li>${item.Departamento} - ${item.Provincia} - ${item.Distrito} - ${item.Fecha}</li>`;
                                });
                                resultados += '</ul>';
                                $('#resultados').html(resultados);*/

                                // Actualizar el gráfico
                                actualizarGrafico(data);
                            } else {
                                $('#resultados').html(
                                    '<p>No se encontraron resultados con los filtros seleccionados.</p>'
                                );
                                chart.data.labels = [];
                                chart.data.datasets[0].data = [];
                                chart.update();
                            }
                        },
                        error: function() {
                            alert("Error al aplicar filtros.");
                        }
                    });
                });

                // Inicializar
                cargarDepartamentos();
                inicializarGrafico();
            });
            </script>
        </div>



        <div class="footer_bg">
            <!-- info section -->
            <section class="info_section layout_padding2-bottom">
                <div class="container">
                    <h3 class="">
                        BigWing
                    </h3>
                </div>
                <div class="container info_content">

                    <div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="d-flex">
                                    <h5>
                                        Useful Link
                                    </h5>
                                </div>
                                <div class="d-flex ">
                                    <ul>
                                        <li>
                                            <a href="">
                                                About Us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                About services
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                About Departments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Services
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="ml-3 ml-md-5">
                                        <li>
                                            <a href="">
                                                Loram ipusm
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Loram ipusm
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Loram ipusm
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Loram ipusm
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Loram ipusm
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="d-flex">
                                    <h5>
                                        The Services
                                    </h5>
                                </div>
                                <div class="d-flex ">
                                    <ul>
                                        <li>
                                            <a href="">
                                                About Us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                About services
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                About Departments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Services
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="ml-3 ml-md-5">
                                        <li>
                                            <a href="">
                                                Lorem ipsum dolor
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                sit amet, consectetur
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                adipiscing elit,
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                sed do eiusmod
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                tempor incididunt
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="d-flex">
                                    <h5>
                                        Contact Us
                                    </h5>
                                </div>
                                <div class="d-flex ">
                                    <ul>
                                        <li>
                                            <a href="">
                                                About Us
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                About services
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                About Departments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Services
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                Contact Us
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="ml-3 ml-md-5">
                                        <li>
                                            <a href="">
                                                Lorem ipsum
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                dolor sit amet,
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                consectetur
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                adipiscing
                                            </a>
                                        </li>
                                        <li>
                                            <a href="">
                                                elit, sed do eiusmod
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-baseline">
                        <div class="social-box">
                            <a href="">
                                <img src="images/fb.png" alt="" />
                            </a>

                            <a href="">
                                <img src="images/twitter.png" alt="" />
                            </a>
                            <a href="">
                                <img src="images/linkedin1.png" alt="" />
                            </a>
                            <a href="">
                                <img src="images/instagram1.png" alt="" />
                            </a>
                        </div>
                        <div class="form_container mt-5">
                            <form action="">
                                <label for="subscribeMail">
                                    Newsletter
                                </label>
                                <input type="email" placeholder="Enter Your email" id="subscribeMail" />
                                <button type="submit">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </section>

            <!-- end info_section -->

            <?php require_once '../includes/footer.php' ?>
</body>

</html>
