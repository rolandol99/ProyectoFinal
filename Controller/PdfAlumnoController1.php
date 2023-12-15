<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php

    // Iterar sobre los resultados de la consulta directamente
    include("../cn.php");
    $consulta = $conn->prepare("SELECT * FROM alumno");
    $consulta->execute();
    $listado=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
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

    </tbody>
</table>


</body>
</html>

<?php
    $html=ob_end_clean();
    //echo $html;
    require_once '../vendor/libreria/dompdf/autoload.inc.php';
   
    use Dompdf\Dompdf;

    $dompdf = new Dompdf();

    $options = $dompdf->getOptions();
    $options->set(array('isRemoteEnable' => true));
    $dompdf->setOptions($options);

    $dompdf->setPapper('letter');
    //$dompdf->setPapper('A4','landscape');
    $dompdf->render();

    $dompdf->stream("reporte_pdf", array("Attachment" => false)); //con true solo descarga el archivo no lo muestra el archivo pdf




?>