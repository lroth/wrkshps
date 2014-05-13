<?php

namespace Btn\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController
{
    /**
     * @Route("/index", defaults={"location" = "bitnoise office from /index"})
     * @Route("/{location}", defaults={"location" = "bitnoise office from /"}, name="homepage")
     * @Method("GET")
     **/
    public function indexAction($location)
    {

        return new Response('Hello world from ' . $location);
    }
}
