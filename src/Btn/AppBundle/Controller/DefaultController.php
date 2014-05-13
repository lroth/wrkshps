<?php

namespace Btn\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class DefaultController extends BaseController
{
    /**
     * @Route("/{location}", defaults={"location" = "bitnoise office"}, name="homepage")
     * @Template
     **/
    public function indexAction($location)
    {
        return ['location' => $location];
    }
}
