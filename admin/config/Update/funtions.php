
<?php

if (isset($_POST['accionUser'])) {
    switch ($_POST['accionUser']) {
            //casos de registros
        case 'editarUser':
            editarUser();
            break;
    }
}

if (isset($_POST['accionCategoria'])) {
    switch ($_POST['accionCategoria']) {
            //casos de registros
        case 'editarCategoria':
            editarCategoria();
            break;
    }
}

if (isset($_POST['accionEmpleado'])) {
    switch ($_POST['accionEmpleado']) {
            //casos de registros
        case 'editarEmpleado':
            editarEmpleado();
            break;
    }
}

if (isset($_POST['accionCliente'])) {
    switch ($_POST['accionCliente']) {
            //casos de registros
        case 'editarCliente':
            editarCliente();
            break;
    }
}

if (isset($_POST['accionProducto'])) {
    switch ($_POST['accionProducto']) {
            //casos de registros
        case 'editarProducto':
            editarProducto();
            break;
    }
}
if (isset($_POST['accionProveedor'])) {
    switch ($_POST['accionProveedor']) {
            //casos de registros
        case 'editarProveedor':
            editarProveedor();
            break;
    }
}

function editarUser()
{

    require_once '../../../config/datos.php';
    require_once '../../../config/conexion.php';

    extract($_POST);

    try {

        $stmt = $pdo->prepare("UPDATE `usuario` SET `id_tipoDoc`=:tipoDoc , `DNI`=:numDoc, `nombre`=:nombre,
                             `apellidoPaterno`=:apellidoPaterno, `apellidoMaterno`=:apellidoMaterno, `contacto`=:contacto,
                              `email`=:email, `pass`=:pass, `id_rol`=:rol WHERE `id_user`=:id");

        // Vincular los parámetros
        $stmt->bindParam(':tipoDoc', $tipoDoc);
        $stmt->bindParam(':numDoc', $numDoc);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidoPaterno', $apellidoPaterno);
        $stmt->bindParam(':apellidoMaterno', $apellidoMaterno);
        $stmt->bindParam(':contacto', $contacto);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
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
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/Administrador.php');
              });
    });
        </script>";
        }
    } catch (PDOException $e) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en la actualización: " . $e->getMessage() . "',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/Administrador.php');
              });
        });
        </script>";
    }

    // Cerrar la conexión
    $stmt = null;
    $pdo = null;
}

function editarCategoria()
{

    require_once '../../../config/confiig.php';
    require_once '../../../config/conexion.php';

    extract($_POST);

    try {

        $stmt = $pdo->prepare("UPDATE `categorias` SET `nombre`= :categoria,`descripcion`= :descripcion WHERE `id_categoria`= :id");

        // Vincular los parámetros
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
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
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/categorias.php');
              });
    });
        </script>";
        }
    } catch (PDOException $e) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en la actualización: " . $e->getMessage() . "',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/categorias.php');
              });
        });
        </script>";
    }

    // Cerrar la conexión
    $stmt = null;
    $pdo = null;
}

function editarEmpleado()
{

    require_once '../../../config/confiig.php';
    require_once '../../../config/conexion.php';

    extract($_POST);

    try {

        $stmt = $pdo->prepare("UPDATE `empleados` SET  `nombre`=:nombre ,`apellido`=:apellido ,`email`=:email ,`telefono`=:telefono ,`puesto`=:rol ,`salario`=:salario  
                                WHERE `id_empleado`=:id");

        // Vincular los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':salario', $salario);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
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
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/empleados.php');
              });
    });
        </script>";
        }
    } catch (PDOException $e) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en la actualización: " . $e->getMessage() . "',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/empleados.php');
              });
        });
        </script>";
    }

    // Cerrar la conexión
    $stmt = null;
    $pdo = null;
}

function editarCliente()
{

    require_once '../../../config/confiig.php';
    require_once '../../../config/conexion.php';

    extract($_POST);

    try {

        $stmt = $pdo->prepare("UPDATE `usuarios` SET `nombre`=:nombre ,`apellido`=:apellido ,`nombre_usuario`=:names ,`email`=:email ,`Estado`=:estado ,`id_rol`=:rol 
                                WHERE `id_usuario`=:id");

        // Vincular los parámetros
        $stmt->bindParam(':names', $names);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
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
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/clientes.php');
              });
    });
        </script>";
        }
    } catch (PDOException $e) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en la actualización: " . $e->getMessage() . "',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/clientes.php');
              });
        });
        </script>";
    }

    // Cerrar la conexión
    $stmt = null;
    $pdo = null;
}

function editarProducto()
{

    require_once '../../../config/confiig.php';
    require_once '../../../config/conexion.php';

    extract($_POST);

    try {

        $stmt = $pdo->prepare("UPDATE `productos` SET `nombre`=:producto,`descripcion`=:descripcion,`precio`=:precio,`stock`=:stock,`stockMin`=:stockMin,`id_categoria`=:categoria,`id_proveedor`=:proveedor
                             WHERE id_producto=:id");

        // Vincular los parámetros
        $stmt->bindParam(':producto', $producto);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);
        $stmt->bindParam(':stockMin', $stockMin);
        $stmt->bindParam(':categoria', $categoria);
        $stmt->bindParam(':proveedor', $proveedor);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
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
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/productos.php');
              });
    });
        </script>";
        }
    } catch (PDOException $e) {
        echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en la actualización: " . $e->getMessage() . "',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/productos.php');
              });
        });
        </script>";
    }

    // Cerrar la conexión
    $stmt = null;
    $pdo = null;
}

function editarproveedor()
{

    require_once '../../../config/confiig.php';
    require_once '../../../config/conexion.php';

    extract($_POST);

    try {

        $stmt = $pdo->prepare("UPDATE `proveedores` SET `nombre`=:nombre ,`direccion`=:direccion ,`telefono`= :telefono ,`email`=:email, `RUC`=:ruc ,`Estado`=:estado 
                                WHERE `id_proveedor`=:id");

        // Vincular los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ruc', $ruc);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'success',
                title: 'El registro fue actualizado correctamente',
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
            echo "
        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        <script language='JavaScript'>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Algo salio mal. Intenta de nuevo',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                timer: 1500
              }).then(() => {
                location.assign('../../pages/proveedores.php');
              });
    });
        </script>";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    // Cerrar la conexión
    $stmt = null;
    $pdo = null;
}
