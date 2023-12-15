<?php
use Controller\alumnosController;

$alumnosController = new alumnosController();

if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION
    ?>

    

    <div class="container">

        <form method="POST" action="">

            <div class="alert alert alert-dismissible alert-primary" role="alert">
                <h5 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h5>
            </div>

            <h3>INGRESO ALUMNOS</h3>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Primer Nombre:</label>
                    <input class="form-control" type="text" name="pnombre" placeholder="Ingrese el Primer nombre del alumno..." required>
                </fieldset>
            </div>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Segundo Nombre:</label>
                    <input class="form-control" type="text" name="snombre" placeholder="Ingrese el Segundo Nombre del alumno..." >
                </fieldset>
            </div>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Primer Apellido:</label>
                    <input class="form-control" type="text" name="papellido" placeholder="Ingrese el Primer Apellido del alumno..." required>
                </fieldset>
            </div>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Segundo Apellido:</label>
                    <input class="form-control" type="text" name="sapellido" placeholder="Ingrese el Segundo Apellido del alumno...">
                </fieldset>
            </div>
          
            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label mt-4" for="readOnlyInput">Fecha Nacimiento:</label>
                    <input class="form-control" type="date" name="fecha_nacimiento" placeholder="Ingrese Fecha de nacimiento del alumno..." required>
                </fieldset>
            </div>

            <div class="form-group">
                <div class="row mt-2">
                    <button type="submit" class="btn btn-outline-info m-3">Ingresar Alumno</button>
                </div>
            </div>

            <div class="form-group">
    <div class="row mt-3">
           <!-- Botón de Cancelar -->
     <div class="col-2"><a href="index.php?action=ingresoAlumno" class="btn btn-secondary">Nuevo ingreso</a></div>

    </div>

        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $resultado = $alumnosController->inscribirAlumno();
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
