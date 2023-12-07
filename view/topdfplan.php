
<?php
require_once '../fpdf186/fpdf.php';
require_once '../controller/relationC.php';
require_once '../controller/serviceC.php';



$rC=new relationC();
$sC=new serviceC();
$liste=$rC->showrelation(1);

$pdf=new FPDF();
$pdf->Addpage();
$pdf->SetFont('Arial', 'B', 18);
$idc=$_GET['id'];
$somme=0;
$pdf->Cell(0,10,'client de id =' .$idc ,1,1 ,'C'); 

foreach($liste as $r)
{
    
//var_dump($r);
    $ids=$r['ids'];
    $s=$sC->showservice($ids);
    
    $pdf->Cell(0,10,'' ,0,1);
    $pdf->Cell(0,10,'service paye de nom ' . $s['nom'],0,1 ); 
    $pdf->Cell(0,10,'prix : ' . $s['prix'] ,1,1);
    $somme+= $s['prix']; 
}

$pdf->Cell(0,10,'' ,0,1);
$pdf->Cell(132); 
$pdf->Cell(0,10,'prix totale  :' . $somme ,1,1); 
  
$pdf->Output(); 

?>