<?php
namespace Controller;
use controller\InscripcionController;
//use Model\CursoModel;
//require('vendor/setasign/fpdf/fpdf.php');
require 'vendor/autoload.php'; //Composer
//require 'vendor/autoload.php';
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

    $this->Cell(50,10, 'NOMBRE', 1, 0, 'C', 0);
    $this->Cell(50,10, 'APELLIDO', 1, 0, 'C', 0);
    $this->Cell(50,10, 'CURSO ASIGNADO', 1, 1, 'C', 0);
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
    
    public function generate(){
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);

        // Llamar a un controlador y obtener datos de la BD
        // Usuarios -> Obtengo listado
        $estudiante = new InscripcionController();
        $inscripciones = $estudiante->MostrarAsignacioncur();
        
        // Iterar sobre los resultados de la consulta directamente
        while ($row = $inscripciones->fetch(\PDO::FETCH_ASSOC)) {
            $pdf->Cell(50, 10, $row['Nombre'], 1, 0, 'C', 0);
            $pdf->Cell(50, 10, $row['Apellido'], 1, 0, 'C', 0);
            $pdf->Cell(50, 10, $row['CursoAsignado'], 1, 1, 'C', 0);
        }
        
        ob_end_clean();
        $pdf->Output();
        
    }
}

?>