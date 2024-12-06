<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sigue tu caso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #6a0dad;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            flex-direction: column;
        }

        .header-image {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: cover;
            display: block;
            margin: 0 auto;
            /* Centra la imagen */
        }

        .container {
            max-width: 1500px;
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .breadcrumb {
            font-size: 14px;
            color: #6a0dad;
            margin-bottom: 20px;
        }

        .breadcrumb a {
            text-decoration: none;
            color: #6a0dad;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        h1 {
            color: #6a0dad;
            font-size: 24px;
            margin-bottom: 10px;
            text-align: center;
            /* Centra el título */
        }

        p {
            font-size: 16px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            /* Centra el párrafo */
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
            display: flex;
            justify-content: center;
        }

        input[type="text"] {
            width: 80%;
            /* Ajusta el ancho del campo */
            max-width: 400px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
            /* Centra el texto dentro del campo */
        }

        .buttons {
            display: flex;
            gap: 10px;
            justify-content: center;
            width: 100%;
        }

        .buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: auto;
        }

        .buttons .search-btn {
            background-color: #6a0dad;
            color: #fff;
        }

        .buttons .search-btn:hover {
            background-color: #5b0d91;
        }

        .buttons .clear-btn {
            background-color: #ff4d4d;
            color: #fff;
        }

        .buttons .clear-btn:hover {
            background-color: #cc0000;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ddd;
            width: 100%;
        }

        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            text-align: left;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Estilos para pantallas grandes (desktops y tabletas) */
        @media (min-width: 769px) {
            img.tamaño {
                width: 100%;
                max-height: 500px;
                height: auto;
                object-fit: cover;
                display: block;
                margin: 0 auto;
            }

            table th,
            table td {
                color: #000;
            }

            table th {
                color: #6a0dad;
            }
        }

        /* Estilos para pantallas pequeñas (móviles) */
        @media (max-width: 768px) {
            img.tamaño {
                width: 100%;
                display: block;
                margin: 0 auto;
                max-width: 100%;
                height: auto;
            }

            table {
                display: block;
                width: 100%;
                overflow-x: auto;
                margin: 20px auto;
                /* Aumentar el margen de la tabla */
            }

            thead {
                display: none;
            }

            tr {
                display: block;
                margin-bottom: 20px;
                /* Aumentar el espacio entre filas */
            }

            td {
                display: block;
                text-align: right;
                position: relative;
                padding-left: 50%;
                padding-right: 15px;
                /* Aumentar el espacio a la derecha */
                margin-bottom: 20px;
                /* Aumentar espacio entre las celdas */
                border: 1px solid #ddd;
                font-size: 16px;
                /* Aumentar el tamaño de la fuente */
                padding-top: 15px;
                /* Añadir más espacio arriba */
                padding-bottom: 15px;
                /* Añadir más espacio abajo */
            }

            td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                font-size: 16px;
                /* Aumentar tamaño de las etiquetas */
            }

            table th,
            table td {
                color: #000;
            }

            table th {
                color: #6a0dad;
                font-size: 18px;
                /* Aumentar tamaño de la fuente de los encabezados */
                padding-top: 20px;
                /* Añadir más espacio al encabezado */
                padding-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <img class="tamaño" src="../assets/images/fondo-consultar.webp" alt="Imagen de niños">
    <div class="container">
        <div class="breadcrumb">
            <a href="../index.php">Inicio</a> / Sigue tu caso
        </div>
        <h1>Sigue tu caso</h1>
        <p>Bienvenido (a):<br> En esta sección podrás conocer las acciones que se vienen realizando para la atención del caso de violencia escolar reportado.</p>

        <div class="form-group">
            <input type="text" id="numDocumento" placeholder="Ingrese su número de documento">
        </div>

        <div class="buttons">
            <button class="search-btn" onclick="buscarCaso()">Buscar Caso</button>
            <button class="clear-btn" onclick="limpiarFormulario()">Limpiar</button>
        </div>

        <hr>

        <div id="resultado"></div>
    </div>

    <script>
        function buscarCaso() {
            const numDocumento = document.getElementById('numDocumento').value;

            // Expresión regular que acepta letras y números (ej: A67654677 o CE123454)
            if (!/^[A-Za-z0-9]{8,12}$/.test(numDocumento)) {
                alert('Por favor ingrese un número de documento válido (8 a 12 caracteres alfanuméricos).');
                return;
            }

            const resultadoDiv = document.getElementById('resultado');
            resultadoDiv.innerHTML = ''; // Limpia cualquier contenido previo.

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../config/procesarCaso.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.error) {
                        alert(response.error);
                        return;
                    }

                    if (response.length === 0) {
                        resultadoDiv.innerHTML = `
                            <p>No se encontraron resultados para este número de documento.</p>
                        `;
                    } else {
                        let tableHTML = `
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha del Hecho</th>
                                        <th>Cargo del Agresor</th>
                                        <th>Tipo de Violencia</th>
                                        <th>Norma Aplicable</th>
                                        <th>Tipo de Medida</th>
                                        <th>Institución Educativa</th>
                                        <th>Resultado de Evaluación</th>
                                        <th>Fecha de Evaluación</th>
                                        <th>Fecha Final de Evaluación</th>
                                    </tr>
                                </thead>
                                <tbody>
                        `;
                        response.forEach(row => {
                            tableHTML += `
                                <tr>
                                    <td data-label="Nombre">${row.NombreAgraviado}</td>
                                    <td data-label="Fecha del Hecho">${row.FechaHecho}</td>
                                    <td data-label="Cargo del Agresor">${row.CargoDelAgresor}</td>
                                    <td data-label="Tipo de Violencia">${row.TipoDeViolencia}</td>
                                    <td data-label="Norma Aplicable">${row.NormaAplicable}</td>
                                    <td data-label="Tipo de Medida">${row.TipoDeMedida}</td>
                                    <td data-label="Institución Educativa">${row.InstitucionEducativa}</td>
                                    <td data-label="Resultado de Evaluación">${row.ResultadoEvaluacion}</td>
                                    <td data-label="Fecha de Evaluación">${row.FechaEvaluacion}</td>
                                    <td data-label="Fecha Final de Evaluación">${row.FechaFinalEvaluacion}</td>
                                </tr>
                            `;
                        });
                        tableHTML += '</tbody></table>';
                        resultadoDiv.innerHTML = tableHTML;
                    }
                }
            };
            xhr.send('numDocumento=' + numDocumento);
        }

        function limpiarFormulario() {
            document.getElementById('numDocumento').value = '';
            document.getElementById('resultado').innerHTML = '';
        }
    </script>
</body>

</html>