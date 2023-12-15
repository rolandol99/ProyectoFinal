<?php
use Controller\gradoController;

require 'Model/ConexionModel.php';
require 'Controller/gradoController.php';
require 'Model/gradoModel.php';

ob_start(); // Llenar el buffer para pasar a una variable y luego a Dompdf

   // if(!empty($_SESSION['id']) ){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$grados = new gradoController;
$listado = $grados->mostrarGradoC();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdf Grado</title>

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
<h4 >LISTADO DE GRADOS</h4>

<table class="table mt-3">
    <thead>
        <tr    class="table-primary">
            <th scope="row">ID</th>
            <td>GRADO</td>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['idgrado']; ?></td>
                <td><?php echo $item['nombreg']; ?></td>
                
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

// Descargar el PDF
//$dompdf->stream("documento.pdf", array("Attachment" => false));

// Descargar o mostrar en línea el PDF
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=ListaGrados.pdf");
echo $dompdf->output();
?>