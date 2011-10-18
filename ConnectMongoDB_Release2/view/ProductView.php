<?php
require_once '../control/ControlProduct.php';
session_start();
abstract class ProductView {
    private static $_listProduct = array();
    public static function run() {
        $prodControl = new ControlProduct();
        if(!isset($_GET['opcion'])){
            $colProduct = $prodControl->findAllProduct();
            self::_mostrarFormPrincipal($colProduct);
        }else{
            $opcion = $_GET['opcion'];
            if(isset($_GET['id'])){
                $id = $_GET['id'];
            }
            switch ($opcion) {
                    case 'anhadir':
                        self::$_listProduct = $_SESSION['carrito'];
                        $nombre = $id;
                        self::$_listProduct[] = $prodControl->findProductByCriteria($nombre);
                        $_SESSION['carrito'] = self::$_listProduct;
                        self::_mostrarFormResumen();
                        break;

                    case 'comprar':
                        self::_mostrarFormSalir();
                        break;

                    case 'volver':
                        self::_mostrarFormPrincipal($colProduct);
                        break;
            }
        }
    }

    private static function _mostrarFormResumen() {
        require_once 'formResumen.html';
    }
    
    private static function _mostrarFormPrincipal($colProduct) {
        require_once 'formPrincipal.html';
    }
    
    private static function _mostrarFormSalir(){
        require_once 'formSalir.html';
    }
}
ProductView::run();
?>
