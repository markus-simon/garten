<?php

namespace App\Controller;

use App\Entity\Cms;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    public $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $cmsEntries = $this->getDoctrine()->getRepository(Cms::class)->findBy([], ["id" => "desc"]);
        return $this->render('base.html.twig', [
            'cmsEntries' => $cmsEntries
        ]);
    }
}