<?php
use Controller\asignacionController;

    if(!empty($_SESSION['id']) ){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$asignaciones = new asignacionController;
$listado = $asignaciones->mostrarAsignacionC();
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
                <h1 class="letra-negra"> <?php echo $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h1>
            </div>
<BR>            
<h4 >LISTADO ASIGNACION ALUMNOS CURSOS</h4>
<a href="index.php?action=pdfAsignacion">pdf</a>
<a href="index.php?action=excelAsignacion">excel</a>
<table class="table mt-3" id="tabla">
    <thead>
        <tr class="table-primary">
            <th scope="row">ID</th>   
            <td>ALUMNO</td>
            <td>NOMBRES</td>
            <td>APELLIDOS</td>
            <td>GRADO</td>
            <td>CURSO</td>
            <td>ASIGNADO</td>
            <td>USUARIO</td>
            <td>ACCION</td>
            <td>ACCION</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['idasignacion']; ?></td>
                <td><?php echo $item['alumno']; ?></td>
                <td><?php echo $item['nombre1'] . ' ' . $item['nombre2']; ?></td>
                <td><?php echo $item['apellido1'] . ' ' . $item['apellido2']; ?></td>
                <td><?php echo $item['grado']; ?></td>
                <td><?php echo $item['curso']; ?></td>
                <td><?php echo $item['fecha_asigna']; ?></td>
                <td><?php echo $item['usuario']; ?></td>

                <td><a href='index.php?action=editarAsignacion&idasignacion=<?php echo $item['idasignacion']; ?>'><button type="button" class="btn btn-warning">Editar</button></a></td>
                <td><a href='index.php?action=eliminarAsignacion&idasignacion=<?php echo $item['idasignacion']; ?>'><button type="button" class="btn btn-danger">Eliminar</button></a></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    // Asegúrate de que el DOM esté completamente cargado antes de inicializar DataTable
    $(document).ready(function() {
        $('#tabla').DataTable();
    });
</script>
<?php } ?>