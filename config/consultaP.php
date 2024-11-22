<?php
// Incluye tu archivo de conexión
include 'conexion.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);


// Escribe la consulta SQL
$sql = "
SELECT 
    C.id_Caso, 
    C.fechaHecho, 
    C.cargoAgresor, 
    C.tipoViolencia, 
    U.nombre AS NombreUsuario, 
    U.apellido AS ApellidoUsuario, 
    IE.nombre AS InstitucionEducativa, 
    N.norma AS NormaAplicada, 
    TM.descripcion AS TipoMedida
FROM 
    Caso C
INNER JOIN Usuario U ON C.id_user = U.id_user
INNER JOIN InsEducativa IE ON C.id_institucion = IE.id_institucion
INNER JOIN Normas N ON C.id_norma = N.id_norma
INNER JOIN TipoMedida TM ON C.id_tipoMedida = TM.id_tipoMedida
ORDER BY C.fechaHecho DESC"; // Asegúrate de que no hay filtros restrictivos


// Prepara y ejecuta la consulta
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Recupera los resultados como un arreglo asociativo
$datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Asegúrate de que no haya ninguna salida previa
ob_clean(); // Limpia cualquier salida previa
header('Content-Type: application/json'); // Define el tipo de respuesta como JSON

// Envía el JSON
echo json_encode($datos);

// Asegúrate de que no haya nada más después de esto
exit;

?>