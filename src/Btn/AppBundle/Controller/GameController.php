<?php

namespace Btn\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Btn\AppBundle\Entity\Game;
use Btn\AppBundle\Form\GameType;

class GameController extends BaseController
{
    /**
     * @Route("/", name="games_list")
     * @Template
     **/
    public function indexAction()
    {
        $games = $this->getDoctrine()
            ->getRepository('BtnAppBundle:Game')
            ->findAll();

        return ['games' => $games];
    }

    /**
     * @Route("/show/{id}", name="game_show")
     * @Template
     **/
    public function showAction(Game $game)
    {
        return ['game' => $game];
    }

    /**
     * @Route("/new", name="game_new")
     * @Template
     **/
    public function newAction(Request $request)
    {
        $form = $this->createForm(new GameType());

        $form->handleRequest($request);

        if ($form->isValid()) {
            $game = $form->getData();
            $em   = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

            return $this->redirect($this->generateUrl('games_list'));
        }

        return ['form' => $form->createView()];
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

    /**
     * @Route("/add_platforms_to_games")
     **/
    public function fillGamesWithPlatformsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $games     = $this->getDoctrine()->getRepository('BtnAppBundle:Game')->findAll();
        $platforms = $this->getDoctrine()->getRepository('BtnAppBundle:Platform')->findAll();

        foreach ($games as $game) {
            foreach ($platforms as $platform) {
                $game->addPlatform($platform);

                $em->persist($game);
            }
        }

        // save to db
        $em->flush();

        return new Response('games saved');
    }
}
