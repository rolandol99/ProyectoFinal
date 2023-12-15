<?php
use Controller\CursoController;
//use Phpoffice\Phpspreadsheet\src\Spreadsheet;
use phpoffice\phpspreadsheet\src\PhpSpreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

require 'Model/ConexionModel.php';
require 'Controller/CursoController.php';
require 'Model/CursoModel.php';

// Crear una instancia de la clase controladora
$cursosController = new CursoController();
$listado = $cursosController->mostrarCurso();

// Crear una instancia de la hoja de cálculo
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Agregar encabezados
$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'CURSO');
$sheet->setCellValue('C1', 'GRADO');

// Agregar datos desde la base de datos
$row = 2;
foreach ($listado as $item) {
    $sheet->setCellValue('A' . $row, $item['idcurso']);
    $sheet->setCellValue('B' . $row, $item['curso']);
    $sheet->setCellValue('C' . $row, $item['grado']);
    $row++;
}

// Crear un objeto de escritura para exportar a formato Excel (xlsx)
$writer = new Xlsx($spreadsheet);

// Establecer las cabeceras para forzar la descarga
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="listado_cursos.xlsx"');
header('Cache-Control: max-age=0');

// Enviar la salida del escritor al navegador
$writer->save('php://output');
