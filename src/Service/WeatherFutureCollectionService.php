<?php

namespace App\Service;

use App\Entity\WeatherFuture;

//Contains data for future forecast
class WeatherFutureCollectionService extends \App\Helper\ForecastFutureHelper
{
    private array $weatherFuture;

    public function add(WeatherFuture $dayForecast):void
    {
        $this->weatherFuture[] = $dayForecast;
    }
    public function getWeatherFuture(): array
    {
        return $this->weatherFuture;
    }
}