<?php

namespace Btn\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BtnAppBundle:Default:index.html.twig');
    }
}
