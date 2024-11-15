<?php

require('./fpdf.php');
require_once '../../config/confiig.php';
include_once '../../config/conexion.php';

$consulta = "SELECT p.id_producto, p.nombre AS producto_nombre, p.descripcion AS producto_descripcion, p.precio, p.stock,p.stockMin,
     p.img AS producto_img, c.nombre AS categoria_nombre, pr.nombre AS proveedor_nombre
      FROM productos p 
      INNER JOIN categorias c ON p.id_categoria = c.id_categoria 
      INNER JOIN proveedores pr ON p.id_proveedor = pr.id_proveedor;";
    $resultado = $pdo->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);

class PDF extends FPDF
{
   // Cabecera de página
    function Header()
    {
        $this->Image('Logo_TiendaRojas.png', 10, 6, 30); // Logo de la empresa
        $this->SetFont('Arial', 'B', 15); // Tipo de fuente, negrita, tamaño de texto
        $this->Cell(80); // Movernos a la derecha
        $this->Cell(30, 10, ' ', 0, 0, 'C'); // Título
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
        $this->Cell(0, 10, 'REPORTE PRODUCTO PRECIO GENERAL', 0, 0, 'C'); // Centrar el título del reporte
        $this->Ln(20);
    }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C'); // Número de página

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'R'); // Fecha
   }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$pdf->Cell(30, 10, 'Hora: '.date('H:i'), 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(30, 10, 'Dia: '.date('d/m/Y'), 0, 0, 'L');
$pdf->Ln(10);

// Tabla de productos
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(227, 16, 31);
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(20, 10, '', 0, 0, 'C');
$pdf->Cell(60, 10, 'Concepto', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Precio Unitario', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Total', 1, 0, 'C', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(245, 245, 245);
$pdf->SetTextColor(0);

foreach ($data as $dat) {
   $pdf->Cell(20, 10, '', 0, 0, 'C');
   $pdf->Cell(60, 10, utf8_decode($dat['producto_nombre']), 1);
   $pdf->Cell(30, 10, $dat['stock'], 1,0,'C');
   $pdf->Cell(30, 10, $dat['precio'], 1,0,'C');
   $pdf->Cell(30, 10, $dat['precio'] * $dat['stock'], 1, 0 ,'C',1);
   $pdf->Ln();
}

$pdf->Ln(10);
$pdf->Cell(0, 10, 'Emitido: Daniel Casani Garcia', 0, 1, 'C');
$pdf->Cell(0, 10, 'Usuario: Administrador', 0, 1, 'C');

$pdf->Output('ReporteStock.pdf', 'I');
?>
