<?php
require '../vendor/autoload.php';
require '../control/productosController.php';

$productos = new ProductosController();

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$productos = $productos->listarTodosLosDatos();

$reporteExcel = new Spreadsheet();
$hojaActiva = $reporteExcel->getActiveSheet();
$hojaActiva->setTitle('Reporte de productos');


$hojaActiva->getColumnDimension('A')->setWidth(10);
$hojaActiva->setCellValue('A1', 'ID');
$hojaActiva->getColumnDimension('B' )->setWidth(20);
$hojaActiva->setCellValue('B1', 'Nombre');
$hojaActiva->getColumnDimension('C' )->setWidth(60);
$hojaActiva->setCellValue('C1', 'Descripcion');
$hojaActiva->getColumnDimension('D')->setWidth(10);
$hojaActiva->setCellValue('D1', 'Precio');
$hojaActiva->getColumnDimension('E')->setWidth(10);
$hojaActiva->setCellValue('E1', 'Cantidad');

#$hojaActiva->setCellValue('B1', 12345.6789);

$fila = 2;

foreach ($productos as $producto) {
  $hojaActiva->setCellValue('A' . $fila, $producto['id_producto']);
  $hojaActiva->setCellValue('B' . $fila, $producto['nombre']);
  $hojaActiva->setCellValue('C' . $fila, $producto['descripcion']);
  $hojaActiva->setCellValue('D' . $fila, '$'. $producto['precio']);
  $hojaActiva->setCellValue('E' . $fila, $producto['stock']);
  $fila++;
}

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="productos.xlsx"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($reporteExcel, 'Xlsx');
$writer->save('php://output');
exit;
