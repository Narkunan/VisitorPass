<?php
require_once("Api.php");
require_once("DisplayContent.php");
$pincode=$_GET['pincode'];
$obj=new Api();
class GetCity
{
	public function callApi($pincode,$obj)
	{
      $response=$obj->getResponseCity($pincode);
      $jsonarray=json_decode($response,true);
      $this->parseJson($jsonarray);
	}
	public function parseJson($jsonarray)
	{
      $city=$jsonarray[0]['display_name'];
      $getcity=new DisplayContent();
      $printstring=$getcity->printCityorPincode($city);
      echo $printstring;

	}

}
$callapi=new GetCity();
$callapi->callapi($pincode,$obj);

?>