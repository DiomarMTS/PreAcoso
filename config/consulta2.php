<?php
// Incluye tu archivo de conexión
include 'conexion.php';

// Configuración de errores (solo para depuración, no en producción)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Obtiene los parámetros enviados desde la solicitud
$departamento = isset($_GET['departamento']) ? $_GET['departamento'] : '';
$provincia = isset($_GET['provincia']) ? $_GET['provincia'] : '';
$distrito = isset($_GET['distrito']) ? $_GET['distrito'] : '';

// Construye la consulta base
$sql = "
SELECT 
    d.nombre AS Departamento,
    p.nombre AS Provincia,
    dis.nombre AS Distrito,
    c.fechaHecho AS Fecha,
    c.tipoViolencia AS TipoViolencia,
    u.descripcion AS Ubicacion
FROM Caso c
JOIN InsEducativa i ON c.id_institucion = i.id_institucion
JOIN Distrito dis ON i.id_Distrito = dis.id_Distrito
JOIN Provincia p ON dis.id_Provincia = p.id_Provincia
JOIN Departamento d ON p.id_departamento = d.id_departamento
JOIN Ubicacion u ON i.id_ubicacion = u.id_ubicacion
WHERE 1=1
";

// Aplica los filtros dinámicamente
if (!empty($departamento)) {
    $sql .= " AND d.nombre = :departamento";
}
if (!empty($provincia)) {
    $sql .= " AND p.nombre = :provincia";
}
if (!empty($distrito)) {
    $sql .= " AND dis.nombre = :distrito";
}

// Ordena los resultados
$sql .= " ORDER BY d.nombre, p.nombre, dis.nombre, c.fechaHecho DESC";

// Prepara la consulta
$stmt = $pdo->prepare($sql);

// Asigna los valores de los filtros
if (!empty($departamento)) {
    $stmt->bindParam(':departamento', $departamento, PDO::PARAM_STR);
}
if (!empty($provincia)) {
    $stmt->bindParam(':provincia', $provincia, PDO::PARAM_STR);
}
if (!empty($distrito)) {
    $stmt->bindParam(':distrito', $distrito, PDO::PARAM_STR);
}

// Ejecuta la consulta
$stmt->execute();

// Obtén los resultados
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Devuelve los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($datos);
exit;
?>
