<?php

use Controller\UsuarioController;

$usuarioController = new UsuarioController();

if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION
    ?>

    

    <div class="container">

        <form method="POST" action="">

            <div class="alert alert alert-dismissible alert-primary" role="alert">
                <h1 class="letra-negra"> <?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h1>
            </div>

            <h3>INGRESO USUARIO</h3>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Nombres:</label>
                    <input class="form-control" type="text" name="nombres" placeholder="Ingrese el Primer nombre del alumno..." required>
                </fieldset>
            </div>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Apellidos:</label>
                    <input class="form-control" type="text" name="apellidos" placeholder="Ingrese el Segundo Nombre del usuario..." >
                </fieldset>
            </div>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Usuario:</label>
                    <input class="form-control" type="text" name="usuario" placeholder="Ingrese el Primer Apellido del usuario..." required>
                </fieldset>
            </div>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Rol:</label>
                    <input class="form-control" type="text" name="rol" placeholder="Ingrese el Segundo rol del usuario...">
                </fieldset>
            </div>

            <div class="form-group">
                <div class="row mt-2">
                    <button type="submit" class="btn btn-outline-info m-3">Ingresar Usuarios</button>
                </div>
            </div>

            <div class="form-group">
    <div class="row mt-3">
           <!-- Botón de Cancelar -->
     <div class="col-2"><a href="index.php?action=ingresoUsuario" class="btn btn-secondary">Nuevo ingreso</a></div>

    </div>

        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $resultado = $usuarioController->crearUsuarioEstudiante();
            if ($resultado == "guardado") {
                echo "<div class='alert alert-success mb-5' role='alert'>
                        Alumno ingresado con éxito.
                     </div>";
            } elseif ($resultado == "error") {
                echo "<div class='alert alert-danger mb-5' role='alert'>
                        Error
                     </div>";
            }
        }
        ?>
    </div>

    <?php
}
?>
