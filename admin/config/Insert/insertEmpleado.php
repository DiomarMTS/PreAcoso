<?php

require_once '../../../config/confiig.php';
require_once '../../../config/conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dni = $_POST["dni"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $salario = $_POST["salario"];
    $rol = $_POST["rol"];

    try {
        // Verificar si el rol ya existe
        $stmt = $pdo->prepare("SELECT * FROM `empleados` WHERE id_empleado= :dni");
        $stmt->bindParam(':dni', $dni);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El Empleado ya fue registrado ',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/empleados.php');
              });
                });
            </script>";
        } else {
            // Insertar el nuevo rol en la base de datos
            $stmt = $pdo->prepare("INSERT INTO `empleados`(`id_empleado`, `nombre`, `apellido`, `email`, `telefono`, `puesto`, `salario`)
                                     VALUES (:dni,:nombre,:apellido,:email,:telefono,:rol,:salario )");
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':rol', $rol);
            $stmt->bindParam(':salario', $salario);

            if ($stmt->execute()) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                    icon: 'success',
                    title: 'Nuevo Empleado registrado ',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                    }).then(() => {
                        location.assign('../../pages/empleados.php');
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