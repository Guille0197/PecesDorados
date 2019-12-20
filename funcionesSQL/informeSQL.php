<?php
require_once("BaseDeDatos.php");
/**
 * 
 */
class InformeSQL 
{	
	
    public static function obtenerInformeAtleta()
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT * FROM atletas a JOIN adultoresponsable p JOIN cursos c ON a.idrespo = p.idadulto AND a.idcur = c.idcurso";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    public static function obtenerCurso()
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT * FROM cursos";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    
    
    public static function obtenerInforme($cedula)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT * FROM atletas a JOIN entrenadores e JOIN cursos c JOIN pagos p ON a.idcur = c.idcurso AND c.codentrenador = e.cedulaentrenador AND a.idrespo=p.idrespon WHERE c.idcurso = ?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
  
    
}
?>