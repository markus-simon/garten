<?php

namespace App\Controller;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\Event;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity;
use App\Service\Websocket;
use App\Form;
use App\Event as Events;

use Ratchet;


class ApiController extends Controller
{
    public function __construct()
    {

    }

    /**
     * @Route("/api", name="api")
     * @param Websocket $websocket
     * @return Response
     */
    public function api(Websocket $websocket)
    {
        $va = "daasasa";




        // Run the server application through the WebSocket protocol on port 8080



        $websocket->onOpen("sss");
        return new Response("{success:true}");
    }
}