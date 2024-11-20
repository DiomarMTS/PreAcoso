<?php
// Incluye el archivo de conexión
include 'conexion.php';

// Obtén la conexión usando la función obtenerConexion
$pdo = obtenerConexion();

if ($pdo) {
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
    INNER JOIN Evaluacion E ON C.id_evaluacion = E.id_evaluacion
    INNER JOIN TipoMedida TM ON C.id_tipoMedida = TM.id_tipoMedida";

    try {
        // Prepara y ejecuta la consulta
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        // Recupera los resultados como un arreglo asociativo
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Configura el encabezado HTTP para que la respuesta sea JSON
        header('Content-Type: application/json');

        // Convierte el arreglo a JSON y envíalo como respuesta
        echo json_encode($datos);
    } catch (PDOException $e) {
        // Si ocurre un error con la consulta
        echo json_encode(['error' => 'Error en la consulta: ' . $e->getMessage()]);
    }
} else {
    // Si no se pudo conectar, se devuelve un mensaje de error
    echo json_encode(['error' => 'No se pudo conectar a la base de datos']);
}
?>
