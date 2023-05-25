<?php


class visitor{
	//generating pdf
	public function generatepdf($Vname,$Vcontact,$Vpurpose,$Vidcard,$Vidno,$entrydate){
		require("fpdf.php");
$name="Name: ".$Vname;
$contact="contact: ".$Vcontact;
$purpose="Purpose: ".$Vpurpose;
$ID_Card="Id Card: ".$Vidcard;
$ID_CARDNO="Id Card No: ".$Vidno;
$dateday="Entry Date:".$entrydate;
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
public function checkconnection(){
	
$host='localhost:3306';//hostname
 $username='root';//user name
 $pass='';//user password
 $dbname='williamsleavpass';//dbname
 $Vname= $_POST['name'];//visitor name
$Vcontact= $_POST['Vcontact'];//visitor contact
$Vpurpose= $_POST['Vpurpose'];//visitor purpose
$Vidcard= $_POST['Vidcard'];//visitor card type
$Vidno= $_POST['vidno'];//visitor id card number
date_default_timezone_set('Asia/Calcutta');
$entrydate=date("Y-m-d h:i:sa");
//check any field is empty
if(empty($Vname)==false && empty($Vcontact)==false && empty($Vpurpose)==false && empty($Vidcard)==false && empty($Vidno)==false){
	$conn=mysqli_connect( $host, $username, $pass, $dbname);//setting conection

if($conn){
	//query for inserting data
$insertquery="INSERT INTO visitor values ('$Vname', '$Vcontact','$Vpurpose','$Vidcard','$Vidno','$entrydate')";
		//check data posted or not
		if(mysqli_query($conn,$insertquery)){
			$this->generatepdf($Vname,$Vcontact,$Vpurpose,$Vidcard,$Vidno,$entrydate);
//data posted so call generate pdf function
		}
		else{
			//if data not posted print data not posted
			echo "data not posted";
		}
	}	
	else{
		//if problem with connection print problem with connection
		echo "<h1>problem with connect<h1>";
	}
}
else{
	//if data miss print data missed
	echo "some data are missing","<br>";
	echo "<h1><a href='index.html'>go back</a></h1>";
}
}

}
//create object for visitor class
$obj=new visitor();
$obj->checkconnection();
//call check connection function
?>