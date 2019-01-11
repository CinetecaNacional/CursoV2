<?php

// Optionally define the filesystem path to your system fonts
// otherwise tFPDF will use [path to tFPDF]/font/unifont/ directory
// define("_SYSTEM_TTFONTS", "C:/Windows/Fonts/");

require('../public/fpdf/tfpdf.php');

$pdf = new tFPDF();
$pdf->AddPage();



$pdf->Write(8,'hola gfgdfgd fJóse carlos hernández contreras');

// Select a standard font (uses windows-1252)
$pdf->SetFont('Arial','',14);
$pdf->Ln(10);
$pdf->Write(5,'hola gfgdfgd fJóse carlos hernández contreras');

$pdf->Output();
?>
