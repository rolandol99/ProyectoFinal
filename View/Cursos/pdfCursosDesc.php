<?php
use Controller\CursoController;

require 'Model/ConexionModel.php';
require 'Controller/CursoController.php';
require 'Model/CursoModel.php';

// Iniciar el buffer de salida
ob_start();

$cursosController = new CursoController();
$listado = $cursosController->mostrarCurso();

// Obtener la fecha actual para incluirla en el nombre del archivo PDF
$fechaActual = date('Ymd_His');

// Establecer el tipo de contenido y las cabeceras para forzar la descarga
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="Listado_Cursos_' . $fechaActual . '.pdf"');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Cursos</title>

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
<BR></BR>
<h4 >LISTADO DE CURSOS</h4>

<table class="table mt-3">
    <thead>
        <tr class="table-primary">
            <th scope="row">ID</th>
            <td>CURSO</td>
            <td>GRADO</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['idcurso']; ?></td>
                <td><?php echo $item['curso']; ?></td>
                <td><?php echo $item['grado']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>

<?php
// Obtener el contenido del buffer de salida
$html = ob_get_clean();

// Cargar la biblioteca Dompdf
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

// Cargar el HTML en Dompdf
$dompdf->loadHtml($html);

// Establecer el tamaño del papel
$dompdf->setPaper('letter', 'portrait');

// Renderizar el PDF
$dompdf->render();

// Enviar el PDF al navegador para forzar la descarga
$dompdf->stream();
?>
