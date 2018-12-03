<?php
session_start();
session_destroy();
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
$result2 = $mysqli->query("SELECT * from compra order by cantidad limit 1");
while ($row = $result2->fetch_assoc()) {
   
    $pdf->Write(5,'NOMBRE: '. $row['nombre']);
    $pdf->Ln();
    $pdf->Write(5,'DIRECCION: '. $row['direccion']);
    $pdf->Ln();
    $pdf->Write(5,'TARJETA: '. $row['tarjeta']);

    
}

$pdf->Ln();
$pdf->SetFont($fuenteUtf8, 'B', 10);
$pdf->Cell(22, 7, 'precio EUR', 1);
$pdf->Cell(90, 7, 'Titulo', 1);
$pdf->Cell(55, 7, 'cantidad', 1);

$pdf->Ln();

$pdf->SetFont('Helvetica', '', 10);

$result = $mysqli->query("SELECT * FROM compra");
$comprados=0;
while ($row = $result->fetch_assoc()) {
   
    $pdf->Cell(22, 7, number_format($row['precio'],2), 1);
    $pdf->Cell(90, 7, $row['titulo'], 1);
    $pdf->Cell(55, 7, $row['cantidad'], 1);
   
    $pdf->Ln();

    
}
$result3 = $mysqli->query("SELECT *,sum(precio*cantidad) as total from compra");
while ($row = $result3->fetch_assoc()) {
   
    $pdf->Write(5,'TOTAL: €'. number_format($row['total'],2));
    $pdf->Ln();
    $pdf->Write(5,'IMPUESTO: €'.number_format( $row['total']*0.21,2));
    $pdf->Ln();
    $pdf->Write(5,'PAGO TOTAL: €'.number_format(($row['total']*0.21)+$row['total'],2));

    
}

$query_NuevaNoticia = $mysqli->query("truncate table compra");

$pdf->Output();
exit;
?>