<?php

    use Controller\UsuarioController;
    $usuario = new UsuarioController();

?>

<h1>Iniciar sesión</h1>

<div class="container">

    <form method="POST">


        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Usuario</label></div>
                <div class="col-10"><input class="form-control" type="text" name="usuario" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Nombres</label></div>
                <div class="col-10"><input class="form-control" type="text" name="nombres" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mb-3">
                <div class="col-2"><label>Apellidos</label></div>
                <div class="col-10"><input class="form-control" type="text" name="apellidos" required></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Contraseña</label></div>
                <div class="col-10"><input type="text" class="form-control" name="password"></input></div>
            </div>
        </div>

        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-primary">Crear cuenta</button>
            </div>
        </div>
    </form>



        <?php
        $resultado = $usuario->crearUsuarioEstudiante();
            if($resultado == false){
                echo "<div class='alert alert-danger mt-5' role='alert'>
                        Error en los datos
                     </div>";
            }
        ?>

</div>