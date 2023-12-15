<?php
    use Controller\FormularioController;
    $formulario = new FormularioController();
?>

<h1>Página de contácto</h1>

<div class="container">

    <form method="POST">
        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Email</label></div>
                <div class="col-10"><input class="form-control" type="email" name="email" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombre</label></div>
                <div class="col-10"><input class="form-control" type="text" name="nombre" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Comentario</label></div>
                <div class="col-10"><textarea class="form-control" class="w-100" name="comentario"></textarea></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>

    <?php $formulario->procesarFormulario(); ?>

</div>