<?php

namespace App\Controller;

use App\Entity\Weather;
use App\Helper\ForecastFutureHelper;
use App\Helper\WeatherNowHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather', name: 'weather')]
    public function index(): Response
    {
        $weather = new Weather(
            (new WeatherNowHelper())->getWeatherNow('riga'),
            (new ForecastFutureHelper())->getForecastFuture('riga')
        );
        //echo "<pre>";
        //var_dump($weather->getForecastFuture());die;

        return $this->render('index.html.twig', [
            'weatherNow' => $weather->getWeatherNow(),
            'weatherFuture' => $weather->getForecastFuture()
        ]);
    }
}
