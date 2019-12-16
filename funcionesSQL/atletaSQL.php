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
            $sql = "SELECT DISTINCT  idcur,horariocurso,nombreentrenador    from atletas,asistencia,cursos,entrenadores,registroatletacurso where ceduatleta= '6-719-1951' AND idcur=cursos.idcurso AND cursos.codentrenador = entrenadores.cedulaentrenador";
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
}
