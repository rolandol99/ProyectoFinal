<?php
namespace Controller;
use Model\gradoModel;

class gradoController{

    public function ingresoGrados(){
        if (!empty($_POST['nombreg'])) {
            $datos = array(
                "nombreg" => $_POST['nombreg']
            );
            $respuesta = gradoModel::guardarIngresoGrados($datos);

            return $respuesta ? "guardado" : "error";
        }
    }

    public function mostrarGradoC(){
        $inscripcion = gradoModel::mostrarGrado();
        return $inscripcion;//se van a la vista
    }

    public function editarGrado(){
        if(!empty($_GET['idgrado'])){
            $idgrado = $_GET['idgrado'];
            $idgrado = gradoModel::editarGrados($idgrado);
            return $idgrado;
        }
    }

    public function actualizarGrado(){
        if( !empty($_POST['idgrado']) && !empty($_POST['nombreg'])){
            $datos = array(
                "idgrado" => $_POST['idgrado'],
                "nombreg" => $_POST['nombreg']
            );
            $respuesta = gradoModel::actualizarGrados($datos);

            if($respuesta){
                echo '<script>window.location.href = "index.php?action=mostrarGrado";</script>';
            }
        }
    }

    public function eliminarGrado(){
        if(!empty($_GET['idgrado'])){
            $nombre = gradoModel::borrarGrados($_GET['idgrado']);
            return $nombre;
        }
    }
    
    public function confirmarBorrarGrado(){
        if(!empty($_POST['idgrado'])){
            $nombre = gradoModel::borrarConfirmadoGrados($_POST['idgrado']);
            if($nombre){
                echo '<script>window.location.href = "index.php?action=mostrarGrado";</script>';
            }
        }
    }


}

?>