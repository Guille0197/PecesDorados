<?php
require_once("BaseDeDatos.php"); //Trae la conexion a la base de datos junto con sus respectivos metodos

class AtletaSQL
{

    public static function obtenerHistorialPago($cedula)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT DISTINCT pagos.numerorecibo,pagos.fecha, pagos.idcur, pagos.monto
            from pagos,atletas,adultoresponsable 
            where cedulaatleta = ? and atletas.idrespo = pagos.idrespon";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula));
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


    public static function registrarAdulto($cedula, $nombre, $parentesco, $celular, $edad)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "INSERT INTO adultoresponsable(idadulto,nombreadulto,parentescoadulto,celularadulto,edadadulto) values(?,?,?,?,?)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula, $nombre, $parentesco, $celular, $edad));
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return $e;
        }
    }
    public static function registrarAtleta($cedulaAtleta, $nombreAtleta, $edadAtleta, $conocimientoAtleta, $direccionAtleta, $cedulaAdultoResponsabelAtleta, $valorSelectCurso)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "INSERT INTO atletas(cedulaatleta,nombreatleta,edadatleta,nadar,direccion,idrespo,idcur) values(?,?,?,?,?,?,?)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedulaAtleta, $nombreAtleta, $edadAtleta, $conocimientoAtleta, $direccionAtleta, $cedulaAdultoResponsabelAtleta, $valorSelectCurso));
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return $e;
        }
    }

    public static function miPerfil($cedula)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT * from atletas where cedulaatleta = ? ";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula));
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    // Samuel  *************************************************************************************************************
    public static function obtenerAdulto()
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT idadulto from adultoresponsable ";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }
    public static function obtenerAtleta()
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT   from atletas WHERE cedulaatleta=idAtleta";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }


    public static function registrarEntrenador($cedula, $nombre, $telefono)
    {
        try {

            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "INSERT INTO entrenadores(cedulaentrenador,nombreentrenador,telefonoentrenador) values(?,?,?)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($cedula, $nombre, $telefono));
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return $e;
        }
    }
    //samuel

    // ****** Guillermo Navarro*****
    public static function obtenterTodosAtletas()
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT * from atletas";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    public static function obtenerAdultoAdd()
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT idadulto, nombreadulto from adultoresponsable ";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    public static function registrarCajero($nombre, $passCajero,$cedula, $edad, $tipo)
    {
        try {

            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "INSERT INTO usuarios(usuario,password,cedula,edad,rol_id) values(?,?,?,?,?)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($nombre, $passCajero,$cedula, $edad, $tipo));
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return $e;
        }
    }

    public static function registrarAsistente($nombre, $passAsistente,$cedula, $edad, $tipo)
    {
        try {

            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "INSERT INTO usuarios(usuario,password,cedula,edad,rol_id) values(?,?,?,?,?)";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute(array($nombre, $passAsistente,$cedula, $edad, $tipo));
            return $pdo->lastInsertId();
        } catch (PDOException $e) {
            return $e;
        }
    }



   
}
