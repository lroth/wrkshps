<?php

namespace Btn\AppBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController
{
    public function indexAction(Request $request)
    {
        $location = $request->get('location', 'bitnoise office');

        return new Response('Hello world from ' . $location);
    }
}
