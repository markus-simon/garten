<?php

// AuthenticationHandler.php

namespace App\Handler;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationSuccessHandlerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationFailureHandlerInterface;
use Psr\Container\ContainerInterface;

class AuthenticationHandler implements AuthenticationSuccessHandlerInterface, AuthenticationFailureHandlerInterface
{
    protected $router;
    protected $session;
    protected $container;

    /**
     * Constructor
     *
     * @param 	RouterInterface $router
     * @param 	Session $session
     * @param 	ContainerInterface $container
     */
    public function __construct( RouterInterface $router, Session $session,  ContainerInterface $container )
    {
        $this->router    = $router;
        $this->session   = $session;
        $this->container = $container;
    }

    /**
     * onAuthenticationSuccess
     *
     * @param 	Request $request
     * @param 	TokenInterface $token
     * @return 	JsonResponse
     */
    public function onAuthenticationSuccess( Request $request, TokenInterface $token )
    {
        $this->container->get('session')->getFlashBag()->add(
            "notice",
            'Geilomat!!!'
        );
        $flash    = $this->container->get('twig')->render('flash.html.twig');
        return new JsonResponse(json_encode($flash));
    }

    /**
     * onAuthenticationFailure
     *
     * @author 	Joe Sexton <joe@webtipblog.com>
     * @param 	Request $request
     * @param 	AuthenticationException $exception
     * @return 	JsonResponse
     */
    public function onAuthenticationFailure( Request $request, AuthenticationException $exception )
    {
        $this->container->get('session')->getFlashBag()->add(
            "error",
            $exception->getMessage()
        );
        $flash    = $this->container->get('twig')->render('flash.html.twig');
        return new JsonResponse(json_encode($flash), 403);
    }
}