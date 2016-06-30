<?php

namespace Cocina\TrazabilidadBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TrazabilidadBundle:Default:index.html.twig');
    }
}
