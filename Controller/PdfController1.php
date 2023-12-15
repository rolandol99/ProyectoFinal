<?php
namespace Controller;
require 'vendor/autoload.php'; //Composer
//require 'vendor/autoload.php';
use Dompdf\Dompdf;

use Controller\UsuarioController;

class PdfController{
    
    public function generate(){
        $usuarios = new UsuarioController();
        $lisUsuarios = $usuarios-> listPdfUsuarios();
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Hola mundo</h1>
        <br>
            <table style"Border: 1px solid black;">
                <tr>Nombres</tr>
                <tr>Apellidos</tr>
                <tr>
                    <td> Roland López</td>
                </tr>
            </table>

        <a href="https://parzibyte.me/blog">By Parzibyte</a>');
        $dompdf->render();
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        echo $dompdf->output();
        ob_end_clean();//Limpiar las etiquetas del header
        //$pdf->Output();
    }
}
?>