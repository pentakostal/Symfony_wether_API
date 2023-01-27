<?php

namespace App\Entity;

class WetherNow extends \App\Helper\WeatherNowHelper
{
    private string $city;
    private string $country;
    private string $weather;
    private int $temperature;
    private int $minTemp;
    private int $maxTemp;
    private int $humidity;
    private int $pressure;
    private float $windSpeed;
    private string $icon;

    public function __construct(
        string $city,
        String $country,
        string $weather,
        int $temperature,
        float $windSpeed,
        string $icon
    )
    {
        $this->city = $city;
        $this->country = $country;
        $this->weather = $weather;
        $this->temperature = $temperature;
        $this->windSpeed = $windSpeed;
        $this->icon = $icon;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getWeather(): string
    {
        return $this->weather;
    }

    public function getTemperature(): int
    {
        return $this->temperature;
    }
    public function getWindSpeed(): float
    {
        return $this->windSpeed;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }
}