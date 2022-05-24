<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/rooms/{id}", name="roomsPerMonth", requirements={"id"="\d+"}, methods={'GET'})
     */
    public function roomsPerMonth($id): Response
    {
        // $room = $articleRepository->find($id)

        $response = new Response("Rooms info : month ".$id);    

        return $response;
    }
}


// ^([1-9]|1[012])$