<?php
Class AdultoSQL{
    public static function obtenerAdulto($cedula)
    {
        try {
            $pdo = BaseDeDatos::obtenerBD()->obtenerConexion();
            $sql = "SELECT * from adultoresponsable WHERE idadulto=?";
            $sentencia = $pdo->prepare($sql);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }





}

?>