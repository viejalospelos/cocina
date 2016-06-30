<?php

namespace Cocina\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ComprasBundle:Default:index.html.twig');
    }
}
