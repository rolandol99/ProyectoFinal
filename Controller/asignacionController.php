<?php
namespace Controller;
use Model\asignacionModel;

class asignacionController {
    public function ingresoAsignacion(){
        if (!empty($_POST['idalumno']) && !empty($_POST['idcurso'])) {
            $datos = array(
                "idalumno" => $_POST['idalumno'],
                "idcurso" => $_POST['idcurso'],
            );
            $respuesta = asignacionModel::guardarAsignar($datos);

            return $respuesta ? "guardado" : "error";

            if($respuesta){
                echo '<script>window.location.href = "index.php?action=mostrarAlumnos";</script>';
            }
        }
    }

  
    public function mostrarAsignacionC() {
        $inscripcion = asignacionModel::mostrarAsignacionCursos();
        return $inscripcion;
    }

    public function editarAsignacion(){
        $idasignacion = $_GET['idasignacion'];
        $idasignacion = asignacionModel::editarAsignacion($idasignacion);
        return $idasignacion;
    }
    public function actualizarAsignacion(){
        if( !empty($_POST['idasignacion']) && !empty($_POST['idalumno']) && !empty($_POST['idcurso']) && !empty($_POST['fecha_asigna']) && !empty($_POST['usuario'])){
            $datos = array(
                "idasignacion" => $_POST['idasignacion'],
                "idalumno" => $_POST['idalumno'],
                "idcurso" => $_POST['idcurso'],
                "fecha_asigna" => $_POST['fecha_asigna'],
                "usuario" => $_POST['usuario']);
            $respuesta = asignacionModel::actualizarAsignacion($datos);

            if($respuesta){
                echo '<script>window.location.href = "index.php?action=mostrarAsignacion";</script>';
                
            }
        }
    }
    public function borrarAsignacion(){
        if(!empty($_GET['idasignacion'])){
            $nombre = asignacionModel::borrarAsignacion($_GET['idasignacion']);
            return $nombre;
        }
    }
    public function confirmarBorrarAsignacion(){
        if(!empty($_POST['idasignacion'])){
            $nombre = AsignacionModel::borrarConfirmadoAsignacion($_POST['idasignacion']);
            if($nombre){
                echo '<script>window.location.href = "index.php?action=mostrarAsignacion";</script>';
            }
        }
    }
}
?>
