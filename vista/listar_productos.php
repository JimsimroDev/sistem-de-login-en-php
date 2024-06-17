<?php

include '../componentes/head.php';
include '../componentes/body_primera_parte.php';
require_once '../control/productosController.php';
$productosControl = new ProductosController();
$productos = $productosControl->listarTodosLosDatos();
$total = $productosControl->mostrarTotalPrecios();
?>
<div class="container pt-5 ">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end pt-5 mt-4">
        <a class="btn btn-outline-danger btn-lg text-dark" href="../pdf/index.php"><i class="fa-regular fa-file-pdf"></i></a>
        <a class="btn btn-outline-success btn-lg" href="../excel/reporte_excel.php"><i class="fa-solid fa-table"></i> </a>
        <a class="btn btn-outline-info btn-lg" href="../pdf/index.php"><i class="fa-regular fa-file-word"></i></a>
    </div>
      <div>
        <a class="btn btn-outline-info text-dark " href="./crear_producto.php">Agregar Manilla</a>
        <button class="navbar-toggler " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    <div class="card table-bordered border-primary bg-transparent table-responsive">
        <table class="display " id="tabla-productos">
        <h3 class="text-center font-weight-light ">Lista de Manillas</h3>
            <thead class="table-secondary card-header">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Stock</th>
                    <th colspan="1" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
                foreach ($productos as $producto) : ?>
                    <tr>
                        <th class="btn-sm btn-info"><?= $producto['id_producto'] ?></th>
                        <td><?= $producto['nombre'] ?></td>
                        <td><?= $producto['descripcion'] ?></td>
                        <td>$<?= $producto['precio'] ?></td>
                        <td><?= $producto['stock'] ?></td>
                        <td class="text-center">
                            <a onclick="return confirm('Está seguro de eliminar este integrante ?')" class="btn btn-danger btn-sm" href="eliminar_producto.php?id_producto=<?= $producto['id_producto'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                            <a class="btn btn-info btn-sm" href="editar_producto.php?id_producto=<?= $producto['id_producto'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
             <tr>
            <th colspan="6" class="text-end">Total de los precios: $<?= $total ?></th>
            </tr>
        </table>

    </div>
</div>

<?php
include '../componentes/body_final.php';
?>
