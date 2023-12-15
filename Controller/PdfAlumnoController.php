<?php
namespace Controller;
use Model\alumnosModel;
use Controller\alumnosController;

require 'vendor/autoload.php'; //Composer

use FPDF;
use Model\InscripcionModel;

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('Assets/logo_intecap.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',12);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(20,10,utf8_decode('Reporte Asignación Cursos'),0,1,'C');
    // Line break
    $this->Ln(20);

    $this->Cell(50,10, 'NOMBRE1', 1, 0, 'C', 0);
    $this->Cell(50,10, 'NOMBRE2', 1, 0, 'C', 0);
    $this->Cell(50,10, 'APELLIDO1', 1, 0, 'C', 0);
    $this->Cell(50,10, 'APELLIDO2', 1, 0, 'C', 0);
    $this->Cell(50,10, 'FECHA NACIMIENTO', 1, 1, 'C', 0);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,utf8_decode('Page ').$this->PageNo().'/{nb}',0,0,'C');
}
}

class PdfController {
    
    public function generate()
    {
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', '', 12);

        // Llamar a un controlador y obtener datos de la BD
        // Usuarios -> Obtengo listado
        $alumnosController = new alumnosController();
        $listado = $alumnosController->mostrarAlumno();

        // Iterar sobre los resultados de la consulta directamente
        while ($row = $listado->fetch(\PDO::FETCH_ASSOC)) {
            $pdf->Cell(50, 10, $row['pnombre'], 1, 0, 'C', 0);
            $pdf->Cell(50, 10, $row['snombre'], 1, 0, 'C', 0);
            $pdf->Cell(50, 10, $row['papellido'], 1, 0, 'C', 0);
            $pdf->Cell(50, 10, $row['sapellido'], 1, 0, 'C', 0);
            $pdf->Cell(50, 10, $row['fecha_nacimiento'], 1, 1, 'C', 0);
        }

        ob_end_clean();
        $pdf->Output();
        
    }
}

?>