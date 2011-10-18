<?php
require_once '../control/ControlProduct.php';
abstract class ProductView {
    public static function run() {
        $prodControl = new ControlProduct();
        if(isset($_GET['opcion'])){
            $opcion = $_GET['opcion'];
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            switch ($opcion) {
                case 'insertar':
                    $nombre = $_POST['nombre'];
                    $precio = $_POST['precio'];
                    $cantidad = $_POST['cantidad'];
                    $prodControl->addProduct($nombre, $precio, $cantidad);
                    $colProduct = $prodControl->findAllProduct();
                    self::_mostrarResumenForm($colProduct);
                    break;

                case 'volver':
                    self::_mostrarFormPrincipal();
                    break;

                case 'eliminar':
                    $prodControl->deleteAll();
                    self::_mostrarFormPrincipal();
                    break;
                    
                case 'eliminarUno':
                    $prodControl->deleteOneProduct($id);
                    $colProduct = $prodControl->findAllProduct();
                    self::_mostrarResumenForm($colProduct);
                    break;
            }
        }else{
            self::_mostrarFormPrincipal();
            }
        }
    
    private static function _mostrarFormPrincipal() {
        require_once 'addProductForm.html';
    }
    
    private static function _mostrarResumenForm($colProduct) {
        require_once 'resumenForm.html';
    }
}
ProductView::run();
?>
