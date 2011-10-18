<?php
class salir {
    public static function run(){
        session_start();
        session_destroy();
        header("location:Index.php");
    }
}
salir::run();
?>
