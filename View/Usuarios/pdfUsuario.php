<?php
use Controller\UsuarioController;
//if(!empty($_SESSION['id']) ){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION
require 'Model/ConexionModel.php';
require 'Controller/UsuarioController.php';
require 'Model/UsuarioModel.php';

ob_start(); // Llenar el buffer para pasar a una variable y luego a Dompdf

$usuarios = new UsuarioController;
$listado = $usuarios->mostrarU();
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pdf_Usuarios</title>
    <!-- <link rel="stylesheet" href="View/estilopdf.css"> -->
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
<h4>LISTADO DE USUARIOS</h4>

<table class="table mt-3">
    <thead>
        <tr class="table-primary">
            <th scope="row">ID</th>
            <td>NOMBRES</td>
            <td>APELLIDOS</td>
            <td>USUARIO</td>
            <td>ROL</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo isset($item['nombres']) ? $item['nombres'] : ''; ?></td>
                <td><?php echo isset($item['apellidos']) ? $item['apellidos'] : ''; ?></td>
                <td><?php echo $item['usuario']; ?></td>
                <td><?php echo $item['rol']; ?></td>
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
header("Content-Disposition: inline; filename=listo_cursos.pdf");
echo $dompdf->output();
?>
