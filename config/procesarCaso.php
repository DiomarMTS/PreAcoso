<?php
// Incluir la conexión a la base de datos
require_once 'conexion.php';

header('Content-Type: application/json');

// Verificar si se ha recibido el número de documento desde el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['numDocumento'])) {
    $numeroDocumento = trim($_POST['numDocumento']);

    // Validar que el número de documento sea alfanumérico y tenga entre 8 y 12 caracteres
    if (!preg_match('/^[A-Za-z0-9]{8,12}$/', $numeroDocumento)) {
        echo json_encode(['error' => 'Número de documento no válido. Debe contener entre 8 y 12 caracteres alfanuméricos.']);
        exit;
    }

    // Preparar la consulta SQL
    $sql = "
    SELECT 
        u.numDocumento AS NumeroDocumento,
        CONCAT(u.nombre, ' ', u.apellidoPaterno) AS NombreAgraviado,
        c.fechaHecho AS FechaHecho,
        c.cargoAgresor AS CargoDelAgresor,
        c.tipoViolencia AS TipoDeViolencia,
        nm.norma AS NormaAplicable,
        tm.descripcion AS TipoDeMedida,
        i.nombre AS InstitucionEducativa,
        e.resultadoInformal AS ResultadoEvaluacion,
        e.fechaEvaluacion AS FechaEvaluacion,
        e.fechaFinal AS FechaFinalEvaluacion
    FROM 
        Caso c
    JOIN 
        Usuario u ON c.id_user = u.id_user
    JOIN 
        Normas nm ON c.id_norma = nm.id_norma
    JOIN 
        TipoMedida tm ON c.id_tipoMedida = tm.id_tipoMedida
    JOIN 
        InsEducativa i ON c.id_institucion = i.id_institucion
    JOIN 
        Evaluacion e ON c.id_evaluacion = e.id_evaluacion
    WHERE 
        u.numDocumento = :numDocumento
    ";

    try {
        // Ejecutar la consulta
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':numDocumento', $numeroDocumento, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Devolver los resultados
        echo json_encode($result);
    } catch (PDOException $e) {
        echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'Número de documento no proporcionado.']);
}
?>
