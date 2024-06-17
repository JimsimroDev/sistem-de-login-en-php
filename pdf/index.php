<?php
require_once '../control/productosController.php';
require_once 'Plantilla.php';
$productosControl = new ProductosController();
$productos = $productosControl->listarTodosLosDatos();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

$pdf->SetFillColor(255,255,255);
$pdf->Cell(12,6,'ID',1,0,'C',1);
$pdf->Cell(60,6,'Nombre',1,0,'C',1);
$pdf->Cell(50,6,'descripcion',1,0,'C',1);
$pdf->Cell(20,6,'Precio',1,0,'C',1);
$pdf->Cell(20,6,'stock',1,1,'C',1);


$pdf->SetFont('Arial','',10);

foreach($productos as $row){
  
$pdf->Cell(12,6, $row['id_producto'],1,0,'C',);
$pdf->Cell(60,6,utf8_decode($row['nombre']),1 ,0,'C',);
$pdf->Cell(50,6,utf8_decode($row['descripcion']),1,0,'C',);
$pdf->Cell(20,6,utf8_decode($row['precio']),1,0,'C',);
$pdf->Cell(20,6,$row['stock'],1,1,'C',);

}

$pdf->Output('D');

?>
