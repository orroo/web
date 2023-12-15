<?php
require_once '../fpdf186/fpdf.php';


header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="intensive_guide.pdf"');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Intensive Mental Health Guide', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 14);


$pdf->Cell(0, 10, 'Depression Test Survey Report', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);


$pdf->MultiCell(0, 10, "Dear patient,\nThank you for making the time to take this survey.", 0, 'L');
$pdf->Ln(10);


$pdf->MultiCell(0, 10, "Furthermore,Your results show that we need you to take immediate action for the sake of your general well-being.", 0, 'L');
$pdf->Ln(10);

$pdf->MultiCell(0, 10, "To break your results into details,\nYour choice of answers enhances our worries about your current state,\n that's why we urge you to start looking after yourself \n You can start by enrolling in our intensive mental health program\n", 0, 'L');
$pdf->Ln(10);

$pdf->MultiCell(0, 10, "The program includes regular sessions with a proffessional mentor,\nalong with continuous access to the meditation exercices and several other daily reminders\n that can help you with your new lifestyle.", 0, 'L');
$pdf->Ln(10);


$pdf->MultiCell(0, 10, "Mental harbour team is always ready to help. For any inquiries, never hesitate to contact us.", 0, 'L');
$pdf->Ln(10);


$pdf->SetY($pdf->GetY() - 10);
$pdf->Rect(130, $pdf->GetY(), 60, 30, 'D');

$signatureImagePath = 'signature.png';
$pdf->Image($signatureImagePath, 135, $pdf->GetY() + 5, 50, 20);

$photoPath = 'contactsform.png'; 
$pdf->Image($photoPath, 135, $pdf->GetY() + 40, 50, 50);

// Output the PDF
$pdf->Output();

?>