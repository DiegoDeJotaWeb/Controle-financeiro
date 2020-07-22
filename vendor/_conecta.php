<?php
class PdoConexao {
    private static $instancia;
   
    // Impedir instanciação
    private function __construct() { }
    // Impedir clonar
    private function __clone() { }
   
    //Impedir utilização do Unserialize
    private function __wakeup() { }
   
    /**
    *
    * @return object PDO connection
    *
    */
    public static function getInstancia() {
        if(!isset(self::$instancia)) {
             try {
                $dsn = "mysql:host=localhost;dbname=financa";
                $usuario = "root";
                $senha = "";
                 
                 
               
                 self::$instancia = new PDO( $dsn, $usuario, $senha );
                 
                 
                 self::$instancia->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
             
             } catch ( PDOException $excecao ){
                 echo $excecao->getMessage();
             
                 exit();
             }
         }
         return self::$instancia;
        }
   }
?>