<?php
require_once("BaseDeDatos.php"); //Trae la conexion a la base de datos junto con sus respectivos metodos

class AtletaSQL
{

    public static function obtenerHistorialPago()
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT DISTINCT pagos.numerorecibo,pagos.fecha, pagos.idcur, pagos.monto
            from pagos,atletas,adultoresponsable 
            where cedulaatleta = '6-719-1951' and atletas.idrespo = pagos.idrespon";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }



    //Metodo que obtiene los cursos en donde estoy inscrito mientras me inscriba en mas cursos
    public static function obtenerCursos($cedula)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT  DISTINCT  registroatletacurso.codicurso, cursos.horariocurso, entrenadores.nombreentrenador
            from registroatletacurso,cursos,entrenadores
            WHERE registroatletacurso.ceduatleta = ? AND registroatletacurso.codicurso = cursos.idcurso AND entrenadores.cedulaentrenador = cursos.codentrenador";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    public static function obtenerCurso()
    {
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


    //se inscribe el atleta al curso
    public static function inscribirAtleta($cedula, $curso)
    {
        try {

            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "INSERT INTO registroatletacurso(ceduatleta,codicurso) values(?,?)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula, $curso));
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return $e;
        }
    }

    public static function validacionAtleta($cedula, $curso)
    {
        try {

            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT ceduatleta, codicurso from registroatletacurso where ceduatleta = ? and codicurso = ?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula, $curso));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }



}
