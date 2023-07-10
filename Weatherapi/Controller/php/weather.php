<?php
require('global.php');
require('../../Model/php/DisplayContent.php');

$city=$_GET['city'];


class GetWeather
{

  /**
   * Get Response from api by calling the object of API class
   * 
   * Call the responseweatherreport() function
   *  
   * Call the parsejson function 
   * 
   * pass $json array as parameter 
   * 
   * @param $jsonarray response from API
   * 
   * @param $city name of the city we want weather report 
   * 
   */
	public function callApi(string $city,Api $obj)
	{

      $response=$obj->responseWeatherReport($city);
      $jsonarray=json_decode($response,true);
      $this->parseJson($jsonarray);

	}
   
  /**
   * Parse the json array and get required values
   * 
   * Call the printweather function to display appropriate output
   * 
   * @param $jsonarray pass the jsonarray(response)
   * 
   * @var $feeslike store feelslike temperature
   * 
   * @var $tempmax store Maximum temperature
   * 
   * @var $tempmin store Minimum temperature
   * 
   * @var $WeatherDesc store small description of weatherdescription
   * 
   * @var $windspeed store the windspeed
   */

	public function parseJson(array $jsonarray)
	{
      
      $displaycontent=new DisplayContent();
      $weatherDesc = $jsonarray['weather'][0]['description'];
      $feelsLike = $jsonarray['main']['feels_like'];
      $tempMin = $jsonarray['main']['temp_min'];
      $tempMax = $jsonarray['main']['temp_max'];
      $windSpeed = $jsonarray['wind']['speed'];
    
      if(str_contains($weatherDesc,"drizzle")||str_contains($weatherDesc,"rainy")||str_contains($weatherDesc,"thunderstrom"))
      {
          $print=$displaycontent->printWeather($weatherDesc, $feelsLike, $tempMax, $tempMin,$imageloaction="../../View/images/clouds.png",$windSpeed);
          echo $print;
      }

      else if(str_contains($weatherDesc,"mist"))
      {
          $print=$displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../../View/images/mist.png",$windSpeed);
          echo $print;
      }

      else if(str_contains($weatherDesc,"clouds"))
      {
          $print=$displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../../View/images/clouds.png",$windSpeed);
          echo $print;
      }

      else
      {
          $print=$displaycontent->printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction="../../View/images/sunny.png",$windSpeed);
          echo $print;
      }

	}

}

$callapi=new GetWeather();
$callapi->callapi($city,$obj);

