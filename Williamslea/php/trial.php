<?php

class temp {
public function checkconnection(){
try{
$localhost="localhost:3306";
$username="root";
$pass="";
$dbname='williamsleavpass';
$conn=mysqli_connect($localhost,$username,$pass,$dbname);
if($conn){
	
	return $conn;
}
else{
	echo "not connected";
}
}
catch(PDOException $e){
	echo"encountered problem with connection";
}
}
public function vnameencrypt($vname){
try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($vname);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($vname[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j+3];
		}
	}
}
return $temp;
}
catch(Exception $e){
	echo "index out of bound";
}
}
public function vcontactencrypt($vcontact){
	try{

$temp="";
for($i=0;$i<strlen($vcontact);$i++){
	
		switch($vcontact[$i])
		{
			case "9":
			$temp=$temp."a";
			break;
			case "8":
			$temp=$temp."c";
			break;
			case "7":
			$temp=$temp."g";
			break;
			case "6":
			$temp=$temp."k";
			break;
			case "5":
			$temp=$temp."o";
			break;
			case "4":
			$temp=$temp."q";
			break;
			case "3":
			$temp=$temp."t";
			break;
			case "2":
			$temp=$temp."v";
			break;
			case "1":
			$temp=$temp."w";
			break;
			default :
			$temp=$temp."z";
			
		}
}

return $temp;

	}
	catch(Exception $e){

	}
}

public function vpurposeencrypt($vpurpose){
	try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($vpurpose);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($vpurpose[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j+3];
		}
	}
}

return $temp;

	}
	catch(Exception $e){

	}
}
public function vidcardencrypt($vidcard){
	try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($vidcard);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($vidcard[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j+3];
		}
	}
}

return $temp;

	}
	catch(Exception $e){

	}
}
public function vidcardnoencrypt($vidcardno){
	try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($vidcardno);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($vidcardno[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j+3];
		}
	}
}

return $temp;

	}
	catch(Exception $e){

	}
}

}	

?>