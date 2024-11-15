<?php
require('./fpdf.php');
require_once '../../config/confiig.php';
include_once '../../config/conexion.php';

$consulta = "SELECT `id_producto`, `nombre`, `descripcion`, `precio`, `stock`, `stockMin`, `img`, `id_categoria`, `id_proveedor`
            FROM `productos`
            WHERE `stock` <= 0.15 * `stockMin`;";
$resultado = $pdo->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);


class PDF extends FPDF
{

    function Header()
    {
        $this->Image('Logo_TiendaRojas.png', 10, 6, 30);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(80);
        $this->Cell(30, 10, '', 0, 0, 'C');
        $this->Cell(10);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(100, 10, 'Urb. Los Ficus Av Huacachina O-11', 0, 0, 'L');
        $this->Ln(5);
        $this->SetX(151);
        $this->Cell(100, 10, '(Camino a Huacachina)', 0, 0, 'L');
        $this->Ln(6);
        $this->SetX(158);
        $this->Cell(100, 10, 'RUC: 20534428384', 0, 0, 'L');
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, 'REPORTE PRODUCTO STOCK ', 0, 0, 'C');
        $this->Ln(6);
        $this->Cell(0, 10, 'CRITICO', 0, 0, 'C');
        $this->Ln(20);
    }

    // Tabla de productos
    function TablaProductos($data)
    {
        // Encabezados de tabla
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(227, 16, 31);
        $this->SetTextColor(255, 255, 255);

        $this->Cell(20, 10, '', 0, 0, 'C', 0);
        $this->Cell(30, 10, 'id Producto', 1, 0, 'C', 1);
        $this->Cell(60, 10, 'Producto', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Stock', 1, 0, 'C', 1);
        $this->Cell(30, 10, 'Sctock minimno', 1, 1, 'C', 1);

        // Datos de productos
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(245, 245, 245);
        $this->SetTextColor(0);

        foreach ($data as $row) {
            $this->Cell(20, 10, '', 0, 0, 'C', 0);
            $this->Cell(30, 10, utf8_decode($row['id_producto']), 1, 0, 'C');
            $this->Cell(60, 10, $row['nombre'], 1, 0, 'C');
            $this->Cell(30, 10, $row['stock'], 1, 0, 'C');
            $this->Cell(30, 10, $row['stockMin'], 1, 1, 'C');
        }
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Página ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $hoy = date('d/m/Y');
        $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'R');
    }
}

// Crear instancia de PDF
$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

$pdf->Cell(30, 10, 'Hora: ' . date('H:i'), 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(30, 10, 'Dia: ' . date('d/m/Y'), 0, 0, 'L');
$pdf->Ln(10);


$pdf->TablaProductos($data);

$pdf->Ln(10);
$pdf->Cell(0, 10, 'Emitido por: Daniel Casani Garcia', 0, 0, 'C');
$pdf->Ln(10);
$pdf->Cell(0, 10, 'Usuario: Supervisor', 0, 0, 'C');
$pdf->Ln(10);


$pdf->Output('ReporteStock.pdf', 'I');
