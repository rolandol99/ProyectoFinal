<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

$html = '<html><body><p>Hello, world!</p></body></html>';

$options = new Options();
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);

// (Opcional) Configurar opciones de PDF (tamaño, orientación, etc.)
$dompdf->setPaper('A4', 'portrait');

// Renderizar el PDF (salida a pantalla o archivo)
$dompdf->render();

// Guardar el PDF en un archivo
$output = $dompdf->output();
file_put_contents('output.pdf', $output);

echo 'PDF generado correctamente.';
