<?php

namespace App\Controller\Admin;

use App\Entity\Cms;
use App\Entity\Config;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    public $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/admin", name="main")
     */
    public function index()
    {
/*
        $config = new Config();
        $config->setConfigKey("secure_base_url")->setConfigType("text")->setConfigValue("httpss://gartenschau.de")->setDescription("sicher!!! xxx bla");
        $this->em->persist($config);
        $this->em->flush();*/

/*
        $cms = new Cms();
        $cms->setTitle("Erster Eintrag!")->setContent("Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.")->setUsername("Schtief Wars");
        $this->em->persist($cms);
        $this->em->flush();*/

        return $this->render('admin/main.html.twig');
    }

    /**
     * @Route("/admin/dashboard", name="dashboard")
     */
    public function dashboard()
    {
        $content =  $this->render('admin/dashboard.html.twig');
        return new JsonResponse(json_encode($content->getContent()));
    }

    /**
     * @Route("/admin/cms", name="cms")
     * @param Request $request
     * @return JsonResponse
     */
    public function cms(Request $request)
    {
        $cmsEntity = $this->getDoctrine()->getRepository(Cms::class);
        if (count($request->request->all())) {
            $type = $request->request->get('type');
            if ($request->request->get('cms')) {
                $id = $request->request->get('cms')['id'];
            } else {
                $id = $request->request->get('id', null);
            }
            if ($id) {
                $entry = $cmsEntity->find($id);
            } else {
                $entry = new Cms();
            }
            $form = $this->createForm(\App\Form\Cms::class, $entry, array('action' => 'admin/cms'));
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $this->em->persist($entry);
                $this->em->flush();
                $this->em->refresh($entry);
                $cms = $cmsEntity->findAll();
                $content = $this->render('admin/cms.html.twig', [
                    'cmss' => $cms,
                ]);
                return new JsonResponse(json_encode($content->getContent()));
            }
            if ($type == "edit" || $type == "add") {
                $content = $this->render('admin/cms/form.html.twig', [
                    'cmsEntry' => $entry,
                    'form'     => $form->createView()
                ]);
                return new JsonResponse(json_encode($content->getContent()));
            } else if ($type == "delete") {
                $this->em->remove($entry);
                $this->em->flush();
            }
        }
        $cms = $cmsEntity->findAll();
        $content = $this->render('admin/cms.html.twig', [
            'cmss' => $cms,
        ]);
        return new JsonResponse(json_encode($content->getContent()));
    }

    /**
     * @Route("/admin/user", name="user")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return JsonResponse
     */
    public function user(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $userEntity = $this->getDoctrine()->getRepository(User::class);
        if (count($request->request->all())) {
            $type = $request->request->get('type');
            if ($request->request->get('user')) {
                $id = $request->request->get('user')['id'];
            } else {
                $id = $request->request->get('id', null);
            }
            if ($id) {
                $entry = $userEntity->find($id);
            } else {
                $entry = new User();
            }
            $form = $this->createForm(\App\Form\User::class, $entry, array('action' => 'admin/user'));
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $password = $passwordEncoder->encodePassword($entry, $entry->getPlainPassword());
                $entry->setPassword($password);
                $this->em->persist($entry);
                $this->em->flush();
                $this->em->refresh($entry);
                $users = $userEntity->findAll();
                $content = $this->render('admin/user.html.twig', [
                    'users' => $users,
                ]);
                return new JsonResponse(json_encode($content->getContent()));
            }
            if ($type == "edit" || $type == "add") {
                $content = $this->render('admin/user/form.html.twig', [
                    'cmsEntry' => $entry,
                    'form'     => $form->createView()
                ]);
                return new JsonResponse(json_encode($content->getContent()));
            } else if ($type == "delete") {
                $this->em->remove($entry);
                $this->em->flush();
            }
        }
        $users = $userEntity->findAll();
        $content = $this->render('admin/user.html.twig', [
            'users' => $users,
        ]);
        return new JsonResponse(json_encode($content->getContent()));
    }

    /**
     * @Route("/admin/config", name="config")
     * @param Request $request
     * @return JsonResponse
     */
    public function config(Request $request)
    {
        $configs = $this->getDoctrine()->getRepository(Config::class)->findAll();
        $form    = $this->createForm(\App\Form\Config::class, $configs, array('action' => 'admin/config'));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $configs = $request->request->get('config');

            $i = 0;

            $q = $this->em->createQuery('select u from App\Entity\Config u');
            $iterableResult = $q->iterate();
            foreach ($iterableResult as $row) {
                ++$i;
                $config = $row[0];
                $config->setConfigValue(current($configs));
                next($configs);
            }
            $this->em->flush();
            $this->addFlash(
                'notice',
                'Your changes were saved!'
            );
            $content = $this->render('admin/flash.html.twig', [
                'configs' => $configs,
                'form' => $form->createView()
            ]);
            return new JsonResponse(json_encode($content->getContent()));

        } else {
            $content = $this->render('admin/config.html.twig', [
                'configs' => $configs,
                'form' => $form->createView()
            ]);
            return new JsonResponse(json_encode($content->getContent()));
        }
    }
}