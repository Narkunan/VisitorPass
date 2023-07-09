<?php
require_once("Api.php");
require_once("DisplayContent.php");
$city=$_GET['city'];
$obj=new Api();
class GetWeather
{
	public function callApi($city,$obj)
	{
      $response=$obj->responseWeatherReport($city);
      $jsonarray=json_decode($response,true);
      $this->parseJson($jsonarray);
	}
	public function parseJson($jsonarray)
	{
      $displaycontent=new DisplayContent();
      $weatherDesc = $jsonarray['weather'][0]['description'];
      $feelsLike = $jsonarray['main']['feels_like'];
      $tempMin = $jsonarray['main']['temp_min'];
      $tempMax = $jsonarray['main']['temp_max'];
      $windSpeed = $jsonarray['wind']['speed'];
      
      if(str_contains($weatherDesc,"drizzle")||str_contains($weatherDesc,"rainy")||str_contains($weatherDesc,"thunderstrom"))
      {
        $displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../images/clouds.png",$windSpeed);
      }
      else if(str_contains($weatherDesc,"mist"))
      {
        $displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../images/mist.png",$windSpeed);
      }
      else if(str_contains($weatherDesc,"clouds"))
      {
        $displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../images/clouds.png",$windSpeed);
      }
      else
      {
        $displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../images/sunny.png",$windSpeed);
      }

	}

}
$callapi=new GetWeather();
$callapi->callapi($city,$obj);

?>