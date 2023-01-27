<?php

namespace App\Service;

use App\Entity\Weather;
use App\Helper\ForecastFutureHelper;
use App\Helper\WeatherNowHelper;

class LocationCollection
{
    private array $locations;

    public function __construct()
    {
        $this->locations[] = new Weather(
            (new WeatherNowHelper())->getWeatherNow('riga'),
            (new ForecastFutureHelper())->getForecastFuture('riga')
        );

        $this->locations[] = new Weather(
            (new WeatherNowHelper())->getWeatherNow('miami'),
            (new ForecastFutureHelper())->getForecastFuture('miami')
        );
    }

    public function add(string $city):void
    {
        $this->locations[] = new Weather(
            (new WeatherNowHelper())->getWeatherNow($city),
            (new ForecastFutureHelper())->getForecastFuture($city)
        );
    }
    public function getLocations(): array
    {
        return $this->locations;
    }
}