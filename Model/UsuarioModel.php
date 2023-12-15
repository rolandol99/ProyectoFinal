<?php

namespace Model;

use Model\ConexionModel;

class UsuarioModel{

    public static function login($datos){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuario where usuario=:usuario");
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->execute();
        //Si hay un resultado que coincide
        return $stmt->fetch();//devolviendo la respuesta
    }


    public static function guardarUsuarioEstudiante($datos){
    try{
        $stmt = ConexionModel::conectar()->prepare("INSERT INTO usuario (nombres,apellidos,usuario,password,rol) VALUES (:nombres,:apellidos,:usuario,:password,:rol)");
        $stmt->bindParam(":nombres", $datos['nombres'], \PDO::PARAM_STR);
        $stmt->bindParam(":apellidos", $datos['apellidos'], \PDO::PARAM_STR);
        $stmt->bindParam(":usuario", $datos['usuario'], \PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos['password'], \PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos['rol'], \PDO::PARAM_STR);
        //Delete o update
        //No ejecución de Código SQL
        return $stmt->execute() ? true : false;
        }catch( \Throwable $th ){
            return false;
        }
    }

    public static function mostrarUsuario(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuario");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function editarUsuario($id){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuario WHERE id = :id");
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();

    }
    public static function actualizarUsuario($datos){
        $stmt = ConexionModel::conectar()->prepare("UPDATE usuario SET nombre = :nom, apellidos = :ape, usuario = :user, rol = :rol WHERE id = :id");
        $stmt->bindParam(':nom',$datos['nombres'], \PDO::PARAM_STR);
        $stmt->bindParam(':ape',$datos['apellidos'], \PDO::PARAM_STR);
        $stmt->bindParam(':user',$datos['usuario'], \PDO::PARAM_STR);
        $stmt->bindParam(':rol',$datos['rol'], \PDO::PARAM_STR);
        $stmt->bindParam(':id',$datos['id'], \PDO::PARAM_INT);
        return $stmt->execute() ? true : false;
    }
    public static function borrarUsuario($id){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM usuario where id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();//1 reg. Fetch
    }
    public static function borrarConfirmadoUsuario($id){
        $stmt = ConexionModel::conectar()->prepare("DELETE FROM usuario where id = :id");
        $stmt->bindParam(':id',$id,\PDO::PARAM_STR);
        return $stmt->execute() ? true : false;
    }
}
?>