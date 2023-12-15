<?php
use Controller\asignacionController;

  //  if(!empty($_SESSION['id']) ){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$asignaciones = new asignacionController;
$listado = $asignaciones->mostrarAsignacionC();
?>
            <div class="alert alert alert-dismissible alert-primary" role="alert">
                <h5 class="letra-negra"> <?php echo "Usuario:   ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h5>
            </div>
            

<div>
       <h4 >LISTADO ASIGNACION ALUMNOS CURSOS</h4>
        <a href="index.php?action=pdfAsignacion" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Descargar PDF</button>
        </a>
        <a href="index.php?action=excelGrado" class="btn btn-sm btn-primary">
            <button type="button" class="btn btn-sm btn-primary">Descargar Excel</button>
        </a>
    </div>
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
<script >
    var tabla= document.querySelector("#tabla");

    var dataTable = new DataTable(tabla);
</script>
</body>
</html>
<?php //} ?>