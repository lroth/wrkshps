<?php

namespace Btn\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class DefaultController extends BaseController
{
    /**
     * @Route("/{location}", defaults={"location" = "bitnoise office"}, name="homepage")
     **/
    public function indexAction($location)
    {
        /*
            $engine = $this->container->get('templating');
            $content = $engine->render('AcmeArticleBundle:Article:index.html.twig');

            return new Response($content);
        */
        return $this->render(
            'BtnAppBundle:Default:index.html.twig',
            ['location' => $location]
            //could be compact("location")
        );
    }
}
