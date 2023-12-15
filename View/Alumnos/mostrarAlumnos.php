<?php
use Controller\alumnosController;

    //if(!empty($_SESSION['id']) ){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$alumnosController = new alumnosController;
$listado = $alumnosController->mostrarAlumno();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alumnos</title>

</head>
<body>  
<div class="alert alert alert-dismissible alert-primary" role="alert">
            <h6 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h6>
        </div>

<h4 >LISTADO DE ALUMNOS</h4>

<div>
        <a href="index.php?action=repAlumnos" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Generar PDF</button>
        </a>
        <a href="index.php?action=excelGrado" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Descargar Excel</button>
        </a>
    </div>
<table class="table mt-3" id="tabla">
    <thead>
        <tr class="table-primary" >
            <th scope="row">ID</th>
            <td>NOMBRE</td>
            <td>NOMBRE</td>
            <td>APELLIDO</td>
            <td>APELLIDO</td>
            <td>FECHA DE NACIMIENTO</td>
            <td>ACCION</td>
            <td>ACCION</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['idalumno']; ?></td>
                <td><?php echo $item['pnombre']; ?></td>
                <td><?php echo $item['snombre']; ?></td>
                <td><?php echo $item['papellido']; ?></td>
                <td><?php echo $item['sapellido']; ?></td>
                <td><?php echo $item['fecha_nacimiento']; ?></td>

                <td><a href='index.php?action=editarAlumnos&idalumno=<?php echo $item['idalumno']; ?>'><button type="button" class="btn btn-warning">Editar</button></a></td>
                <td><a href='index.php?action=eliminarAlumno&idalumno=<?php echo $item['idalumno']; ?>'><button type="button" class="btn btn-danger">Eliminar</button></a></td>

                    
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
