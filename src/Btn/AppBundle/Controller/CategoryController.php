<?php

namespace Btn\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class CategoryController extends BaseController
{
    /**
     * @Route("/categories", name="category_list")
     * @Template
     **/
    public function indexAction()
    {
        // get all categories from db

        return [];
    }
}
