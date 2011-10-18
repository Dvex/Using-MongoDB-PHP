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
            
			//Descomentar una de ellas. La que usted guste
			
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
                    $row = $this->_collection->find($query);
                    return $row;
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
    
    public function findByCriteria($nombre) {
        $query = array('nombre' => $nombre);
        $row = $this->_executeQuery(2, $query);
        return $row;
    }
}
Persistencia::getInstancia();
?>