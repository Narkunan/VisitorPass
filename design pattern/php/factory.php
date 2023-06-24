<?php

interface usefunction
{

public function spec();

} 

class ios implements usefunction
{
public function spec()
{
  echo "processor a14 bionic 3 camera ";
}
}

class android implements usefunction
{
	public function spec()
	{
		echo "snapdragon or mediatek";
	}
}

class GetOs
{

public function getObject($str)
{
	
   if($str=="open")
   {
   	return new android();
   }
   else
   {
   	return new ios();
   }

}

}
$obj=new GetOs();
$objj=$obj->getObject('open');
$objj->spec();
?>