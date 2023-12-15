<?php
use Controller\alumnosController;

require 'Model/ConexionModel.php';
require 'Controller/alumnosController.php';
require 'Model/alumnosModel.php';

ob_start(); // Llenar el buffer para pasar a una variable y luego a Dompdf
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Alumnos</title>

    <style>
        /* Estilos CSS para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .btn {
            padding: 6px 12px;
        }
    </style>
</head>

<body>
    <div class="titulo center">LISTADO ALUMNOS</div>
    <table class="table mt-3" id="tabla">
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>NOMBRE</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>APELLIDO</th>
                <th>NACIMIENTO</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
            // Crear una instancia del controlador y obtener los datos de la base de datos
            $alumnosController = new alumnosController();
            $listado = $alumnosController->mostrarAlumno();

            foreach ($listado as $row => $item) : ?>
                <tr>
                    <td><?php echo $item['idalumno']; ?></td>
                    <td><?php echo $item['pnombre']; ?></td>
                    <td><?php echo $item['snombre']; ?></td>
                    <td><?php echo $item['papellido']; ?></td>
                    <td><?php echo $item['sapellido']; ?></td>
                    <td><?php echo $item['fecha_nacimiento']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>

<?php
$html = ob_get_clean(); // En $html está almacenado todo el HTML para pasarlo a PDF

require_once 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Configuración de opciones
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true);

// Crear instancia de Dompdf
$dompdf = new Dompdf($options);

// Agregar esta línea para habilitar PHP en Chrome
$dompdf->set_option('isPhpEnabled', true);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter', 'portrait');

// Renderizar PDF
$dompdf->render();

// Descargar o mostrar en línea el PDF
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();
?>
