<?php

namespace Model;

use Model\ConexionModel;

class InscripcionModel{

    public static function guardarInscripcion($datos){
        try{
        $stmt = ConexionModel::conectar()->prepare("INSERT INTO inscripcion (fkcurso,fkusuario,fecha) VALUES (:curso, :usuario,:fecha)");
        $stmt->bindParam(":curso", $datos['idcurso'], \PDO::PARAM_STR);//INT, STR, STR
        $stmt->bindParam(":usuario", $_SESSION['id'], \PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos['fecha'], \PDO::PARAM_STR);
        //Delete o update
        //No ejecución de Código SQL
        return $stmt->execute() ? true : false;
        }catch( \Throwable $th ){
            return false;
        }
    }

    public static function mostrarInscripcion(){
        $stmt = ConexionModel::conectar()->prepare("SELECT inscripcion.id as idinscripcion, curso, usuario.nombres as nombres FROM inscripcion INNER JOIN curso on curso.id=fkcurso INNER JOIN usuario on usuario.id = fkusuario");//usar un where, para mostrar los cursos que se asignó
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function MostrarAsignacion(){
        $conn = ConexionModel::conectar(); // Asegúrate de tener una función conectar en tu clase ConexionModel
        $result = $conn->query("SELECT
            u.nombres AS Nombre,
            u.apellidos AS Apellido,
            c.curso AS CursoAsignado
            FROM
            usuario u
            JOIN
            inscripcion i ON u.id = i.fkusuario
            JOIN
            curso c ON i.fkcurso = c.id");
    
        return $result;
    }
     
    public static function editarInscripcion($idInscripcion){
        $stmt = ConexionModel::conectar()->prepare("SELECT curso, inscripcion.id as idinscripcion  FROM inscripcion INNER JOIN curso on fkcurso=curso.id  where inscripcion.id = :id");
        $stmt->bindParam(':id',$idInscripcion,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function actualizarInscripcion($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE inscripcion SET fkcurso = :curso where inscripcion.id = :id");
        $stmt->bindParam(':curso',$datos['idcurso'],\PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idinscripcion'],\PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }

    public static function borrarInscripcion($idInscripcion){
        $stmt = ConexionModel::conectar()->prepare("SELECT inscripcion.id as idinscripcion, curso FROM inscripcion INNER JOIN curso on fkcurso = curso.id  where inscripcion.id = :id");
        $stmt->bindParam(':id',$idInscripcion,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }

    public static function borrarConfirmadoInscripcion($id){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM inscripcion where id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }

}

?>