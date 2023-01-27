<?php

namespace App\Helper;

use App\Entity\WeatherFuture;
use App\Service\WeatherFutureCollectionService;

class ForecastFutureHelper
{
    //Getting forecast for future 5 days
    public function getForecastFuture(string $cityName):array
    {
        $apiKey = $_ENV['API_KEY'];
        $apiUrl = 'https://api.openweathermap.org/data/2.5/forecast?q=' . $cityName . '&appid=' . $apiKey . '&units=metric';

        $weatherData = json_decode(file_get_contents($apiUrl), true);

        //For getting data by three hour
        $temperature = [];
        $windSpeed = [];

        //For getting data by day
        $temperatureFoDay = [];
        $windSpeedForDay = [];

        //getting wind end temperature datat for future forecast
        foreach ($weatherData['list'] as $hourThree) {
            $temperature[] = $hourThree['main']['temp'];
            $windSpeed[] = $hourThree['wind']['speed'];
        }

        //Calculate temperature for day
        $tempChunks = array_chunk($temperature, 8);
        foreach ($tempChunks as $chunk) {
            $sum = array_sum($chunk);
            $temperatureFoDay[] = $sum / 8;
        }

        //Calculating wind speed for day
        $windChunks = array_chunk($windSpeed, 8);
        foreach ($windChunks as $chunk) {
            $sum = array_sum($chunk);
            $windSpeedForDay[] = $sum / 8;
        }

        //Making collection of data to return
        $collection = new WeatherFutureCollectionService();
        for ($i = 0; $i < 5; $i++) {
            $collection->add(new WeatherFuture(
                date("m-d", strtotime("+$i day")),
                $temperatureFoDay[$i],
                $windSpeedForDay[$i]
            ));
        }

        return $collection->getWeatherFuture();
    }
}
