<?php

namespace App\Controller;

use App\Entity\Rooms;
use App\Repository\RoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{   
    
    /**
     * @Route("/rooms/{id}", name="roomsPerMonth", requirements={"id"="^([1-9]|1[012])$"}, methods={"GET"})
     */

    public function roomsPerMonth(RoomsRepository $roomsRepository, $id): Response
    {
        $roomsByMonth = $roomsRepository->findByMonth($id);
        
        $jsonPrepare = [];


        foreach($roomsByMonth as $room) {
            $roomPrepare = ['stay_date' => $room->getStayDate()->format('Y-m-d'), 
                            'room_nights' => (string) $room->getRoomNights(), 
                            'room_revenues' => (string) $room->getRoomRevenues()];

            
            array_push($jsonPrepare, (object) $roomPrepare);
            
        }

        function sendJSON($info) {
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json");
            echo json_encode($info);
        }

        sendJSON($jsonPrepare);
        die;

    }
}
