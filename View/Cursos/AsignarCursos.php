<?php
use Controller\CursoController;
use Controller\alumnosController;
use Controller\asignacionController;

$alumnosController = new alumnosController();
$cursosController = new CursoController();
$asignacionController = new asignacionController();

if (!empty($_SESSION['id'])) {
    ?>
    <?php echo "Usuario" . $_SESSION['id']; // para mostrar usuario logeado.?>  
    <h4>ASIGNACIÓN DE CURSOS</h4>

    <div class="container-login">
        <form class="form-1" method="POST">

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>ALUMNO:</label></div>
                    <select name="idalumno">
                        <?php
                        foreach ($alumnosController->mostrarAlumno() as $row => $item) {
                            echo "<option value='{$item['idalumno']}'>{$item['pnombre']} {$item['papellido']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="row mb-3">
                    <div class="col-2"><label>CURSO:</label></div>
                    <select name="idcurso">
                        <?php
                        foreach ($cursosController->mostrarCurso() as $row => $item) {
                            echo "<option value='{$item['idcurso']}'>{$item['curso']} {$item['grado']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="row mt-3">
                    <button type="submit" class="form-control btn btn-primary">Asignar Cursos</button>
                </div>
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $postData = [
                'idalumno' => $_POST['idalumno'],
                'idcurso' => $_POST['idcurso'],
            ];

            $resultado = $asignacionController->inscribirAsignar($postData);
            if ($resultado == "guardado") {
                echo "<div class='alert alert-success mt-5' role='alert'>
                            Asignación de cursos ingresados satisfactoriamente.
                         </div>";
            } elseif ($resultado == "error") {
                echo "<div class='alert alert-danger mt-5' role='alert'>
                            Error
                         </div>";
            }
        }
        ?>

    </div>

<?php
}
?>
