<?php
    use Controller\gradoController;
    $editargrado = new gradoController();

    $registro = $editargrado->editarGrado();//array trae los campos de BD

    $editargrado->actualizarGrado();//Enviar los nuevos datos a la BD

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $resultado = $ingresogr->ingresoGrados();
    }
?>
<link rel="stylesheet" href="View/miestilo.css"> 
<H1>EDITAR GRADO</H1>

<form method="POST">


<div class="form-group">
    <div class="row mb-3">
        <div class="col-2"><label>Grado</label></div>
        <div class="col-10"><input class="form-control" type="text" name="nombreg" value="<?php echo $registro['nombreg']; ?>" required></div>
    </div>
</div>

<input type="hidden" name="idgrado" value="<?php echo $registro['idgrado'];?>">

<div class="form-group">
    <div class="row mt-3">
        <button type="submit" class="btn btn-primary">Actualizar</button>
        <br><BR>  
</div>

<div class="form-group">
    <div class="row mt-3">
           <!-- Botón de Cancelar -->
     <div class="col-2">
        <a href="index.php?action=mostrarGrado" class="btn btn-secondary">Cancelar</a></div>
     </div>
</div>
</form>