<?php

class DisplayContent
{
	public function printCityorPincode($city)
	{
		
		$printstring= "
		<html>
		<head>
		<title>Display Pincodes</title>
		<style>
		body
		{
			color:white;
		}
		#citys
		{
			top:20%;
			font-size:50px;
			width:80%;
			height:20px;
			left:10%;
			position:absolute;
		}
		#pincode
		{
			top:60%;
			position:absolute;
			background-color:purple;
			color:white;
			padding: 15px 20px;
		}
		</style>
		</head>
		<body bgcolor='black'>
		<center>
		<div id='citys'>$city</div>
		<br><br><br><br><a href='../html/getPincode.html'><button id='pincode'>Go Back</button></a>
		</center>
		</body>
		</html>";


     return $printstring;

	}
	public function printWeather($weatherDesc,$feelsLike,$tempMax,$tempMin,$imageloaction,$windSpeed)
	{
		echo "
		<html>
		<head>
		<title>Display Weather</title>
		<style>
		body
		{
			color:white;
		}
		#citys
		{
			top:20%;
			font-size:50px;
			width:80%;
			height:20px;
			left:10%;
			position:absolute;
		}
		#weatherdescimg
		{
			top:10%;
			left:10%;
			position:absolute;
		}
		#weatherDesc
		{   
			position:absolute;
			top:20%;
			left:40%;
			font-size:30px;
			text-align:center;
		}
		#feelsLikeimg
		{
			top:10%;
			left:60%;
			position:absolute;
		}
		#feelsLike
		{
			top:20%;
			left:80%;
			font-size: 30px;
			text-align: center;
			position: absolute;

		}
		#tempMaximg
		{
			top:50%;
			left:10%;
			position:absolute;
		}
		#tempMax
		{
			top:60%;
			left:30%;
			font-size: 30px;
			text-align: center;
			position:absolute;
		}
		#tempMinimg
		{
			top:50%;
			left:60%;
			position:absolute;
		}
		#tempMin
		{
			top:50%;
			left:80%;
			position: absolute;
			font-size: 30px;
			text-align: center;

		}

		#windSpeedimg
		{
			top:90%;
			left:45%;
			position:absolute;
		}
		#windSpeed
		{
            top:100%;
			left:70%;
			position: absolute;
			font-size: 30px;
			text-align: center;		
		}
		#homepage
		{
			top:110%;
			position:absolute;
			background-color:purple;
			color:white;
			padding: 15px 20px;
		}
		</style>
		</head>
		<body bgcolor='black'>
		<center>
		
		<img src=$imageloaction id='weatherdescimg'>
		<div id='weatherDesc'>$weatherDesc</div>
        <img src='../images/feelslike.png' id='feelsLikeimg'>
        <div id='feelsLike'>$feelsLike</div>
        <img src='../images/tempmax.png' id='tempMaximg'>
        <div id='tempMax'>$tempMax</div>
        <img src='../images/tempmin.png' id='tempMinimg'>
        <div id='tempMin'>$tempMin</div>
        <img src='../images/wind.png' id='windSpeedimg'>
        <div id='windSpeed'>$windSpeed</div>
		</center>
		<a href='../html/weather.html'><button id='homepage'>Goback</button></a>
		</body>
		</html>";
		
	}

}

?>