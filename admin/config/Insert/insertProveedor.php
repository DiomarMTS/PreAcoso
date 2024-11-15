<?php

require_once '../../../config/confiig.php';
require_once '../../../config/conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ruc = $_POST["ruc"];
    $nombre = $_POST["nombre"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $estado = $_POST["estado"];

    try {
        // Verificar si el rol ya existe
        $stmt = $pdo->prepare("SELECT * FROM `empleados` WHERE id_empleado= :ruc");
        $stmt->bindParam(':ruc', $ruc);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El Proveedor ya fue registrado ',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/proveedores.php');
              });
                });
            </script>";
        } else {
            // Insertar el nuevo rol en la base de datos
            $stmt = $pdo->prepare("INSERT INTO `proveedores`(`RUC`, `nombre`, `direccion`, `email`, `telefono`, `Estado`)
                                     VALUES (:ruc,:nombre,:direccion,:email,:telefono,:estado )");
            $stmt->bindParam(':ruc', $ruc);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':estado', $estado);

            if ($stmt->execute()) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                    icon: 'success',
                    title: 'Nuevo Preoveedor registrado ',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                    }).then(() => {
                        location.assign('../../pages/proveedores.php');
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