<?php

abstract class Test {
    public static function run() {
        try {
            $dataBase = 'Carrito';
            
            $mongo = new Mongo();
            $conexion = $mongo->$database;

            $collection = $conexion->selectCollection($dataBase,'Productos');
                                    
            /*$nuevoRegistro = array("nombre" => "El Arma Secreta", "Precio" => "S/. 65", "Cantidad" => "67 unid");
            $collection->insert($nuevoRegistro);
            
            $collection->remove(array('nombre' => 'El Arma Secreta'));
            $collection->remove();
            */
            $cursor = $conexion->command(array('distinct'=>$collection, 'key'=>'nombre'));
            /*$cursor = $collection->find();*/
            
            foreach ($cursor as $prod) {
                echo "El producto es: ".$prod["nombre"]." El precio es: ".$prod["precio"]."\n";
            }
            
        } catch (Exception $exc) {
            error_log($exc->getMessage()."\n", 3, "../log/Error.log");
        }
    }
}
Test::run();
?>
