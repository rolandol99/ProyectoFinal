<?php
namespace Model;
use Model\ConexionModel;

class asignacionModel {
    public static function guardarAsignar($datos) {
        try {
            $fechaAsigna = date("Y-m-d");
            $stmt = ConexionModel::conectar()->prepare("INSERT INTO asignacion (idalumno, idcurso, fecha_asigna, usuario) 
            VALUES (:idalum, :idcur, :fecha, :usuar)");
            $stmt->bindParam(":idalum", $datos['idalumno'], \PDO::PARAM_INT);
            $stmt->bindParam(":idcur", $datos['idcurso'], \PDO::PARAM_INT);
            $stmt->bindParam(":fecha", $fechaAsigna, \PDO::PARAM_STR);
            $stmt->bindParam(":usuar", $_SESSION['id'], \PDO::PARAM_STR);

            return $stmt->execute() ? true : false;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function mostrarAsignacionCursos() {
        $stmt = ConexionModel::conectar()->prepare("SELECT 
        aas.idasignacion AS idasignacion,
        a.idalumno AS alumno,
        a.pnombre AS nombre1,
        a.snombre AS nombre2,
        a.papellido AS apellido1, 
        a.sapellido AS apellido2, 
        g.nombreg AS grado, 
        c.nombrec AS curso,
        aas.fecha_asigna AS fecha_asigna, 
        u.nombres AS usuario
        FROM asignacion aas 
        JOIN alumno a ON aas.idalumno = a.idalumno 
        JOIN curso c ON aas.idcurso = c.idcurso 
        JOIN grado g ON c.fkgrado = g.idgrado
        JOIN usuario u ON u.id = aas.usuario");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarAsignacion($idasignacion){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM asignacion WHERE idasignacion = :id");
        $stmt->bindParam(':id', $idasignacion, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }
    public static function actualizarAsignacion($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE asignacion SET idalumno = :alumno, idcurso = :curso, fecha_asigna = :fecha, usuario = :usua WHERE idasignacion = :id");
        $stmt->bindParam(':alumno',$datos['idalumno'], \PDO::PARAM_STR);
        $stmt->bindParam(':curso',$datos['idcurso'], \PDO::PARAM_STR);
        $stmt->bindParam(':fecha',$datos['fecha_asigna'], \PDO::PARAM_STR);
        $stmt->bindParam(':usua',$datos['usuario'], \PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['idasignacion'], \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
    public static function borrarAsignacion($idasignacion){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM asignacion where idasignacion = :id");
        $stmt->bindParam(':id',$idasignacion,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }
    public static function borrarConfirmadoAsignacion($idasignacion){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM asignacion where idasignacion = :id");
        $stmt->bindParam(':id',$idasignacion,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>
