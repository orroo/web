<?php
require_once '../fpdf186/fpdf.php';

// Set PDF headers
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="moderate.pdf"');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Moderate Mental Health Guide', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 14);


$pdf->Cell(0, 10, 'Depression Test Survey Report', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);


$pdf->MultiCell(0, 10, "Dear patient,\nThank you for making the time to take this survey.", 0, 'L');
$pdf->Ln(10);


$pdf->MultiCell(0, 10, "Furthermore,\nOur team takes the time to tell you that based on some signs,\n the continuous ignorance of your mental health state might be problematic for you .", 0, 'L');
$pdf->Ln(10);

$pdf->MultiCell(0, 10, "We think you might consider joining our moderate mental health \n program that consists of meditation videos, one to one assistance \n with our high skilled coaches .", 0, 'L');
$pdf->Ln(10);

$pdf->SetY($pdf->GetY() - 10);
$pdf->Rect(130, $pdf->GetY(), 60, 30, 'D');

$signatureImagePath = 'signature.png';
$pdf->Image($signatureImagePath, 135, $pdf->GetY() + 5, 50, 20);

$photoPath = 'contactsform.png'; 
$pdf->Image($photoPath, 135, $pdf->GetY() + 40, 50, 50);


$pdf->Output();
