<?php

namespace App\Entity;

class WeatherFuture
{
    private int $temperature;
    private int $windSpeed;

    public function __construct(
        int $temperature,
        int $windSpeed
    )
    {
        $this->temperature = $temperature;
        $this->windSpeed = $windSpeed;
    }

    public function getTemperature(): int
    {
        return $this->temperature;
    }

    public function getWindSpeed(): int
    {
        return $this->windSpeed;
    }
}