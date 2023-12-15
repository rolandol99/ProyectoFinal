<?php

    use Controller\InscripcionController;

    use Controller\CategoriaController;

    $categoria = new CategoriaController();
    $inscripcion = new InscripcionController();

    if(!empty($_SESSION['id'])){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION
?>

<h1>Página de inscripción por categoria</h1>

<div class="container">

    <form method="POST">

    <div class="alert alert alert-dismissible alert-primary" role="alert">
         <h1 class="letra-negra"> <?php echo $_SESSION['nombres']." ".$_SESSION['apellidos']; ?> </h1>
    </div>

        <div class="form-group mt-4">
            <div class="row">
                <div class="col-2 mt-3 text-success-emphasis"><label>Categoria</label></div>
                <div class="col-10">
                <select class="form-select" name="idcategoria">
                        <?php
                            foreach($categoria->mostrar() as $row => $item){
                                echo "<option value='{$item['id']}'>{$item['categoria']}</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group">
            <div class="row mt-3">
                <button type="submit" class="btn btn-outline-info m-3">Siguiente</button>
            </div>
        </div>
    </form>



        <?php
        $inscripcion->inscribir();
            echo "
            <form method='post'>

            <div class='form-group mt-3'>
            <div class='row'>
                <div class='col-2 mt-3 text-primary-emphasis'><label>Curso</label></div>
                <div class='col-10'>
                <select class='form-select' name='idcurso'>
            ";
      
                foreach($categoria->mostrarCursos() as $row => $item){
                    echo "<option value='{$item['id']}'>{$item['curso']}</option>";
                }
        echo "
                    </select>
                </div>
            </div>
        </div>
       
        <div class='form-group'>
            <div class='row mt-3'>
                <button type='submit' class='btn btn-outline-success m-3'>Inscribir</button>
            </div>
        </div>

            </form>
            ";
        }//CIERRE DE VALIDACION, INICIO SESION OBLIGADO


        ?>

</div>