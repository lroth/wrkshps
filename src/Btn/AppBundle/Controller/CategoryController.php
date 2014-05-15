<?php

namespace Btn\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

use Btn\AppBundle\Entity\Category;
use Btn\AppBundle\Entity\Platform;

class CategoryController extends BaseController
{
    /**
     * @Route("/categories", name="category_list")
     * @Template
     **/
    public function indexAction()
    {
        // get all categories from db
        $categories = $this->getDoctrine()
            ->getRepository('BtnAppBundle:Category')
            ->findAll();

        return ['categories' => $categories];
    }

    /**
     * @Route("/fill_in_categories")
     **/
    public function fillAction()
    {
        $categories = ['Action', 'RPG', 'Sport'];
        $em = $this->getDoctrine()->getManager();

        foreach ($categories as $name) {
            $category = new Category();
            $category->setName($name);
            $em->persist($category);
        }

        $em->flush();

        return new Response('categories created');
    }

    /**
     * @Route("/fill_in_platforms")
     **/
    public function fillPlatformsAction()
    {
        $platforms = ['PS3', 'PS4', 'PS VITA'];
        $em = $this->getDoctrine()->getManager();

        foreach ($platforms as $name) {
            $platform = new Platform();
            $platform->setName($name);
            $em->persist($platform);
        }

        $em->flush();

        return new Response('platforms created');
    }
}
