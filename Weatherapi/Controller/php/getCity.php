<?php

require_once("global.php");

require_once("../../Model/Php/DisplayContent.php");

$pincode=$_GET['pincode'];
/**
* This class is responsible for getting city info.
*
*/

class GetCity
{
   /**
   * Get Response from api by calling the object of API class.
   * 
   * Call the getResponseCity() function.
   *  
   * And then.
   * 
   * Call the parsejson function.
   *  
   * 
   * @param $jsonarray
   * 
   * @param $pincode
   * 
   * @return void
   */
	public function callApi(string $pincode,Api $obj):void
	{

     	$response=$obj->getResponseCity($pincode);
      	$jsonarray=json_decode($response,true);
      	$this->parseJson($jsonarray);

	}

   /**
   * This function is for parse json 
   * 
   * Call the printcity or pincode to print city data
   * 
   * @param $jsonarray jsonarray from getresponsepincode() function
   * 
   * @var $city store city of the given pincode 
   * 
   */

	public function parseJson(array $jsonarray): void
	{

     	$city=$jsonarray[0]['display_name'];
     	$getcity=new DisplayContent();
     	$printstring=$getcity->printCityorPincode($city);
     	echo $printstring;
	}

}

$callapi=new GetCity();
$callapi->callapi($pincode,$obj);

