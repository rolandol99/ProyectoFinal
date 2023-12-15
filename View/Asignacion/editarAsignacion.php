<?php

use Controller\asignacionController;
use Controller\alumnosController;
use Controller\CursoController;

$inscripcion = new asignacionController();
$alumno = new alumnosController();
$curso = new CursoController();

$registro = $inscripcion->editarAsignacion();//array trae los campos de BD

$inscripcion->actualizarAsignacion();//Enviar los nuevos datos a la BD

//if (!empty($_SESSION['id']) && !empty($_GET['idasignacion'])) { // VALIDACIÓN, OBLIGATORIO INICIO DE SESIÓN
?>

<link rel="stylesheet" href="View/miestilo.css"> 
<H1>EDITAR ASIGNACION</H1>

<div class="container-login">
    <form method="POST">

       
        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Alumno:</label></div>
                <!--<div class="col-10"><input type="text" class="form-control" name="fkvtipo"></input></div>-->
                <select class="form-select" name="idalumno" value="<?php echo $registro['idalumno']; ?>">
                            <?php 
                                foreach($alumno->mostrarAlumno() as $row => $item){
                                    echo "<option value='{$item['idalumno']}'>{$item['pnombre']}-{$item['snombre']}-{$item['papellido']}-{$item['sapellido']}</option>";
                                }
                            ?>
                </select>          
            </div>
        </div>
        
        <div class="form-group">
            <div class="row" mb-3>
                <div class="col-2"><label>Curso:</label></div>
                <!--<div class="col-10"><input type="text" class="form-control" name="fkvtipo"></input></div>-->
                <select class="form-select" name="idcurso" value="<?php echo $registro['idcurso']; ?>">
                            <?php
                                foreach ($curso->mostrarCursoGrado() as $row => $item) {
                                    echo "<option value='{$item['idcurso']}'>{$item['nombrec']}----->{$item['nombreg']}</option>";
                                }
                            ?>
                </select>          
            </div>
        </div>
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Fecha asignación</label></div>
                <div class="col-10"><input class="form-control" type="text" name="fecha_asigna" value="<?php echo $registro['fecha_asigna']; ?>" required></div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Usuario asigna curso:</label></div>
                <div class="col-10"><input type="text" class="form-control" name="usuario" value="<?php echo $registro['usuario']; ?>" ></div>
            </div>
        </div>

        <input type="hidden" name="idasignacion" value="<?php echo $registro['idasignacion'];?>">

        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <br><BR>

        </div>

        <div class="form-group">
            <div class="row mt-3">
                <!-- Botón de Cancelar -->
            <div class="col-2"><a href="index.php?action=mostrarAsignacion" class="btn btn-secondary">Cancelar</a></div>
        </div>
        </div>
    </form>
</div>