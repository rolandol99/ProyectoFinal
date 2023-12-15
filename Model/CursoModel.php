<?php
namespace Model;

use Model\ConexionModel;

class CursoModel{

    public static function guardarIngreso($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO curso (nombrec, fkgrado) VALUES (:nom, :fkg)");
            $stmt->bindParam(":nom", $datos['nombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkg", $datos['fkgrado'], \PDO::PARAM_INT);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function mostrarCursos(){
        $stmt = ConexionModel::conectar()->prepare("SELECT c.idcurso AS idcurso, c.nombrec AS curso, g.nombreg AS grado FROM curso c JOIN grado g ON c.fkgrado = g.idgrado");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarCursos($idcurso){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM curso WHERE idcurso = :id");
        $stmt->bindParam(':id', $idcurso, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function actualizarCursos($datos){
        try {
            $stmt = ConexionModel::conectar()->prepare("UPDATE curso SET nombrec = :nom, fkgrado = :fkg WHERE idcurso = :id");
            $stmt->bindParam(':nom', $datos['nombrec'], \PDO::PARAM_STR);
            $stmt->bindParam(":fkg", $datos['fkgrado'], \PDO::PARAM_INT);
            $stmt->bindParam(":id", $datos['idcurso'], \PDO::PARAM_INT);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }
    
    public static function borrarCursos($idcurso){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM curso where idcurso = :id");
        $stmt->bindParam(':id',$idcurso,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }
    public static function borrarConfirmadoCursos($idcurso){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM curso where idcurso = :id");
        $stmt->bindParam(':id',$idcurso,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
    public static function mostrarCursoGrados(){
        $stmt = ConexionModel::conectar()->prepare("SELECT curso.idcurso, curso.nombrec, grado.nombreg FROM curso INNER JOIN grado ON curso.fkgrado = grado.idgrado");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>