<?php
require_once '../../config/confiig.php';
include_once '../../config/conexion.php';

$selectedMonth = isset($_POST['month']) ? $_POST['month'] : '';

$consulta = "
    SELECT 
        ventas.id_venta,
        ventas.fecha_venta,
        usuarios.nombre AS nombre_usuario,
        empleados.nombre AS nombre_empleado,
        productos.nombre AS nombre_producto,
        detalle_ventas.cantidad,
        detalle_ventas.precio_unitario,
        detalle_ventas.subtotal,
        ventas.total
    FROM 
        ventas
    INNER JOIN 
        usuarios ON ventas.id_usuario = usuarios.id_usuario
    INNER JOIN 
        empleados ON ventas.id_empleado = empleados.id_empleado
    INNER JOIN 
        detalle_ventas ON ventas.id_venta = detalle_ventas.id_venta
    INNER JOIN 
        productos ON detalle_ventas.id_producto = productos.id_producto
";

if ($selectedMonth) {
    $startDate = date("Y-m-01", strtotime($selectedMonth));
    $endDate = date("Y-m-t", strtotime($selectedMonth));
    $consulta .= " WHERE ventas.fecha_venta BETWEEN :startDate AND :endDate";
}

$consulta .= " ORDER BY ventas.fecha_venta DESC";

$resultado = $pdo->prepare($consulta);
if ($selectedMonth) {
    $resultado->bindParam(':startDate', $startDate);
    $resultado->bindParam(':endDate', $endDate);
}
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);

$ventasAgrupadas = [];
foreach ($data as $venta) {
    $ventasAgrupadas[$venta['id_venta']]['info'] = $venta;
    $ventasAgrupadas[$venta['id_venta']]['detalles'][] = $venta;
}
?>

<?php require_once "../includes/header.php" ?>

<! ----------------- contenido -----------------!>

    <div class="container mt-4">
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="month">Seleccione el mes:</label>
                <input type="month" id="month" name="month" class="form-control" value="<?php echo htmlspecialchars($selectedMonth); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>

        <div class="row">
            <?php foreach ($ventasAgrupadas as $venta) : ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Boleta de Venta</h5>
                            <p class="card-text">Fecha: <?php echo $venta['info']['fecha_venta']; ?></p>
                            <p class="card-text">Cliente: <?php echo htmlspecialchars($venta['info']['nombre_usuario']); ?></p>
                            <p class="card-text">Cajero: <?php echo htmlspecialchars($venta['info']['nombre_empleado']); ?></p>
                            <hr>
                            <h6 class="card-subtitle mb-2 text-muted">Detalle de la compra:</h6>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col" style="font-size: 0.8em;">Producto</th>
                                        <th scope="col" style="font-size: 0.8em;">Precio Unitario</th>
                                        <th scope="col" style="font-size: 0.8em;">Cantidad</th>
                                        <th scope="col" style="font-size: 0.8em;">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalVenta = 0;
                                    foreach ($venta['detalles'] as $detalle) {
                                        $subtotalProducto = $detalle['cantidad'] * $detalle['precio_unitario'];
                                        $totalVenta += $subtotalProducto;
                                        echo '<tr>';
                                        echo '<td style="font-size: 0.8em;">' . htmlspecialchars($detalle['nombre_producto']) . '</td>';
                                        echo '<td style="font-size: 0.8em;">s/' . number_format($detalle['precio_unitario'], 2) . '</td>';
                                        echo '<td style="font-size: 0.8em;">' . $detalle['cantidad'] . '</td>';
                                        echo '<td style="font-size: 0.8em;">s/' . number_format($subtotalProducto, 2) . '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <hr>
                            <p class="card-text">Total: s/<?php echo number_format($totalVenta, 2); ?></p>
                            <hr>
                            <p class="card-text">Gracias por su compra.</p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <! ----------------- fin contenido -----------------!>


        <?php require_once "../includes/footer.php" ?>