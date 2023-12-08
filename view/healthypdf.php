<?php
require_once '../fpdf186/fpdf.php';


header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="healthy.pdf"');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'General Mental Health Guide', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 14);


$pdf->Cell(0, 10, 'Depression Test Survey Report', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);


$pdf->MultiCell(0, 10, "Dear patient,\nThank you for making the time to take this survey.", 0, 'L');
$pdf->Ln(10);


$pdf->MultiCell(0, 10, "Furthermore,\nOur team takes the time to tell you that based on your results,\nseems like your mental health conditions are stable.\n We thank you for being so brave to stand up against all the negative situations. .", 0, 'L');
$pdf->Ln(10);

$pdf->MultiCell(0, 10, "Our team takes the time to wish you all the best\n moreover, we would love to have you around for some regular sessions \n in order to keep up your good mental health conditions .", 0, 'L');
$pdf->Ln(10);

$pdf->SetY($pdf->GetY() - 10);
$pdf->Rect(130, $pdf->GetY(), 60, 30, 'D');

$signatureImagePath = 'C:\xampp\htdocs\TEST\view/signature.png';
$pdf->Image($signatureImagePath, 135, $pdf->GetY() + 5, 50, 20);

$photoPath = 'C:\xampp\htdocs\TEST\view/contactsform.png'; 
$pdf->Image($photoPath, 135, $pdf->GetY() + 40, 50, 50);


$pdf->Output();
