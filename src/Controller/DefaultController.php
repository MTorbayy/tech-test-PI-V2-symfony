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
     * @Route("/rooms/{id}", name="roomsPerMonth", requirements={"id"="^([1-9]|1[012])$"}, methods={"GET"})
     */

    public function roomsPerMonth(RoomsRepository $roomsRepository, $id): Response
    {
        $roomsByMonth = $roomsRepository->findByMonth($id);

        dump($roomsByMonth);die;
    }
}
