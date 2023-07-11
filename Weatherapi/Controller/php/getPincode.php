<?php
require_once("global.php");
require_once("../../Model/Php/DisplayContent.php");

$city=$_GET['city'];
/**
* This class is responsible for getting Pincode info.
*
*/

class GetPincode
{
   /**
   * Get Response from api by calling the object of API class.
   * 
   * Call the getResponsePincode() function.
   * 
   * Call the parsejson function. 
   * 
   * @param $jsonarray.
   * 
   * @param $city. 
   * 
   */
    public function callApi(string $city,Api $obj):void
    {

        $response=$obj->getResponsePincode($city);
        $jsonarray=json_decode($response,true);
        $this->parseJson($jsonarray);
	
    }
	
   /**
   * This function is for parse json 
   * 
   * Call the printcityorpincode to print city data
   * 
   * @param $jsonarray 
   * 
   * @var $city 
   * 
   */
    public function parseJson(array $jsonarray):void
    {

        $city=$jsonarray[0]['display_name'];
        $getcity=new DisplayContent();
        $printstring=$getcity->printCityorPincode($city);
        echo $printstring;

    }

}

$callapi=new GetPincode();
$callapi->callapi($city,$obj);
