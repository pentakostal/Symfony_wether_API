<?php

namespace App\Controller;

use App\Helper\WeatherNowHelper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather', name: 'weather')]
    public function index(): Response
    {
        $forecast = (new WeatherNowHelper())->getWeatherNow('riga');

        //echo "<pre>";
        //var_dump($forecast->getIcon());die;

        return $this->render('index.html.twig', [
            'forecast' => $forecast,
        ]);
    }
}
