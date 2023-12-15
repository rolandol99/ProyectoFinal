<?php

namespace Model;

use Model\ConexionModel;

class gradoModel{

    public static function guardarIngresoGrados($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO grado (nombreg) VALUES (:nom)");
            $stmt->bindParam(":nom", $datos['nombreg'], \PDO::PARAM_STR);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function mostrarGrado(){
        $stmt = ConexionModel::conectar()->prepare("SELECT idgrado,nombreg FROM grado");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    
    public static function editarGrados($idgrado){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM grado WHERE idgrado = :id");
        $stmt->bindParam(':id', $idgrado, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarGrados($datos){
        try {
            $stmt = ConexionModel::conectar()->prepare("UPDATE grado SET nombreg = :nom WHERE idgrado = :id");
            $stmt->bindParam(':nom', $datos['nombreg'], \PDO::PARAM_STR);
            $stmt->bindParam(":id", $datos['idgrado'], \PDO::PARAM_INT);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }
    
    public static function borrarGrados($idgrado){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM grado where idgrado = :id");
        $stmt->bindParam(':id',$idgrado,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }
    public static function borrarConfirmadoGrados($idgrado){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM grado where idgrado = :id");
        $stmt->bindParam(':id',$idgrado,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }

}

?>

