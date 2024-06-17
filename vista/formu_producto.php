<?php
require_once '../control/productosController.php';

// Verificar si se han enviado los datos del formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validar campos requeridos
    if (empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['precio']) || empty($_POST['stock'])) {
        $mensaje = 'Error: Todos los campos son requeridos.';
    } else {
        // Obtener datos del formulario
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $stock = $_POST['stock'];

        // Crear un objeto Producto con los datos
        $producto = new Productos(null, $nombre, $descripcion, $precio, $stock);

        // Instanciar controlador de productos
        $productosControl = new ProductosController();

        // Intentar crear el producto en la base de datos
        if ($productosControl->crear($producto)) {
            // Mensaje de éxito si se crea correctamente
            $mensaje = '¡El producto se ha guardado exitosamente!';
        } else {
            // Mensaje de error si hay algún problema al guardar
            $mensaje = 'Error al guardar el producto. Por favor, intenta nuevamente.';
        }
    }
} else {
    // Si no se ha enviado el formulario por POST, mostrar un mensaje de error
    $mensaje = 'Error: No se han recibido datos del formulario.';
}

// Redirigir después de guardar (puedes ajustar la URL según tu estructura de archivos)
header('Location: listar_productos.php?mensaje=' . urlencode($mensaje));
exit();
