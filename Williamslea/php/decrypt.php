<?php
class decrypt{
	public function decryptname($name){
try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($name);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($name[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j-3];
		}
	}
}
return $temp;
}
catch(Exception $e){
	echo "index out of bound";
}
}
	
	public function decryptcontact($contact){
try{

$temp="";
for($i=0;$i<strlen($contact);$i++){
	
		switch($contact[$i])
		{
			case "a":
			$temp=$temp."9";
			break;
			case "c":
			$temp=$temp."8";
			break;
			case "g":
			$temp=$temp."7";
			break;
			case "k":
			$temp=$temp."6";
			break;
			case "o":
			$temp=$temp."5";
			break;
			case "q":
			$temp=$temp."4";
			break;
			case "t":
			$temp=$temp."3";
			break;
			case "v":
			$temp=$temp."2";
			break;
			case "w":
			$temp=$temp."1";
			break;
			default :
			$temp=$temp."0";
			
		}
}

return $temp;

	}
	catch(Exception $e){

	}
	}
	public function decryptpurpose($purpose){
try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($purpose);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($purpose[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j-3];
		}
	}
}

return $temp;

	}
	catch(Exception $e){
echo "out of bound";
	}
	}
	public function decryptidcard($idcard){

	try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($idcard);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($idcard[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j-3];
		}
	}
}

return $temp;

	}
	catch(Exception $e){

	}
	}
	public function decryptidcardno($idcardno){
try{
$arrayName = "abcdefghijklmnopqrstuvwxyz";
$temp="";
for($i=0;$i<strlen($idcardno);$i++){
	for($j=0;$j<strlen($arrayName);$j++){
		if($idcardno[$i]==$arrayName[$j]){
			$temp=$temp.$arrayName[$j-3];
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