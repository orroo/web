<?php
require_once '../fpdf186/fpdf.php';
include_once '../controller/facturec.php';




$c1 = new factureC();
$liste=$c1->listfact();
$somme=0;


$pdf=new FPDF();
$pdf->Addpage();
$pdf->SetFont('Arial', 'B', 18);

foreach($liste as $r)
{


    $pdf->Cell(0,10,'' ,0,1);
    $pdf->Cell(0,10,'id facture' .$r['id_facture'],1,1 ); 
    $pdf->Cell(0,10,'id_client  : ' .$r['id_client'] ,1,1);
    $pdf->Cell(0,10,'prix  : ' .$r['prix'] ,1,1);
    $pdf->Cell(0,10,'email  : ' .$r['email'] ,1,1);
    $somme+= $r['prix']; 
}

$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(132); 
$pdf->Cell(0,10,'prix totale  :' .$somme ,1,1); 

$pdf->Output(); 

?>