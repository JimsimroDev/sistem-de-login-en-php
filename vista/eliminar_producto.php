<?php

$id = $_GET['id_producto'];

require_once '../control/productosController.php';
$productosControl = new ProductosController();

$productosControl->eliminar($id);

header('Location: listar_productos.php');
exit();
