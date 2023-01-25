<?php

namespace App\Helper;

use App\Entity\WetherNow;

class WeatherNowHelper
{
    //get weather now from api
    public function getWeatherNow($cityName): WetherNow
    {
        $apiKey = $_ENV['API_KEY'];
        $apiUrl = 'https://api.openweathermap.org/data/2.5/weather?q=' . $cityName . '&appid=' . $apiKey . '&units=metric';

        $weatherData = json_decode(file_get_contents($apiUrl), true);

        return (new WetherNow(
            $weatherData['name'],
            $weatherData['sys']['country'],
            $weatherData['weather'][0]['description'],
            $weatherData['main']['temp'],
            $weatherData['wind']['speed'],
            $weatherData['weather'][0]['icon'],
        ));
    }
}