<?php

namespace Btn\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class GameController extends BaseController
{
    /**
     * @Route("/", name="games_list")
     * @Template
     **/
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/show/{id}", name="game_show")
     * @Template
     **/
    public function showAction()
    {
        return [];
    }

    /**
     * @Route("/new", name="game_new")
     * @Template
     **/
    public function newAction()
    {
        return [];
    }
}
