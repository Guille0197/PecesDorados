<?php
require_once("BaseDeDatos.php"); //Trae la conexion a la base de datos junto con sus respectivos metodos


class CajeroSQL{



    public static function realizarInscripcion($cedula, $nombre, $edad, $nadar, $direccion, $responsable, $curso){
        try {
            $pdo=BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "INSERT INTO atletas (cedulaatleta,nombreatleta, edadatleta, nadar, direccion, idrespo,idcur) values (?,?,?,?,?,?,?) ";
            $sentencia = $pdo->prepare($sql);
           
          $sentencia->execute(array($cedula, $nombre, $edad, $nadar, $direccion, $responsable, $curso));
          return $pdo->lastInsertId();
          
        } catch (PDOException $e) {  
            
                                  }
    }

    public static function obtenerCurso(){
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT idcurso from cursos ";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
                                  }
    }

    



}


?>