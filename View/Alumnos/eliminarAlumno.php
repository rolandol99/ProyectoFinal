<?php
    use Controller\alumnosController;
    $alumnosController = new alumnosController();

    $registro = $alumnosController->borrarAlumno(); //El registro completo de la BD
    $alumnosController->confirmarBorrarAlumno();

   if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>

<form method="post">

        <div class="alert alert alert-dismissible alert-primary" role="alert">
            <h5 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h5>
        </div>

    <?php echo $_SESSION['nombres']." ".$_SESSION['apellidos']; ?>
    <br>
    <?php echo $registro['pnombre']; ?>
    <p>¿Seguro que quiere eliminar alumno?</p>

    <input type="hidden" name="idalumno" value="<?php echo $registro['idalumno'];?>">

    <button type="submit" class="btn btn-primary">Borrar</button>
</form>
<?php
   }
?>