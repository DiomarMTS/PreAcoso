<?php
require_once 'conexion.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los datos del formulario
    $fechaHecho = $_POST['fechaHecho'] ?? null;
    $cargoAgresor = $_POST['cargoAgresor'] ?? null;
    $tipoViolencia = $_POST['tipoViolencia'] ?? null;
    $id_user = $_POST['id_user'] ?? null;
    $id_norma = $_POST['id_norma'] ?? null;
    $id_tipoMedida = $_POST['id_tipoMedida'] ?? null;
    $id_institucion = $_POST['id_institucion'] ?? null;
    $id_evaluacion = $_POST['id_evaluacion'] ?? null;

    // Validar que todos los campos obligatorios estén llenos
    if ($fechaHecho && $cargoAgresor && $tipoViolencia && $id_user && $id_norma && $id_tipoMedida && $id_institucion && $id_evaluacion) {
        try {
            // Preparar la consulta
            $sql = "INSERT INTO caso (fechaHecho, cargoAgresor, tipoViolencia, id_user, id_norma, id_tipoMedida, id_institucion, id_evaluacion)
                    VALUES (:fechaHecho, :cargoAgresor, :tipoViolencia, :id_user, :id_norma, :id_tipoMedida, :id_institucion, :id_evaluacion)";
            $stmt = $pdo->prepare($sql);

            // Ejecutar la consulta con los datos
            $stmt->execute([
                ':fechaHecho' => $fechaHecho,
                ':cargoAgresor' => $cargoAgresor,
                ':tipoViolencia' => $tipoViolencia,
                ':id_user' => $id_user,
                ':id_norma' => $id_norma,
                ':id_tipoMedida' => $id_tipoMedida,
                ':id_institucion' => $id_institucion,
                ':id_evaluacion' => $id_evaluacion,
            ]);

            echo "Caso registrado exitosamente.";
        } catch (PDOException $e) {
            // Mostrar errores si la inserción falla
            echo "Error al registrar el caso: " . $e->getMessage();
        }
    } else {
        echo "Por favor, completa todos los campos obligatorios.";
    }
} else {
    echo "Método no permitido.";
}
?>