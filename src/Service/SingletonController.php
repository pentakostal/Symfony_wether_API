<?php

namespace App\Service;

class SingletonController
{
    private static ?SingletonController $instance = null;
    private LocationCollection $locations;

    public function __construct()
    {
        $this->locations = new LocationCollection();
        //var_dump($this->locations);die;
    }

    public static function getInstance(): SingletonController
    {
        if (self::$instance == null)
        {
            self::$instance = new SingletonController();
        }

        return self::$instance;
    }

    public function getLocations(): array
    {
        return $this->locations->getLocations();
    }

    public function add(string $city): void
    {
        $this->locations->addLocation($city);
    }
}