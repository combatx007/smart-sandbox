<?php

namespace Acme\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AcmeNewsBundle:Default:index.html.twig');
    }
}
