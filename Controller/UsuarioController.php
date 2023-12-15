<?php

namespace Controller;
use Model\UsuarioModel;

class UsuarioController{

    public function login(){
        $token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!empty($token) && !empty($_POST['usuario']) && !empty($_POST['password'])){//validar si se disparó el formulario
            $usuario = strClean($_POST['usuario']);
            $password = strClean($_POST['password']);
            //La comparación para ver si los datos coinciden
            $datos = array(
                'usuario' => $usuario,
            );

            $respuesta = UsuarioModel::login($datos);//Recibiendo todos los datos

            //Comparar la contraseña cifrada, de la contraseña del form.
            $resultado = password_verify($password,$respuesta['password']);

            if($resultado==true){//Hubo coincidencia
                $_SESSION['usuario'] = $respuesta['usuario'];
                $_SESSION['nombres'] = $respuesta['nombres'];
                $_SESSION['apellidos'] = $respuesta['apellidos'];
                $_SESSION['id'] = $respuesta['id'];
                //Rol
                //header("location: index.php?action=inicio&id={$respuesta['id']}");
                echo "<script>window.location.href = 'index.php?action=inicio&id={$respuesta['id']}';</script>";
            }else{
                //mensaje error
                return "error";
            }
        }
    }

    public function logout(){
        session_destroy();
        header("location: index.php?action=inicio");
    }

    public function crearUsuarioEstudiante(){
        if(!empty($_POST['usuario']) && !empty($_POST['password']) && !empty($_POST['nombres'])){

            $usuario=strClean($_POST['usuario']);
            $password=strClean($_POST['password']);

            $password = password_hash($password,PASSWORD_ARGON2ID);//Contraseña cifrada

            $nombres=strClean($_POST['nombres']);
            $apellidos=strClean($_POST['apellidos']);

            $datos = array(
                'usuario' => $usuario,
                'password' => $password,
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'rol' => 'e',
            );
            $respuesta = UsuarioModel::guardarUsuarioEstudiante($datos);

            return $respuesta;
        }
    }
    public function mostrarU(){
        $inscripcion = UsuarioModel::mostrarUsuario();
        return $inscripcion;//se van a la vista
    }

    public function editarUsuario($idusuario){
        $registro = UsuarioModel::editarUsuario($idusuario);
        return $registro;
    }
    public function editarCurso(){
        if(!empty($_GET['idusuario'])){
            $idusuario = $_GET['idusuario'];
            $idusuario = UsuarioModel::editarUsuario($idusuario);
            return $idusuario;
        }
    }
    public function actualizarUsuario(){
        if(!empty($_POST['nombres']) && !empty($_POST['apellidos']) && !empty($_POST['usuario']) && !empty($_POST['rol'])){
            $datos = array(
                "id" => $_POST['idusuario'], // Cambiado a 'idusuario'
                "nombres" => $_POST['nombres'],
                "apellidos" => $_POST['apellidos'], // Corregido el nombre del campo
                "usuario" => $_POST['usuario'],
                "rol" => $_POST['rol'] // Asegúrate de tener el campo 'rol'
            );
            $respuesta = UsuarioModel::actualizarUsuario($datos);
    
            if($respuesta){
                echo '<script>window.location.href = "index.php?action=mostrarUsuario";</script>';
            }
        }
    }
    
    public function borrarUsuario(){
        if(!empty($_GET['id'])){
            $nombre = UsuarioModel::borrarUsuario($_GET['id']);
            return $nombre;
        }
    }
    public function confirmarBorrarUsuario(){
        if(!empty($_POST['id'])){
            $nombre = UsuarioModel::borrarConfirmadoUsuario($_POST['id']);
            if($nombre){
                echo '<script>window.location.href = "index.php?action=mostrarUsuario";</script>';
            }
        }
    }
}

?>