<?php

abstract class Test {
    public static function run() {
        try {
            $dataBase = 'dbprueba';
            $username = 'testUser';
            $userpass = 'testPass';
            
            $conexion = new Mongo("mongodb://$username:$userpass@localhost/$dataBase");

            $collection = $conexion->selectCollection($dataBase,'tabla1');
                                    
            /*$nuevoRegistro = array("nombre" => "Billetera", "Precio" => "65", "Cantidad" => "67", "Descripcion" => array("Bonito","Muy Caro"));
            $collection->insert($nuevoRegistro);*/
            
            //$collection->remove(array('nombre' => 'El Arma Secreta'));
            //$collection->remove();
            
            /*$producto['Precio'] = '282';
            $producto['Cantidad'] = '6565';
            $collection->save($producto);
            $result = $collection->findOne(array('Precio' => '2222'));
            var_dump($result);*/
            
           //$cursor = $collection->find(array('Precio' => 'S/. 154'));
            $cursor = $collection->find();
            $cursor_2 = $cursor->find();
            
            for ($i = 0; $i < count($cursor); $i++) {
                for ($j = 0; $j < count($cursor_2); $j++) {
                    $nombre = $cursor["nombre"];
                    $precio = $cursor["Precio"];
                    $desc_1 = $cursor_2[j];
                    $desc_2 = $cursor_2[j];
                    $messa = "El nombre: $nombre El precio: $precio... Desc1 = $desc_1 y el otro = $desc_2";
                    echo $messa;
                }
            }
            
            
        } catch (Exception $exc) {
            error_log($exc->getMessage()."\n", 3, "../log/Error.log");
            throw $exc;
        }
    }
}
Test::run();
?>
