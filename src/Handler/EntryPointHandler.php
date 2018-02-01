<?php

namespace App\Handler;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\HttpUtils;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Psr\Container\ContainerInterface;
use Symfony\Component\Security\Http\EntryPoint;

use App\Entity;
use App\Form;

class EntryPointHandler implements EntryPoint\AuthenticationEntryPointInterface
{
    private $httpKernel;
    private $container;

    /**
     * EntryPointHandler constructor.
     * @param HttpKernelInterface $kernel
     * @param ContainerInterface $container
     */
    public function __construct(HttpKernelInterface $kernel, ContainerInterface $container)
    {
        $this->httpKernel = $kernel;
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
        $form             = $this->container->get('form.factory')->create(Form\User::class, new Entity\User(), array('action' => "save"));
        $response["form"] = $form->createView();
        $content = $this->container->get('twig')->render('base.html.twig');
        $login   = $this->container->get('twig')->render("login.html.twig", $response );
        if ($request->isXmlHttpRequest()) {
            return new JsonResponse(json_encode($login));
        } else {
            return new Response($content . $login);
        }
    }
}