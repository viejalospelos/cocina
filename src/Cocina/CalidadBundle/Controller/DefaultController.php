<?php

namespace Cocina\CalidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CalidadBundle:Default:index.html.twig');
    }
}
