<?php
use Controller\gradoController;

$grados = new gradoController;
$listado = $grados->mostrarGradoC();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Grado</title>
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
        <h4>LISTADO DE GRADOS</h4>
        <a href="index.php?action=pdfGrado" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Descargar PDF</button>
        </a>
        <a href="index.php?action=excelGrado" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Descargar Excel</button>
        </a>
    </div>
    <br>
    <table class="table mt-3" id="tabla">
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>GRADO</th>
                <th>ACCION</th>
                <th>ACCION</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listado as $item): ?>
                <tr>
                    <td><?php echo $item['idgrado']; ?></td>
                    <td><?php echo $item['nombreg']; ?></td>
                    <td><a href='index.php?action=editarGrado&idgrado=<?php echo $item['idgrado']; ?>'><button type="button" class="btn btn-warning">Editar</button></a></td>
                    <td><a href='index.php?action=eliminarGrado&idgrado=<?php echo $item['idgrado']; ?>'><button type="button" class="btn btn-danger">Eliminar</button></a></td>
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
