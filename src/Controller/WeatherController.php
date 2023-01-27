<?php

namespace App\Controller;

use App\Service\LocationCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{
    private $weatherCollection;

    public function __construct()
    {
        $this->weatherCollection = new LocationCollection();
    }

    #[Route('/weather', name: 'weather', methods: "GET")]
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'locations' => $this->weatherCollection->getLocations()
        ]);
    }

    #[Route('/weather', methods: "POST")]
    public function addLocation(Request $request): Response
    {
        $formData = $request->request->get('cityName');

        $this->weatherCollection->add($formData);

        return $this->index();
    }
}
