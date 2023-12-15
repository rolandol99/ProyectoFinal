<?php
require 'vendor/autoload.php'; //Composer
use Controller\gradoController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
require 'Model/ConexionModel.php';
require 'Controller/gradoController.php';
require 'Model/gradoModel.php';
// Crear instancia, clase controller
$gradoController = new gradoController();
$listado = $gradoController->mostrarGradoC();
// Crear instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Agregar encabezados
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'GRADO');
// Agregar datos desde la base de datos
//print_r ($listado); //Para mostrar la salida del array que datos está trae de la DB grados.
$row = 2;
foreach ($listado as $item) {
    $sheet->setCellValue('A' . $row, $item['idgrado']);
    $sheet->setCellValue('B' . $row, $item['nombreg']);
    $row++;
}
// Crea objeto de escritura para exportar a formato Excel (xlsx)
$writer = new Xlsx($spreadsheet);
// Establecer las cabeceras para forzar la descarga
ob_end_clean();
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listadogrados.xlsx"');
header('Cache-Control: max-age=0');
// Enviar la salida del escritor al navegador
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
?>
