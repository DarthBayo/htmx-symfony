<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/playing-with-form", name="playing_with_form")
     */
    public function playingWithForm(): Response
    {
        return $this->render('playing_with_form.html.twig');
    }

    /**
     * @Route("/processed-rest-api", name="processed_rest_api")
     */
    public function processedRestApi(): Response
    {
        $curl = curl_init('https://restcountries.com/v3.1/name/brazil');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response, true)[0];

        return $this->render('processed_rest_api.html.twig', [
            'data' => $response,
       ]);
    }

    /**
     * @Route("/processed-json-api", name="processed_json_api")
     */
    public function processedJsonApi(): Response
    {
        $curl = curl_init('https://jsonplaceholder.typicode.com/users');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $response = json_decode($response, true);

        return $this->render('processed_json_api.html.twig', [
            'data' => $response,
        ]);
    }
}
