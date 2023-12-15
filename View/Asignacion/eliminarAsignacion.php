<?php
    use Controller\asignacionController;
    $asignacionController = new asignacionController();

    $registro = $asignacionController->borrarAsignacion(); //El registro completo de la BD
    $asignacionController->confirmarBorrarAsignacion();

   if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>

<form method="post">
      <div class="alert alert-light" role="alert">
            <h5><?php echo "Usuario:" . $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?></h5>
      </div>  
    
    <br>
    
    <?php echo $registro['idasignacion']; ?>
    <p>¿Seguro que quiere eliminar Asignación?</p>

    <input type="hidden" name="idasignacion" value="<?php echo $registro['idasignacion'];?>">
    
    <button type="submit" class="btn btn-primary">Borrar</button>

    <div class="form-group">
    <div class="row mt-3">
           <!-- Botón de Cancelar -->
     <div class="col-2"><a href="index.php?action=mostrarAsignacion" class="btn btn-secondary">Cancelar</a></div>
     </div>

</form>

<?php
   }
?>