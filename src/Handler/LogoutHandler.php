<?php


namespace App\Handler;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;
use Psr\Container\ContainerInterface;

class LogoutHandler implements LogoutSuccessHandlerInterface
{
    protected $httpUtils;
    protected $targetUrl;
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * {@inheritdoc}
     */
    public function onLogoutSuccess(Request $request)
    {
        return new Response();
    }
}
