<?php
use Controller\CursoController;

$cursos = new CursoController;
$listado = $cursos->mostrarCurso();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Agrega las dependencias de DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
</head>
<body> 
        <div class="alert alert alert-dismissible alert-primary" role="alert">
                <h6 class="letra-negra"> <?php echo "Usuario:   ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h6>
        </div>
<div>
        <h4>LISTADO DE CURSOS</h4>
        <a href="index.php?action=pdfCursos" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Exportar PDF</button>
        </a>
        <a href="index.php?action=excelGrado" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Exportar Excel</button>
        </a>
    </div>
<table class="table mt-3" id="tabla">
    <thead>
        <tr class="table-primary">
            <th scope="row">ID</th>
            <td>CURSO</td>
            <td>GRADO</td>
            <td>ACCION</td>
            <td>ACCION</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['idcurso']; ?></td>
                <td><?php echo $item['curso']; ?></td>
                <td><?php echo $item['grado']; ?></td>
                <td><a href='index.php?action=editarCursos&idcurso=<?php echo $item['idcurso']; ?>'><button type="button" class="btn btn-warning">Editar</button></a></td>
                <td><a href='index.php?action=eliminarCursos&idcurso=<?php echo $item['idcurso']; ?>'><button type="button" class="btn btn-danger">Eliminar</button></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script >
    var tabla= document.querySelector("#tabla");

    var dataTable = new DataTable(tabla);
</script>
</body>
</html>
