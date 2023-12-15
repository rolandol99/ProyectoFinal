<?php

namespace Controller;
use Model\GraficaModel;

class GraficaController{
    public function mostrar(){
        $inscripcion = GraficaModel::mostrarDatos();
        return $inscripcion;//se van a la vista
    }
}

?>