<?php
require_once '../persistence/Persistencia.php';
class Producto {
    private $_nombre;
    private $_precio;
    private $_cantidad;
    
    public function __construct($nombre="", $precio="", $cantidad="") {
        $this->_nombre=$nombre;
        $this->_precio=$precio;
        $this->_cantidad=$cantidad;
    }
    
    public function getNombre() { return $this->_nombre; }

    public function getPrecio() { return $this->_precio; }

    public function getCantidad() { return $this->_cantidad; }
    
    public function findAllProducts() {
        $productArray = array();
        $listaProduct = Persistencia::getInstancia();
        $arreglo = $listaProduct->findAll();
        foreach ($arreglo as $value) {
            $nombre = $value["nombre"];
            $precio = $value["precio"];
            $cantidad = $value["cantidad disponible"];
            $productArray[] = new Producto($nombre, $precio, $cantidad);
        }
        return $productArray;
    }
    
    public function addProducts(){
        $producto = Persistencia::getInstancia();
        $producto->addProduct($this->_nombre, $this->_precio, $this->_cantidad);
    }
    
    public function deleteProducts(){
        $producto = Persistencia::getInstancia();
        $producto->deleteAll();
    }
    
    public function deleteOneProduct() {
        $producto = Persistencia::getInstancia();
        $producto->deleteOne($this->_nombre);
    }
}

?>
