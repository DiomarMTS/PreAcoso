<?php

require_once '../../../config/confiig.php';
require_once '../../../config/conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $names = $_POST["names"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $estado = $_POST["estado"];
    $rol = $_POST["rol"];

    try {
        // Verificar si el rol ya existe
        $stmt = $pdo->prepare("SELECT * FROM `usuarios` WHERE email= :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El Usuario ya fue registrado ',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/clientes.php');
              });
                });
            </script>";
        } else {
            // Insertar el nuevo rol en la base de datos
            $stmt = $pdo->prepare("INSERT INTO `usuarios`(`nombre`, `apellido`, `nombre_usuario`, `email`,`Estado`, `id_rol`)
                                     VALUES (:nombre,:apellido,:names,:email,:estado,:rol )");
            $stmt->bindParam(':names', $names);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellido', $apellido);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':estado', $estado);
            $stmt->bindParam(':rol', $rol);

            if ($stmt->execute()) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                    icon: 'success',
                    title: 'Nuevo Usuario    registrado ',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                    }).then(() => {
                        location.assign('../../pages/clientes.php');
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
            echo "Hubo un problema al registrarte. Por favor, inténtalo de nuevo." . $e->getMessage();
        }
    }

    $stmt = null;
    $conexion = null;
}
