<?php

require_once '../../../config/confiig.php';
require_once '../../../config/conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria = $_POST["categoria"];
    $descripcion = $_POST["descripcion"];

    try {
        // Verificar si el rol ya existe
        $stmt = $pdo->prepare("SELECT * FROM categorias WHERE nombre = :categoria");
        $stmt->bindParam(':categoria', $categoria);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'La categoria ya fue registrado ',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/categorias.php');
              });
                });
            </script>";
        } else {
            // Insertar el nuevo rol en la base de datos
            $stmt = $pdo->prepare("INSERT INTO `categorias`(`nombre`, `descripcion`) VALUES (:categoria,:descripcion)");
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':descripcion', $descripcion);

            if ($stmt->execute()) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                    icon: 'success',
                    title: 'Nueva categoria registrada ',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                    }).then(() => {
                        location.assign('../../pages/categorias.php');
                    });
                     });
                    </script>";
                exit;
            } else {
                echo "Hubo un problema al registrarte. Por favor, inténtalo de nuevo.";
            }
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "El correo electrónico ya está registrado. Por favor, utiliza otro correo.";
        } else {
            echo "Hubo un problema al registrarte. Por favor, inténtalo de nuevo.". $e->getMessage();
        }
    }

    $stmt = null;
    $conexion = null;
}
?>