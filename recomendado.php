<?php
$mysqli = new mysqli("localhost", "id4489618_admin", "admin", "id4489618_libreria");
$mysqli->set_charset('utf8');


define('FPDF_FONTPATH', 'tfpdf/font/');
require('./tfpdf/tfpdf.php');

$pdf = new PDF( 'P', 'mm', 'A4' );

$pdf->AddPage();

// Cargamos las fuentes Unicode.
$fuenteUtf8='DejaVu';
$pdf->AddFont($fuenteUtf8, '', 'DejaVuSansCondensed.ttf', true);
$pdf->AddFont($fuenteUtf8, 'B', 'DejaVuSansCondensed-Bold.ttf', true);
$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 


$pdf->SetFont('Helvetica', '', 14);
$pdf->Image('./imagenes/logo.png',10,10,-100);
$pdf ->Cell(20,40, $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y'));
$pdf->Ln();
$pdf->Write(5, 'Libro recomendado y más vendidos');
$pdf->Ln();
$pdf->SetFont($fuenteUtf8, 'B', 10);
$pdf->Cell(22, 7, 'Precio EUR', 1);
$pdf->Cell(90, 7, 'Titulo', 1);
$pdf->Cell(55, 7, 'Autor', 1);
$pdf->Cell(25, 7, 'Relevancia', 1);
$pdf->Ln();

$pdf->SetFont('Helvetica', '', 10);

$result = $mysqli->query("SELECT * FROM productos ORDER BY destacado desc,cantidadcompra desc");
$comprados=0;
while ($row = $result->fetch_assoc()) {
    if ($row['destacado']){
    $pdf->Cell(22, 7, $row['precio'], 1);
    $pdf->Cell(90, 7, $row['titulo'], 1);
    $pdf->Cell(55, 7, $row['autor'], 1);
    $pdf->Cell(25, 7, 'Recomendado', 1);
    $pdf->Ln();
}else{
    if ($comprados<3){
        $comprados++;
    $pdf->Cell(22, 7, $row['precio'], 1);
    $pdf->Cell(90, 7, $row['titulo'], 1);
    $pdf->Cell(55, 7, $row['autor'], 1);
    $pdf->Cell(25, 7, 'Más Vendido', 1);
    }
    $pdf->Ln();
}
}
$pdf->Output();
exit;
?>