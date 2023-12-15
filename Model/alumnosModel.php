<?php

namespace Model;

use Model\ConexionModel;

class alumnosModel{
    public static function guardarAlumno($datos){
        try{
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO alumno (pnombre,snombre,papellido,sapellido,fecha_nacimiento) 
               VALUES (:pnombre,:snombre,:papellido,:sapellido,:fecha_nacimiento)");
            $stmt->bindParam(":pnombre", $datos['pnombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":snombre", $datos['snombre'], \PDO::PARAM_STR);
            $stmt->bindParam(":papellido", $datos['papellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":sapellido", $datos['sapellido'], \PDO::PARAM_STR);
            $stmt->bindParam(":fecha_nacimiento", $datos['fecha_nacimiento'], \PDO::PARAM_STR);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }
    
    public static function mostraralumnos(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumno");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function mostrarAsignacionAlumnos(){
        $stmt = ConexionModel::conectar()->prepare("SELECT a.idalumno, a.nombre, a.apellido, g.nombreg AS grado, c.nombrec AS curso FROM alumno a 
        JOIN curso c ON a.fkcurso = c.idcurso 
        JOIN grado g ON c.fkgrado = g.idgrado");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarAlumno($idalumno){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumno WHERE idalumno = :id");
        $stmt->bindParam(':id', $idalumno, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }
    public static function actualizarAlumno($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE alumno SET pnombre = :nom, snombre = :snom, papellido = :pape, sapellido = :sape, fecha_nacimiento = :fecha WHERE idalumno = :id");
        $stmt->bindParam(':nom',$datos['pnombre'], \PDO::PARAM_STR);
        $stmt->bindParam(':snom',$datos['snombre'], \PDO::PARAM_STR);
        $stmt->bindParam(':pape',$datos['papellido'], \PDO::PARAM_STR);
        $stmt->bindParam(':sape',$datos['sapellido'], \PDO::PARAM_STR);
        $stmt->bindParam(":fecha", $datos['fecha_nacimiento'], \PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idalumno'], \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
    public static function borrarAlumno($idalumno){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM alumno where idalumno = :id");
        $stmt->bindParam(':id',$idalumno,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }
    public static function borrarConfirmadoAlumno($idalumno){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM alumno where idalumno = :id");
        $stmt->bindParam(':id',$idalumno,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }

}
?>

