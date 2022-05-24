<?php

namespace App\Controller;

use App\Entity\Rooms;
use App\Repository\RoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/rooms", name="roomsPerMonth")
     */

    public function roomsPerMonth(RoomsRepository $roomsRepository): Response
    {
        $rooms = $roomsRepository->findAll();

        dump($rooms);die;

        // $response = new Response("Rooms info : month ".$rooms);    

        // return $response;
    }
}


// ^([1-9]|1[012])$