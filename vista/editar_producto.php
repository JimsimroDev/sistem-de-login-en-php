<?php include '../componentes/head.php';
include '../componentes/body_primera_parte.php';
require_once '../control/productosController.php';
$productosControl = new ProductosController();

$id_producto = $_GET['id_producto'];
$producto = $productosControl->buscar($id_producto);
?>

<div class="card-body container py-5">
    <div class="row">
        <h3>Editar Producto</h3>
    </div>
    <form class="form-horizontal" method="POST" action="./update_producto.php" autocomplete="off">
        <div class="form-group col-md-6 mx-auto">
            <input type="hidden" name="id_producto" value="<?= $id_producto; ?>">
            <div class=" form-floating">
                <input value="<?= $producto['nombre']; ?>" class="form-control bg-transparent" name="nombre" type="text" placeholder="" required />
                <label for="inputLastName">Nombre</label>
            </div>
        </div>
        <br>
        <div class="col-md-6 mx-auto">
            <div class=" form-floating mb-3 mb-md-0">
                <input value="<?= $producto['descripcion']; ?>" class="form-control bg-transparent" name="descripcion" type="text" placeholder="Enter your first name" requered />
                <label for="inputFirstName">Descripcion</label>
            </div>
        </div>
        <br>
        <div class="col-md-6 mx-auto">
            <div class=" form-floating mb-3 mb-md-0">
                <input value="<?= $producto['precio']; ?> " class="form-control bg-transparent" name="precio" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Precio</label>
            </div>
        </div>
        <br>
        <div class="col-md-6 mx-auto">
            <div class=" form-floating mb-3 mb-md-0">
                <input value="<?= $producto['stock']; ?> " class="form-control bg-transparent" name="stock" type="text" placeholder="Enter your first name" />
                <label for="inputFirstName">Stock</label>
            </div>

        </div>
</div>
<div class="d-grid gap-2 d-md-flex justify-content-center py-5">
    <a class="btn btn-primary btn-lg" href="../vista/listar_productos.php">Regresar</a>
    <button onclick="return confirm('Esta seguro de gurardar esta dato')" name="btn_editar" type="submit" value="Guardar" class="btn btn-secondary btn-lg">Guardar</button>
</div>
</form>


<?php
include '../componentes/body_final.php';
?>
