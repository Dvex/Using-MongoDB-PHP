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
    
    public function findProductByCriteria($nombre) {
        try{
            $product = new Producto($nombre);
            $prod_escogido = $product->findProductByCriteria();
            return $prod_escogido;
        }  catch (Exception $exc){
            throw $exc;
        }
    }  
}

?>
