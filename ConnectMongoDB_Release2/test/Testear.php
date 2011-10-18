<?php
require_once '../persistence/Persistencia.php';

$miInstancia = Persistencia::getInstancia();
$nombre = 'USB';
$lista = $miInstancia->findByCriteria($nombre);
var_dump($lista);

/*require_once '../model/Producto.php';
$miProducto = new Producto();
$lista = $miProducto->findAllProducts();

print_r($lista);*/

/*require_once '../model/Producto.php';
$nombre = 'USB';
$miProducto = new Producto($nombre);
$lista = $miProducto->findProductByCriteria();
print_r($lista);*/
?>
