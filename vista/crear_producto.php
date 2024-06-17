<?php include '../componentes/head.php';
require_once '../control/productosController.php';
$productosController = new ProductosController();

$mensaje = isset($_GET['mensaje']) ? $_GET['mensaje'] : '';

// Mostrar el mensaje en algún lugar adecuado de tu página HTML
if (!empty($mensaje)) {
    echo '<div class="alert alert-info">' . htmlspecialchars($mensaje) . '</div>';
}
?>

<style>
    body {
        background: linear-gradient(#BE9FA4, #785A69);
        background-attachment: fixed;
    }
</style>

<main class="py-5 pt-5 ">
<div class="container py-3 text-center">
 <div class="row justify-content-md-center">
    <header class="mb-4 border-bottom">
        <h3 class="fs-4">Agregar Producto</h3>
    </header>

        <div class="col-lg-6 col-md-12 text-center">
            <form class="form-horizontal" method="POST" action="formu_producto.php" autocomplete="off">
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="nombre" type="text" placeholder="" required />
                    <label for="inputLastName">Nombre</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="descripcion" type="text" placeholder="" required />
                    <label for="inputFirstName">Descripcion</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="precio" type="text" placeholder="" required />
                    <label for="inputFirstName">Precio</label>
                </div>
                <br>
                <div class="form-floating mb-3">
                    <input class="form-control bg-transparent" name="stock" type="text" placeholder="" required />
                    <label for="inputFirstName">Stock</label>
                </div>
                <br>
                <div class="d-grid gap-2 d-md-flex justify-content-center py-5">
                    <a class="btn btn-outline-primary btn-lg" href="../vista/listar_productos.php">Regresar</a>
                    <button onclick="return confirm('¿Estás seguro de guardar este dato?')" name="btn_guardar" type="submit" value="Guardar" class="btn btn-secondary btn-lg">Guardar</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</main>

<?php
include '../componentes/body_final.php';
?>
