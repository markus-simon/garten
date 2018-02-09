<?php

namespace App\Controller;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity;
use App\Form;


class IndexController extends Controller
{
    public $dispatcher;
    public $em;

    public function __construct(EventDispatcherInterface $dispatcher, EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('base.html.twig', $this->getResponse(Entity\Cms::ENTITY_NAME, null, "full"));
    }

    /**
     * @Route("action", name="action")
     * @param Request $request
     * @return Response
     */
    public function action(Request $request)
    {
        $action         = $request->request->get('action', '404');
        $type           = $request->request->get('type',   'full');
        $id             = $request->request->get('id',   null);
        $templateFolder = $this->container->getParameter("twig.default_path");
        if ($type == "modal") {
            $action = $action . "/form";
        }
        if ($type == "single") {
            $action = $action . "/detail";
        }
        $template       = $templateFolder . DIRECTORY_SEPARATOR . $action . '.html.twig';
        if (file_exists($template) && $action != '404') {
            $html = $this->render($action . '.html.twig', $this->getResponse($action, $id, $type));
        } else {
            $html = $this->render('404.html.twig');
        }
        return new Response($html->getContent());
    }

    /**
     * @Route("login", name="login")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return Response
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
    }

    /**
     * @Route("logout", name="logout")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return Response
     */
    public function logout(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
    }

    /**
     * @Route("save", name="save")
     * @param Request $request
     * @return Response
     */
    public function save(Request $request)
    {
        $type = array_keys($request->request->all())[0];

        $entityType = "App\Entity\\" . ucfirst($type);
        $formType = "App\Form\\" . ucfirst($type);
        $entity = new $entityType;

        $form = $this->createForm($formType, $entity);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $entity->getImage();

            if($file) {
                $fileName = $this->generateUniqueFileName($file);
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
                $entity->setImage($fileName);
            }
            $this->handleSaveRequest($entity);
        } else {
            $errors = $form->getErrors(true);
            foreach ($errors as $error) {
                $this->addFlash(
                    'error',
                    $error->getMessage()
                );
            }
        }
        $content  = $this->render($type . '.html.twig', $this->getResponse($entity::ENTITY_NAME, null, "full"));
        $flash    = $this->render('flash.html.twig');
        return new Response($content->getContent() . $flash->getContent());
    }

    /**
     * @param $entity
     */
    public function handleSaveRequest($entity)
    {
        try {
            $this->em->persist($entity);
            $this->em->flush();
            $this->em->refresh($entity);
            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
        } catch (\Exception $e) {
            $this->addFlash(
                'error',
                $e->getMessage()
            );
        }
    }

    /**
     * @param $action
     * @param $id
     * @param $type
     * @return array
     */
    public function getResponse($action, $id, $type)
    {
        $response = [];
        switch($action) {
            case Entity\Cms::ENTITY_NAME:
            case Entity\Cms::ENTITY_NAME . "/form":
            case Entity\Cms::ENTITY_NAME . "/detail":
                if ($type == "full") {
                    $response["data"] = $this->em->getRepository(Entity\Cms::class)->findBy([], ["id" => "desc"]);
                } elseif ($type == "single") {
                    $response["data"] = $this->em->getRepository(Entity\Cms::class)->findOneBy(["id" => $id]);
                } else {
                    $form             = $this->createForm(Form\Cms::class, null, array('action' => "save"));
                    $response["form"] = $form->createView();
                }
                break;
            case "map":
                $response = [];
                break;
            case Entity\Event::ENTITY_NAME:
            case Entity\Event::ENTITY_NAME . "/form":
                if ($type == "full") {
                    $response["data"] = $this->em->getRepository(Entity\Event::class)->findBy([], ["id" => "desc"]);
                } else {
                    $form             = $this->createForm(Form\Event::class, null, array('action' => "save"));
                    $response["form"] = $form->createView();
                }
                break;
            case Entity\Log::ENTITY_NAME:
                $response = [];
                break;
            case Entity\Plant::ENTITY_NAME:
            case Entity\Plant::ENTITY_NAME . "/form":
                if ($type == "full") {
                    $response["data"] = $this->em->getRepository(Entity\Plant::class)->findBy([], ["id" => "desc"]);
                } else {
                    $form             = $this->createForm(Form\Plant::class, null, array('action' => "save"));
                    $response["form"] = $form->createView();
                }
                break;
            case Entity\User::ENTITY_NAME . "/form":
                $form             = $this->createForm(Form\User::class, new Entity\User(), array('action' => "save"));
                $response["form"] = $form->createView();
                break;
            case "logout/form":
                $response = [];
                break;
        }
        return $response;
    }

    /**
     * @param UploadedFile $file
     * @return string
     */
    private function generateUniqueFileName(UploadedFile $file)
    {
        return md5(uniqid()).'.'.$file->guessExtension();
    }
}