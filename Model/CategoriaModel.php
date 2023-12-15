<?php

namespace Model;

use Model\ConexionModel;

class CategoriaModel{

    public static function mostrarCategoria(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM categoria");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function mostrarCursoCategoria($idcategoria){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM curso where fkcategoria= :id");
        $stmt->bindParam(':id',$idcategoria,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
/*
<?php

namespace Model;

use Model\ConexionModel;

class CategoriaModel{

    public static function mostrarCategoria(){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM categoria");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public static function mostrarCursoCategoria($idcategoria){
        $stmt = ConexionModel::conectar()->prepare("SELECT * FROM curso where fkcategoria= :id");
        $stmt->bindParam(':id',$idcategoria,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}

?> */
?>

