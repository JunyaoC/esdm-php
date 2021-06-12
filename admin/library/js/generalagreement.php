<?php
  include('cbssession.php');

    if(!session_id()){
    session_start();
  }

  include('dbconnect.php');
  require('fpdf/fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,2,"General Agreement"); 
$pdf->Output();

?>

