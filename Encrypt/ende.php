<?php

class Temp 
{
	
  public function decryptContact($contact)
  {
   try
   {

       $temp="";
       for($i=0;$i<strlen($contact);$i++)
       {
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
	catch(Exception $e)
	{
    echo "out of bound";
	}
}



public function checkConnection()
{
  try
  {
   $localhost="localhost:3306";
   $username="root";
   $pass="";
   $dbname='williamsleavpass';
   $conn=mysqli_connect($localhost,$username,$pass,$dbname);
   if($conn)
   {
	return $conn;	
   }
   else
   {
	echo "not connected";
   }
  }
  catch(PDOException $e)
  {
	echo"encountered problem with connection";
   }
}
public function encrypt($vname,$sk)
{
   $arrayName="abcdefghijklmnopqrstuvwxyz";
   $vname=strtolower($vname);
   $temp="";
   for($i=0;$i<strlen($vname);$i++)
   {
	for($j=0;$j<strlen($arrayName);$j++)
	{
		if($vname[$i]==$arrayName[$j])
		{
			$temp=$temp.$arrayName[$j+$sk];
		}
	 }
   }
   return $temp;
 
}
public function vContactEncrypt($vcontact)
{
	try
	{

     $temp="";
     for($i=0;$i<strlen($vcontact);$i++)
     {
	
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
	catch(Exception $e)
	{
     echo 'out of bound';
	}
}
public function decrypt($name,$sk)
{
   
   $arrayName="abcdefghijklmnopqrstuvwxyz";
   $temp="";
   for($i=0;$i<strlen($name);$i++)
   {
	for($j=0;$j<strlen($arrayName);$j++)
	{
		if($name[$i]==$arrayName[$j])
		{
			$temp=$temp.$arrayName[$j-$sk];
		}
	 }
   }
   return $temp;
   
}
public function encryptCardNo($cardno,$sk)
{
	
		$arrayName="abcdefghijklmnopqrstuvwxyz";
		$temp="";
		for($i=0;$i<strlen($cardno);$i++)
		{
		 for($j=0;$j<strlen($arrayName);$j++)
		  {
			if(is_numeric($cardno[$i])==true)
			{
				$temp=$temp.$cardno[$i];
				break;
			}
			else
			{
				if($cardno[$i]==$arrayName[$j])
				{
					$temp=$temp.$arrayName[$j+$sk];
				}
			}
		  }
	  }
	  return $temp;
	 

 }
public function decryptCardNo($cardno,$sk)
{
   try
   {
		$arrayName="abcdefghijklmnopqrstuvwxyz";
		$temp="";
		for($i=0;$i<strlen($cardno);$i++)
		{
		 for($j=0;$j<strlen($arrayName);$j++)
		  {
			 if(is_numeric($cardno[$i])==true)
			 {
				$temp=$temp.$cardno[$i];
				break;
			 }
			else
			{
				if($cardno[$i]==$arrayName[$j])
				{
					$temp=$temp.$arrayName[$j-$sk];
				}
			}
		}
	}
  return $temp;
  }
  catch(Exception $e)
  {
	echo "out of bounds";
  }	
 }

	}

?>