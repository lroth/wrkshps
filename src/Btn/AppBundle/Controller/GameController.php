<?php

namespace Btn\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

use Symfony\Component\HttpFoundation\Response;
use Btn\AppBundle\Entity\Game;

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

    /**
     * @Route("/fill_in_games")
     **/
    public function fillAction()
    {
        $em = $this->getDoctrine()->getManager();
        // get all categories from db
        $categories = $this->getDoctrine()
            ->getRepository('BtnAppBundle:Category')
            ->findAll();

        // for each category
        foreach ($categories as $category) {
            // create two games
            for ($i = 0; $i < 2; $i++) {
                $game = new Game();
                $game->setName('game - ' . $i);
                $game->setDescription('description');
                $game->setCategory($category);
                $game->setDeveloper('dev company');
                $game->setReleasedAt(new \DateTime('now'));

                // persist objects
                $em->persist($category);
                $em->persist($game);
            }
        }

        // save to db
        $em->flush();

        return new Response('games created');
    }
}
