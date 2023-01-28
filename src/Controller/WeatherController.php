<?php

namespace App\Controller;

use App\Service\SingletonController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherController extends AbstractController
{


    private ?SingletonController $collection;

    public function __construct()
    {
        $this->collection = SingletonController::getInstance();
    }
    #[Route('/weather', name: 'weather', methods: "GET")]
    public function index(): Response
    {
        //echo"<pre>";
        //var_dump($this->myService);die;
        return $this->render('index.html.twig', [
            'locations' => $this->collection->getLocations()
        ]);
    }

    #[Route('/weather', name: 'addLocation', methods: "POST")]
    public function addLocation(Request $request): Response
    {
        //var_dump(SingletonController::getInstance());
        $city = $request->get('cityName');
        //echo"<pre>";
        //var_dump($this->singletonService->getLocations());die;
        $this->collection->add($city);
        //$this->singletonService->getLocations();
        //echo"<pre>";
        //var_dump($this->singletonService);die;

        //return $this->index();
        //return $this->redirectToRoute('weather');
        return $this->index();
    }
}
