<?php
    use Controller\UsuarioController;
    $usuarioController = new UsuarioController();
    
    $registro = $usuarioController->editarUsuario($_GET['id']);

    $usuarioController->actualizarUsuario();//Enviar los nuevos datos a la BD

    if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION

?>

<form method="POST">


<div class="form-group">
    <div class="row mb-3">
        <div class="col-2"><label>Nombre</label></div>
        <h3> <?php echo $_SESSION['nombres']." ".$_SESSION['apellidos'];?> </h3>        
    </div>
</div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Nombres</label>
                <input class="form-control" id="readOnlyInput" type="text" name="nombres" placeholder="Ingrese el Nombre de Usuario.."  value="<?php echo $registro['nombres']; ?>" required>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Apellidos</label>
                <input class="form-control" id="readOnlyInput" type="text" name="apellidos" placeholder="Ingrese el Apellido de Usuario..."  value="<?php echo $registro['apellidos']; ?>" required>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Usuario</label>
                <input class="form-control" id="readOnlyInput" type="text" name="usuario" placeholder="Ingrese el Nombre de Usuario..."  value="<?php echo $registro['usuario']; ?>" required>
            </fieldset>
        </div>

        <div class="form-group">
            <fieldset>
                <label class="form-label mt-4" for="readOnlyInput">Rol</label>
                <input class="form-control" id="readOnlyInput" type="text" name="rol" placeholder="Ingrese el Apellido de Usuario..."  value="<?php echo $registro['rol']; ?>" required>
            </fieldset>
        </div>

<input type="hidden" name="idusuario" value="<?php echo $registro['id'];?>">

<div class="form-group">
    <div class="row mt-3">
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</div>
</form>
<?php } ?>