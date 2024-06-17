<?php

require_once '../control/productosController.php';

// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Crear un objeto Producto con los datos
    $producto = new Productos($id_producto, $nombre, $descripcion, $precio, $stock);

    $productosControl = new ProductosController();
    //    $productoExistente = $productosControl->buscar($id_producto);

    $productosControl->update($producto);

    // Redirigir después de guardar
    header('Location: listar_productos.php');
    exit();

} else {
    // Si no se ha enviado el formulario, mostrar un mensaje de error
    $mensaje = 'Error: ese producto no existe.';

}
