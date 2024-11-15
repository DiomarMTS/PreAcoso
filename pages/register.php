<?php
session_start();
require_once '../config/datos.php';
require_once '../config/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $DNI = trim($_POST['identificacion']);
    $firstName = trim($_POST['first_name']);
    $lastNameP = trim($_POST['last_nameP']);
    $lastNameM = trim($_POST['last_nameM']);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    // Validar campos obligatorios
    if (empty($DNI) || empty($firstName) || empty($lastNameP) || empty($lastNameM) || empty($email) || empty($password)) {
        echo "Por favor, completa todos los campos obligatorios.";
        exit;
    }

    try {
        // Verificar si el usuario ya existe
        $stmt = $pdo->prepare("SELECT * FROM usuario WHERE DNI = :dni");
        $stmt->bindParam(':dni', $DNI);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "El DNI ya está registrado. Por favor, utiliza otro.";
        } else {
            // Cifrar la contraseña antes de almacenarla
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Insertar el nuevo usuario en la base de datos
            $stmt = $pdo->prepare("INSERT INTO usuario (DNI, nombre, apellidoPaterno, apellidoMaterno, email, pass, id_rol) 
                                    VALUES (:dni,  :nombre, :apellidoP, :apellidoM, :email, :contrasena, :id_rol)");
            $stmt->bindParam(':dni', $DNI);
            $stmt->bindParam(':nombre', $firstName);
            $stmt->bindParam(':apellidoP', $lastNameP);
            $stmt->bindParam(':apellidoM', $lastNameM);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasena', $hashedPassword);
            $id_rol = 4; // Rol por defecto
            $stmt->bindParam(':id_rol', $id_rol);

            if ($stmt->execute()) {
                echo "Te has registrado exitosamente. Por favor, inicia sesión.";
                header("Location: login.php");
                exit;
            } else {
                echo "Hubo un problema al registrarte. Por favor, inténtalo de nuevo.";
            }
        }
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            echo "El DNI o correo electrónico ya está registrado. Por favor, utiliza otro.";
        } else {
            echo "Hubo un error en el sistema. Inténtalo de nuevo más tarde." . $e->getMessage();
        }
    }

    // Liberar recursos
    $stmt = null;
    $pdo = null;
}
