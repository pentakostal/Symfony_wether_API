<?php

namespace App\Entity;

use App\Helper\ForecastFutureHelper;
use App\Helper\WeatherNowHelper;

class Weather
{
    private WeatherNowHelper $weatherNow;
    private array $forecastFuture;

    public function __construct(
        WeatherNowHelper $weatherNow,
        array $forecastFuture,
    )
    {
        $this->weatherNow = $weatherNow;
        $this->forecastFuture = $forecastFuture;
    }

    public function getWeatherNow():WeatherNowHelper
    {
        return $this->weatherNow;
    }

    public function getForecastFuture():array
    {
        return $this->forecastFuture;
    }
}