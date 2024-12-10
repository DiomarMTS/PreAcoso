<?php

require_once '../../../config/datos.php';
require_once '../../../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tipoDoc = $_POST["tipoDoc"];
    $numDoc = $_POST["numDoc"];
    $nombre = $_POST["nombre"];
    $apellidoPaterno = $_POST["apellidoPaterno"];
    $apellidoMaterno = $_POST["apellidoMaterno"];
    $contacto = $_POST["contacto"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $rol = $_POST["rol"];

    try {
        // Verificar si el email ya existe
        $stmt = $pdo->prepare("SELECT * FROM `usuario` WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'El Usuario ya fue registrado',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                }).then(() => {
                    location.assign('../../pages/Administrador.php');
                });
            });
            </script>";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $stmt = $pdo->prepare("INSERT INTO `usuario`(`id_tipoDoc`, `DNI`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `contacto`, `email`, `pass`, `id_rol`) 
                                   VALUES (:tipoDoc, :numDoc, :nombre, :apellidoPaterno, :apellidoMaterno, :contacto, :email, :pass, :rol)");
            $stmt->bindParam(':tipoDoc', $tipoDoc);
            $stmt->bindParam(':numDoc', $numDoc);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidoPaterno', $apellidoPaterno);
            $stmt->bindParam(':apellidoMaterno', $apellidoMaterno);
            $stmt->bindParam(':contacto', $contacto);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':pass', $pass);
            $stmt->bindParam(':rol', $rol);

            if ($stmt->execute()) {
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                <script language='JavaScript'>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: 'Nuevo Usuario registrado',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        timer: 1500
                    }).then(() => {
                        location.assign('../../pages/Administrador.php');
                    });
                });
                </script>";
                exit;
            } else {
                echo "Hubo un problema al registrarte. Por favor, inténtalo de nuevo.";
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $stmt = null;
    $pdo = null;
}
