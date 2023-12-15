<?php

namespace Controller;
use Model\alumnosModel;

class alumnosController{
    public function inscribirAlumno(){
        if (!empty($_POST['pnombre']) && !empty($_POST['papellido']) && !empty($_POST['fecha_nacimiento'])) {
            $datos = array(
                "pnombre" => $_POST['pnombre'],
                "snombre" => $_POST['snombre'],
                "papellido" => $_POST['papellido'],
                "sapellido" => $_POST['sapellido'],
                "fecha_nacimiento" => $_POST['fecha_nacimiento']
            );
            $respuesta = alumnosModel::guardarAlumno($datos);

            return $respuesta ? "guardado" : "error";

            if($respuesta){
                echo '<script>window.location.href = "index.php?action=mostrarAlumnos";</script>';
            }
        }
    }
   
    public function mostrarAlumno(){
        $alumno = alumnosModel::mostraralumnos();
        return $alumno;//se van a la vista
    }
    public function editarAlumno(){
        $idalumno = $_GET['idalumno'];
        $idalumno = alumnosModel::editarAlumno($idalumno);
        return $idalumno;
    }
    public function actualizarAlumno(){
        if( !empty($_POST['pnombre']) && !empty($_POST['snombre']) && !empty($_POST['papellido']) && !empty($_POST['sapellido']) && !empty($_POST['fecha_nacimiento'])){
            $datos = array(
                "idalumno" => $_POST['idalumno'],
                "pnombre" => $_POST['pnombre'],
                "snombre" => $_POST['snombre'],
                "papellido" => $_POST['papellido'],
                "sapellido" => $_POST['sapellido'],
                "fecha_nacimiento" => $_POST['fecha_nacimiento']);
            $respuesta = alumnosModel::actualizarAlumno($datos);

            if($respuesta){
                echo '<script>window.location.href = "index.php?action=mostrarAlumnos";</script>';
            }
        }
    }
    public function borrarAlumno(){
        if(!empty($_GET['idalumno'])){
            $nombre = alumnosModel::borrarAlumno($_GET['idalumno']);
            return $nombre;
        }
    }
    public function confirmarBorrarAlumno(){
        if(!empty($_POST['idalumno'])){
            $nombre = alumnosModel::borrarConfirmadoAlumno($_POST['idalumno']);
            if($nombre){
                echo '<script>window.location.href = "index.php?action=mostrarAlumnos";</script>';
            }
        }
    }


}

?>