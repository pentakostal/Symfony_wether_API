<?php

namespace App\Entity;

use App\Helper\ForecastFutureHelper;
use App\Helper\WeatherNowHelper;

class Weather
{
    private WeatherNowHelper $weatherNow;
    private ForecastFutureHelper $forecastFuture;

    public function __construct(
        WeatherNowHelper $weatherNow,
        ForecastFutureHelper $forecastFuture,
    )
    {
        $this->weatherNow = $weatherNow;
        $this->forecastFuture = $forecastFuture;
    }

    public function getWeatherNow(): WeatherNowHelper
    {
        return $this->weatherNow;
    }

    public function getForecastFuture(): ForecastFutureHelper
    {
        return $this->forecastFuture;
    }
}