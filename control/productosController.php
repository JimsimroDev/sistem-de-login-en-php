<?php
require_once '../modelo/Productos.php';
class ProductosController
{
  private $cnx;
  public function __construct()
  {
    require_once '../conexion/conexion.php';

    try {
      $this->cnx = conexion::conectar();
    } catch (PDOException $e) {
      echo "Error conectando a la base de datos: " . $e->getMessage();
      die(); #Termina la ejecucion si hay algun error 
    }
  }

  #Listar todos los datos de la tabla productos
  public function listarTodosLosDatos()
  {

    try {
      $query = "SELECT id_producto, nombre, descripcion, precio, stock  FROM productos";
      $resultado = $this->cnx;
      $pre = $resultado->prepare($query);
      $pre->execute();
      $productos = $pre->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
    return $productos;
  }

  #Mostrar el total de precions de todos los productos
  public function mostrarTotalPrecios()
  {
    try {
      $query = "SELECT SUM(precio) FROM productos";
      $resultado = $this->cnx;
      $pre = $resultado->prepare($query);
      $pre->execute();
      $totalPrecios = $pre->fetch(PDO::FETCH_ASSOC);
      return $totalPrecios['SUM(precio)'];
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function eliminar($id)
  {
    try {
      $query = "DELETE FROM productos WHERE id_producto = ?";
      $resultado = $this->cnx->prepare($query);
      $resultado->execute([$id]);
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function crear($producto)
  {
    try {
      $query = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)";
      $resultado = $this->cnx->prepare($query); $resultado->execute([
        $producto->getNombre(),
        $producto->getDescripcion(),
        $producto->getPrecio(),
        $producto->getStock()
      ]);
      return true;
    } catch (PDOException $e) {
      die($e->getMessage());
      return false;
    }
  }

  public function update($producto)
  {
    try {
      $query = "UPDATE productos SET nombre = ?, descripcion = ?, precio = ?, stock = ?
          WHERE id_producto = ?";

      $resultado = $this->cnx->prepare($query);
      $resultado->execute([
        $producto->getNombre(),
        $producto->getDescripcion(),
        $producto->getPrecio(),
        $producto->getStock(),
        $producto->getIdProducto()
      ]);
      return true;
    } catch (PDOException $e) {
      die($e->getMessage());
      return false;
    }
  }

  public function buscar($id_producto)
  {
    try {
      $query = "SELECT * FROM productos WHERE id_producto = ?";
      $resultado = $this->cnx->prepare($query);
      $resultado->execute([$id_producto]);
      $producto = $resultado->fetch(PDO::FETCH_ASSOC);
      return $producto;
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }
}
