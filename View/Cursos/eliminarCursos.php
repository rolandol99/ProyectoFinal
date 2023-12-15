<?php

    use Controller\CursoController;
    $inscripcion = new CursoController();

    $registro = $inscripcion->eliminarCurso(); //El registro completo de la BD

    $inscripcion->confirmarBorrarCurso();

?>

<form method="post">
        <div class="alert alert-light" role="alert">
            <h5><?php echo "Usuario:" . $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?></h5>
        </div>  
<br>
<div class="alert alert alert-dismissible alert-primary" role="alert">
<?php echo "Curso: ". $registro['nombrec']; ?>
<p>¿Seguro que quiere eliminar este curso?</p>
</div> 
<input type="hidden" name="idcurso" value="<?php echo $registro['idcurso'];?>">

<button type="submit" class="btn btn-primary">Eliminar</button>

<div class="form-group">
    <div class="row mt-3">
           <!-- Botón de Cancelar -->
     <div class="col-2"><a href="index.php?action=mostrarCursos" class="btn btn-secondary">Cancelar</a></div>
     </div>
     
</form>