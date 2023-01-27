<?php

namespace App\Entity;

class WeatherFuture
{
    private string $date;
    private int $temperature;
    private int $windSpeed;

    public function __construct(
        string $date,
        int $temperature,
        int $windSpeed
    )
    {
        $this->date = $date;
        $this->temperature = $temperature;
        $this->windSpeed = $windSpeed;
    }

    public function getDate(): string
    {
        return $this->date;
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