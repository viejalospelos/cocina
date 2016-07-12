<?php

namespace Cocina\ComprasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function portadaAction()
    {
        return $this->render('ComprasBundle:Default:index.html.twig');
    }
}
