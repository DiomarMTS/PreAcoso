<?php

require_once '../../../config/confiig.php';
require_once '../../../config/conexion.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto = $_POST["producto"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $proveedor = $_POST["proveedor"];
    $precio = $_POST["precio"];
    $stock = $_POST["stock"];
    $stockMin = $_POST["stockMin"];

    try {
        // Verificar si el producto ya existe
        $stmt = $pdo->prepare("SELECT * FROM `productos` WHERE `nombre` = :producto");
        $stmt->bindParam(':producto', $producto);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            <script language='JavaScript'>
            document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El producto ya fue registrado ',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/productos.php');
              });
                });
            </script>";
        } else {
            // Insertar el nuevo producto en la base de datos
            $stmt = $pdo->prepare("INSERT INTO `productos`(`nombre`, `descripcion`, `precio`, `stock`, `stockMin`, `id_categoria`, `id_proveedor`)
                                     VALUES (:producto, :descripcion, :precio, :stock, :stockMin, :categoria, :proveedor)");
            $stmt->bindParam(':producto', $producto);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':proveedor', $proveedor);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':stockMin', $stockMin);

            if ($stmt->execute()) {
                echo "
                    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
                    <script language='JavaScript'>
                    document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                    icon: 'success',
                    title: 'Nuevo producto registrado ',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    timer: 1500
                    }).then(() => {
                        location.assign('../../pages/productos.php');
                    });
                     });
                    </script>";
                exit;
            } else {
                echo "Hubo un problema al registrar el producto. Por favor, inténtalo de nuevo.";
            }
        }
    } catch (PDOException $e) {
        echo "Hubo un problema al registrar el producto. Por favor, inténtalo de nuevo. Error: " . $e->getMessage();
    }

    $stmt = null;
    $pdo = null;
}
