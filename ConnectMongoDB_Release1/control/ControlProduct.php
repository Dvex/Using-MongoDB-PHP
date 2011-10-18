<?php
require_once '../model/Producto.php';
class ControlProduct {
    public function findAllProduct() {
        try{
            $product = new Producto();
            $listaProd = $product->findAllProducts();
            return $listaProd;
        }  catch (Exception $exc){
            throw $exc;
        }
    }
    
    public function addProduct($name, $precio, $cantidad) {
        $product = new Producto($name, $precio, $cantidad);
        $product->addProducts();
    }
    
    public function deleteAll() {
        $product = new Producto();
        $product->deleteProducts();
    }
    
    public function deleteOneProduct($nombre) {
        $producto = new Producto($nombre);
        $producto->deleteOneProduct();
    }
    
}

?>
