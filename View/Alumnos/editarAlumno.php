<?php
    use Controller\alumnosController;
    $alumnosController = new alumnosController();
    
    $registro = $alumnosController->editarAlumno();//array con los campos de BD
  
    $alumnosController->actualizarAlumno();//Enviar los nuevos datos a la BD

    if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION

?>

<form method="POST">


        <div class="alert alert alert-dismissible alert-primary" role="alert">
            <h5 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h5>
        </div>
        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Primer Nombre:</label>
                <input class="form-control" id="readOnlyInput" type="text" name="pnombre" placeholder="Ingrese el Nombre de Autor..."  value="<?php echo $registro['pnombre']; ?>" required>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Segundo Nombre:</label>
                <input class="form-control" id="readOnlyInput" type="text" name="snombre" placeholder="Ingrese el Nombre de Autor..."  value="<?php echo $registro['snombre']; ?>" required>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Primer Apellido:</label>
                <input class="form-control" id="readOnlyInput" type="text" name="papellido" placeholder="Ingrese el Apellido de Autor..."  value="<?php echo $registro['papellido']; ?>" required>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Seundo Apellido:</label>
                <input class="form-control" id="readOnlyInput" type="text" name="sapellido" placeholder="Ingrese el Nombre de Autor..."  value="<?php echo $registro['sapellido']; ?>" required>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">fecha de nacimiento:</label>
                <input class="form-control" id="readOnlyInput" type="text" name="fecha_nacimiento" placeholder="Ingrese el Apellido de Autor..."  value="<?php echo $registro['fecha_nacimiento']; ?>" required>
            </fieldset>
        </div>

<input type="hidden" name="idalumno" value="<?php echo $registro['idalumno'];?>">

<div class="form-group">
    <div class="row mt-3">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>
</form>
<?php } ?>