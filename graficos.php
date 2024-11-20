<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualización de Datos</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>Datos de Casos</h1>
    <table id="tablaDatos" border="1">
        <thead>
            <tr>
                <th>ID Caso</th>
                <th>Fecha Hecho</th>
                <th>Cargo Agresor</th>
                <th>Tipo Violencia</th>
                <th>Nombre Usuario</th>
                <th>Apellido Usuario</th>
                <th>Institución Educativa</th>
                <th>Norma Aplicada</th>
                <th>Tipo Medida</th>
            </tr>
        </thead>
        <tbody>
            <!-- Los datos se insertarán aquí -->
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
    $.ajax({
        url: 'config/consulta.php', // La URL de tu archivo PHP
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Recorre los datos y añade filas a la tabla
            var filas = '';
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
            });
            // Añadir las filas al cuerpo de la tabla
            $('#tablaDatos tbody').html(filas);
        },
        error: function(xhr, status, error) {
            // Si hay un error con la solicitud AJAX
            console.error('Error en la solicitud AJAX: ' + error);
        }
    });
});
    </script>
</body>
</html>
