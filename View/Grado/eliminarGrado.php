<?php

    use Controller\gradoController;
    $eliminargrado = new gradoController();

    $registro = $eliminargrado->eliminarGrado(); //El registro completo de la BD

    $eliminargrado->confirmarBorrarGrado();
    
    if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>
<form method="post">

    <?php echo $_SESSION['nombres']." ".$_SESSION['apellidos']; ?>
    <br>
    <div class="alert alert-light" role="alert">
    <?php echo $registro['nombreg']; ?>
    <p>¿Seguro que quiere eliminar grado?</p>
    </div>
    <input type="hidden" name="idgrado" value="<?php echo $registro['idgrado'];?>">

    <button type="submit" class="btn btn-primary">Borrar</button>

    <div class="form-group">
    <div class="row mt-3">
           <!-- Botón de Cancelar -->
     <div class="col-2"><a href="index.php?action=mostrarGrado" class="btn btn-secondary">Cancelar</a></div>
     </div>
</form>
<?php
   }
?>
