<?php
namespace Controller;
use Model\CursoModel;

class CursoController{

    public function ingreso(){
        if (!empty($_POST['nombrec']) && !empty($_POST['fkgrado'])) {
            $datos = array(
                "nombre" => $_POST['nombrec'],
                "fkgrado" => $_POST['fkgrado']
            );
            $respuesta = CursoModel::guardarIngreso($datos);

            return $respuesta ? "guardado" : "error";
        }
    }
   
    public function mostrarCurso(){
        $curso = CursoModel::mostrarCursos();
        return $curso;//se van a la vista
    }

    public function editarCurso(){
        if(!empty($_GET['idcurso'])){
            $idcurso = $_GET['idcurso'];
            $curso = CursoModel::editarCursos($idcurso);
            return $curso;
        }
    }

    public function actualizarCurso(){
        if( !empty($_POST['idcurso']) && !empty($_POST['nombrec']) && !empty($_POST['fkgrado'])){
            $datos = array(
                "idcurso" => $_POST['idcurso'],
                "nombrec" => $_POST['nombrec'],
                "fkgrado" => $_POST['fkgrado']
            );
            $respuesta = CursoModel::actualizarCursos($datos);

            if($respuesta){
                echo '<script>window.location.href = "index.php?action=mostrarCursos";</script>';
            }
        }
    }

    public function eliminarCurso(){
        if(!empty($_GET['idcurso'])){
            $nombre = CursoModel::borrarCursos($_GET['idcurso']);
            return $nombre;
        }
    }
    
    public function confirmarBorrarCurso(){
        if(!empty($_POST['idcurso'])){
            $nombre = CursoModel::borrarConfirmadoCursos($_POST['idcurso']);
            if($nombre){
                echo '<script>window.location.href = "index.php?action=mostrarCursos";</script>';
            }
        }
    }
    public function mostrarCursoGrado(){
        $curso = CursoModel::mostrarCursoGrados();
        return $curso;//se van a la vista
    }

}

?>