<?php
  require_once('datosconexion.php');

 
 class BaseDeDatos
 {
 	private static $bd=null;
 	private static $pdo;

 	
 	function __construct()
 	{
    try{

       self::obtenerConexion();

    } catch(PDOException $e) { echo "Error de conexion".$e;}
 	
 	}


 	public static function obtenerBD(){
 		if(self::$bd==null) {
 			self::$bd= new self();
 		}
 		return self::$bd;

 	}
 	public function obtenerConexion() {
 		 if(self::$pdo==null) {
     self::$pdo= new PDO('mysql:dbname='.DATABASE.';host='.HOSTNAME.';',USERNAME,PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
      self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     } 
      return self::$pdo;
 	}

 	function __destructor() {
 		self::$pdo=null;
 	}

 }
?>