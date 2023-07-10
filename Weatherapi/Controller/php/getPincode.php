<?php
require_once("global.php");
require_once("../../Model/Php/DisplayContent.php");

$city=$_GET['city'];


class GetPincode
{
   /**
   * Get Response from api by calling the object of API class
   * 
   * Call the getResponsePincode() function
   *  
   * And then
   * 
   * Call the parsejson function 
   * 
   * pass $json array as parameter 
   * 
   * @param $jsonarray response from API
   * 
   * @param $city name of the city we want get Pincode 
   * 
   */
    public function callApi(string $city,Api $obj)
	{

        $response=$obj->getResponsePincode($city);
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
   * @var $city store pincode of the city 
   * 
   */
    public function parseJson(array $jsonarray)
	{

        $city=$jsonarray[0]['display_name'];
        $getcity=new DisplayContent();
        $printstring=$getcity->printCityorPincode($city);
        echo $printstring;

	}

}

$callapi=new GetPincode();
$callapi->callapi($city,$obj);