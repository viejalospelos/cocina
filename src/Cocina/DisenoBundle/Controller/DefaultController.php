<?php

namespace Cocina\DisenoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DisenoBundle:Default:index.html.twig');
    }
}
