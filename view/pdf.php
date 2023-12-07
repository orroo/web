<?php
include_once '../controller/send.php';
include_once '../model/credentials.php';
require_once '../fpdf186/fpdf.php';
include_once '../controller/facturec.php';
include_once '../model/facture.php';

$error = "";

$c = new credentialsC();
$c1 = new factureC();

$mail=$_GET['email'];
$ids=$_GET['prix'];
$fact=$_GET['id_facture'];

$tab = $c->showcred($mail);
$tab1 = $c1->showfac($fact);





$pdf=new FPDF();
$pdf->Addpage();
$pdf->SetFont('Arial', 'B', 30);


$pdf->Cell(0,10,'receipt' ,0,1,'C');
$pdf->SetFont('Arial', 'B', 18);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'address:  ' .$tab['address'] ,1,1);
$pdf->Cell(0,10,'city:  ' .$tab['city'] ,1,1);
$pdf->Cell(0,10,'country:  ' .$tab['state'] ,1,1);
$pdf->Cell(0,10,'zip code:  ' .$tab['zip_code'] ,1,1);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);

$pdf->Cell(0,10,'bill to: ' .$tab['full_name'] ,1,1);
$pdf->Cell(0,10,'id user: ' .$tab['id_user'] ,1,1);
$pdf->Cell(0,10,'id bill: '.$tab1['id_facture'],1,1);


$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(0,10,'' ,0,1);

$pdf->Cell(132);
$pdf->Cell(0,10,'price: ' .$ids  ,1,1);
$pdf->Output();

?>