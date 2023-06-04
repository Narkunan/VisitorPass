<?php
try{
require("library/fpdf.php");
}
catch(FileNotFoundException $e){
	echo "file not found";
}
class generators{
	public function generatepdf($Vname,$Vcontact,$Vpurpose,$Vidcard,$Vidno,$entrydate){
$name="Name:   ".$Vname;
$contact="Contact:   ".$Vcontact;
$purpose="Purpose:   ".$Vpurpose;
$ID_Card="Id Card:   ".$Vidcard;
$ID_CARDNO="Id Card No:   ".$Vidno;
$dateday="Entry Date:   ".$entrydate;
// New object created and constructor invoked
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Image('../images/williamslea.png',30,6,150,30);
$pdf->SetFont('arial', 'B', 15);
$pdf->SetY(40);
$pdf->SetX(60);
$pdf->multicell(100,10,$name,1,'C');
$pdf->SetY(50);
$pdf->SetX(60);
$pdf->multicell(100,10,$contact,1,'C');
$pdf->SetY(60);
$pdf->SetX(60);
$pdf->multicell(100,10,$purpose,1,'C');
$pdf->SetY(70);
$pdf->SetX(60);
$pdf->multicell(100,10,$ID_Card,1,'C');
$pdf->SetY(80);
$pdf->SetX(60);
$pdf->multicell(100,10,$ID_CARDNO,1,'C');
$pdf->SetY(90);
$pdf->SetX(60);
$pdf->multicell(100,10,$dateday,1,'C');
// Close document and sent to the browser
$pdf->Output();
		
	} 
}

?>