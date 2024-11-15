<?php

require_once '../../../config/confiig.php';
require_once '../../../config/conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Realiza la eliminación del registro
    $query = "DELETE FROM `roles` WHERE id_rol = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $result = $stmt->execute();

    if ($result) {
        // Redirecciona a la página principal después de eliminar
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'El registro fue Eliminado correctamente',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/roles.php');
              });
    });
        </script>";
    } else {
        echo "Error al eliminar el registro: " . $stmt->errorInfo()[2];
    }
} else {
    echo "ID no proporcionado para eliminar el registro.";
}

?>