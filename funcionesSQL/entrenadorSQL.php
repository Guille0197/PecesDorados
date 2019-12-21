<?php
Class AdultoSQL{
    public static function obtenerEntrenador($cedula)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT * from entrenadores WHERE cedulaentrenador=?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute($cedula);
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }


    


}

?>