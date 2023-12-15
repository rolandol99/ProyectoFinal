<?php
use Controller\asignacionController;
use Controller\alumnosController;
use Controller\CursoController;

$inscripcion = new asignacionController();
$alumno = new alumnosController();
$curso = new CursoController();

if (!empty($_SESSION['id'])) {  //VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>

<link rel="stylesheet" href="View/miestilo.css">

<div class="container">
    <form method="POST" action="">

    <div class="alert alert alert-dismissible alert-primary" role="alert">
            <h5 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h5>
        </div>
        
<h3>ASIGNAR CURSOS:</h3>
<br>
        <div class="form-group" mt-2>
            <div class="row mb-3">
                <div class="col-2"><label>Alumno:</label></div>
                <select name="idalumno">
                    <?php
                    foreach ($alumno->mostrarAlumno() as $row => $item) {
                        echo "<option value='{$item['idalumno']}'>{$item['pnombre']}-{$item['snombre']}-{$item['papellido']}-{$item['sapellido']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group" mt-2>
            <div class="row mb-3">
                <div class="col-2"><label>Curso:</label></div>
                <select name="idcurso">
                    <?php
                    foreach ($curso->mostrarCursoGrado() as $row => $item) {
                        echo "<option value='{$item['idcurso']}'>{$item['nombrec']}----->{$item['nombreg']}</option>";
                    }
                    ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

            <div class="row mt-1">
                <a href="index.php?action=ingresoAsignar" class="btn btn-secondary">Nuevo Ingreso</a>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $resultado = $inscripcion->ingresoAsignacion();

        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                        Curso asignado al alumno.
                    </div>";
        } elseif ($resultado == "error") {
            echo "<div class='alert alert-danger mt-5' role='alert'>
                        Error
                    </div>";
        }
    }
    }//CIERRE DE VALIDACION, INICIO SESION OBLIGADO
    ?>
</div>
