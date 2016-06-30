<?php

namespace Cocina\NutricionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NutricionBundle:Default:index.html.twig');
    }
}
