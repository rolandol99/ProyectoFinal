<?php
    use Controller\CursoController;
    $inscripcion = new CursoController();

    $registro = $inscripcion->editarCurso();//array trae los campos de BD

    $inscripcion->actualizarCurso();//Enviar los nuevos datos a la BD
?>
<link rel="stylesheet" href="View/miestilo.css"> 
<H1>EDITAR CURSO</H1>

<form method="POST">


<div class="form-group">
    <div class="row mb-3">
        <div class="col-2"><label>Nombre</label></div>
        <div class="col-10"><input class="form-control" type="text" name="nombrec" value="<?php echo $registro['nombrec']; ?>" required></div>
    </div>
</div>


<div class="form-group">
            <div class="row">
                <div class="col-2"><label>Grado</label></div>
                <div class="col-10"><input type="text" class="form-control" name="fkgrado" value="<?php echo $registro['fkgrado']; ?>" ></div>
            </div>
        </div>

<input type="hidden" name="idcurso" value="<?php echo $registro['idcurso'];?>">

<div class="form-group">
    <div class="row mt-3">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <br><BR>
  
</div>

<div class="form-group">
    <div class="row mt-3">
           <!-- Botón de Cancelar -->
     <div class="col-2"><a href="index.php?action=mostrarCursos" class="btn btn-secondary">Cancelar</a></div>
</div>
</div>
</form>