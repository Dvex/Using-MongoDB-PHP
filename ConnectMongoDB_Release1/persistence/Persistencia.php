<?php
class Persistencia {
    
    private static $_instancia;
    public static function getInstancia() {
        try {
            if(self::$_instancia == null){
                self::$_instancia = new Persistencia();
            }
        } catch (Exception $exc) {
            throw $exc;
        }
        return self::$_instancia;
    }
    
    private $_cn;
    private $_collection;


    public function __construct() {
        try {
            $username = 'administrador';
            $userpass = 'administrador';
            $database = 'Carrito';
            $colecction = 'Productos';
            
			//Descomentar 1 de ellas. Las que usted guste
			
            /*
             * Esta parte de codigo es la conexion con LA CLASE NUCLEO MONGODB
             * $this->_cn = new Mongo();
             * $db = $this->_cn->selectDB($database);
             * $db->authenticate($username,$userpass);
             * $this->_collection = $db->selectCollection($colecction);
             */
                        
            /*
             * Esta parte de codigo es la conexion con LA CLASE NUCLEO MONGO
             * $this->_cn = new Mongo("mongodb://$username:$userpass@localhost/$database");
             * $this->_collection = $this->_cn->selectCollection($database, $colecction);
             */
            
        } catch (Exception $exc) {
            error_log($exc->getMessage()."\n", 3, "../log/Error.log");
        }
    }
    
    private function _executeQuery($tipo="", $query="") {
        try{
            switch ($tipo) {
                case 1 :
                    $cursor = $this->_collection->find();
                    return $cursor;
                    break;
                case 2 :
                    $this->_collection->insert($query);
                    break;
                case 3 :
                    $this->_collection->remove();
                    break;
                
                case 4:
                    $this->_collection->remove($query);
                    break;
            }
        }  catch (Exception $exc){
            error_log($exc->getMessage()."\n", 3, "../log/Error.log");
            error_log("Query:$query\n", 3, "../log/Error.log");
        }
    }

    public function findAll() {
        $lista = $this->_executeQuery(1);
        return $lista;
    }
    
    public function addProduct($nombre, $precio, $cantidad) {
        $query = array("nombre" => $nombre, "precio" => $precio, "cantidad disponible" => $cantidad);
        $this->_executeQuery(2, $query);
    }
    
    public function deleteAll() {
        $this->_executeQuery(3);
    }
    
    public function deleteOne($nombre){
        $query = array("nombre" => $nombre);
        $this->_executeQuery(4, $query);
    }
}

Persistencia::getInstancia();
?>