<?php
use Controller\CursoController;
use Controller\gradoController;

$ingresocur = new CursoController();
$grados = new gradoController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $ingresocur->ingreso();
}
?>

    <link rel="stylesheet" href="View/miestilo.css">

<div class="container">
        <form method="POST" action="">
        <div class="alert alert alert-dismissible alert-primary" role="alert">
            <h5 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h5>
        </div>
    <br>
    <h2>INGRESO CURSOS:</h2>
    <br>

        <div class="form-group" mt-2>
            <div class="row mb-3">
                <div ><label>CURSO:</label></div>
                <div class="col-10"><input class="form-control" type="text" name="nombrec" required></div>
            </div>
        </div>

        <div class="form-group" mt-2>
            <div class="row mb-3">
                <div class="col-2"><label>GRADO:</label></div>
                <select name="fkgrado">
                    <?php
                    foreach ($grados->mostrarGradoC() as $row => $item) {
                        echo "<option value='{$item['idgrado']}'>{$item['nombreg']}</option>";
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
                <a href="index.php?action=IngresoCursos" class="btn btn-secondary">Nuevo Ingreso</a>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $resultado = $ingresocur->ingreso();

        if ($resultado == "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>
                        Curso ingresado.
                    </div>";
        } elseif ($resultado == "error") {
            echo "<div class='alert alert-danger mt-5' role='alert'>
                        Error
                    </div>";
        }
    }//CIERRE DE VALIDACION, INICIO SESION OBLIGADO
    ?>

</div>
