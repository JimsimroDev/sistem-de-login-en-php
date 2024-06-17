<?php

class Productos
{
    public $id_producto;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;

    public function __construct($id_producto, $nombre, $descripcion, $precio, $stock)
    {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    public  function getIdProducto()
    {
        return $this->id_producto;
    }

    public  function setIdProducto($id_producto)
    {
        $this->id_producto = $id_producto;
    }

    public  function getNombre()
    {
        return $this->nombre;
    }

    public  function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public  function getDescripcion()
    {
        return $this->descripcion;
    }

    public  function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public  function getPrecio()
    {
        return $this->precio;
    }

    public  function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public  function getStock()
    {
        return $this->stock;
    }

    public  function setStock($stock)
    {
        $this->stock = $stock;
    }
}
