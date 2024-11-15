<?php

require('./fpdf.php');
require_once '../../config/confiig.php';
include_once '../../config/conexion.php';

$consulta = "SELECT e.nombre, e.apellido, e.email, e.telefono, r.nombre_rol, e.salario, e.fecha_contratacion
                    FROM empleados e
                    INNER JOIN roles r ON e.puesto = r.id_rol;";
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
        $this->Cell(100);
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(100, 10, 'Urb. Los Ficus Av Huacachina O-11', 0, 0, 'L');
        $this->Ln(5);
        $this->SetX(242);
        $this->Cell(100, 10, '(Camino a Huacachina)', 0, 0, 'L');
        $this->Ln(6);
        $this->SetX(248);
        $this->Cell(100, 10, 'RUC: 20534428384', 0, 0, 'L');
        $this->Ln(10);

        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, 'REPORTE DE EMPLEADOS ', 0, 0, 'C'); // Centrar el título del reporte
        $this->Ln(20);
    }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); // Tipo de fuente, cursiva, tamaño de texto
      $this->Cell(0, 10, 'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'C'); // Número de página

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); // Tipo de fuente, cursiva, tamaño de texto
      $hoy = date('d/m/Y');
      $this->Cell(0, 10, utf8_decode($hoy), 0, 0, 'R'); // Fecha
   }
}

$pdf = new PDF('L'); // Orientación horizontal
$pdf->AddPage();
$pdf->AliasNbPages();

$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); // Color borde

$pdf->Cell(30, 10, 'Hora: '.date('H:i'), 0, 0, 'L');
$pdf->Ln(5);
$pdf->Cell(30, 10, 'Dia: '.date('d/m/Y'), 0, 0, 'L');
$pdf->Ln(10);

// Tabla de productos
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(227, 16, 31);
$pdf->SetTextColor(255, 255, 255);

$pdf->Cell(30, 10, '', 0, 0, 'C');
$pdf->Cell(30, 10, 'NOMBRE', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'APELLIDO', 1, 0, 'C', 1);
$pdf->Cell(60, 10, 'CORREO', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'TELEFONO', 1, 0, 'C', 1);
$pdf->Cell(50, 10, 'SALARIO', 1, 0, 'C', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(245, 245, 245);
$pdf->SetTextColor(0);

foreach ($data as $dat) {
    $pdf->Cell(30, 10, '', 0, 0, 'C');
   $pdf->Cell(30, 10, utf8_decode($dat['nombre']), 1,0,'C');
   $pdf->Cell(30, 10, $dat['apellido'], 1, 0, 'C');
   $pdf->Cell(60, 10, $dat['email'], 1, 0, 'C');
   $pdf->Cell(30, 10, $dat['telefono'], 1, 0, 'C');
   $pdf->Cell(50, 10, $dat['salario'], 1, 0, 'C');
   $pdf->Ln();
}

$pdf->Ln(10);
$pdf->Cell(0, 10, 'Emitido: Daniel Casani Garcia', 0, 1, 'C');
$pdf->Cell(0, 10, 'Usuario: Administrador', 0, 1, 'C');

$pdf->Output('ReporteEmpleados.pdf', 'I');
?>
