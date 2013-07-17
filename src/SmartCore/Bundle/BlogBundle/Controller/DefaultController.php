<?php

namespace SmartCore\Bundle\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SmartBlogBundle:Default:index.html.twig');
    }
}
