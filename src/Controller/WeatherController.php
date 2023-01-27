<?php

namespace App\Controller;

use App\Entity\Weather;
use App\Helper\ForecastFutureHelper;
use App\Helper\WeatherNowHelper;
use App\Service\LocationCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    #[Route('/weather', name: 'weather')]
    public function index(): Response
    {
        $weatherCollection = (new LocationCollection())->getLocations();
        //echo "<pre>";
        //var_dump($weatherCollection[0]->getForecastFuture());die;

        return $this->render('index.html.twig', [
            'locations' => $weatherCollection
        ]);
    }
}
