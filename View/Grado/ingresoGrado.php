<?php
use Controller\gradoController;

$ingresogr = new gradoController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = $ingresogr->ingresoGrados();
}

?>
<link rel="stylesheet" href="View/miestilo.css">
<div class="container">
        <div class="alert alert alert-dismissible alert-primary" role="alert">
            <h5 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h5>
        </div>
    <h3>INGRESO GRADO DE ESTUDIOS ESCOLARES</h3>
    <br><br>
    <form method="POST">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>GRADO ESCOLAR:</label></div>
                <div class="col-10"><input class="form-control" type="text" name="nombreg" required></div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

            <div class="row mt-1">
                <a href="index.php?action=ingresoGrado" class="btn btn-secondary">Nuevo Ingreso</a>
            </div>
        </div>
    </form>

    <?php
    if (isset($resultado)) {
        if ($resultado === "guardado") {
            echo "<div class='alert alert-success mt-5' role='alert'>Ingresado satisfactoriamente</div>";
        } elseif ($resultado === "error") {
            echo "<div class='alert alert-danger mt-5' role='alert'>Error al guardar el producto nuevo</div>";
        }
    }
    ?>
</div>
