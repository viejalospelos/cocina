<?php

namespace Cocina\UsuarioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;

class DefaultController extends Controller
{
    public function loginAction(Request $peticion)
    {
        $session=$peticion->getSession();
        
        // obtener, si existe, el error producido en el último intento de login
        if($peticion->attributes->has(Security::AUTHENTICATION_ERROR)){
        	$error=$peticion->attributes->get(Security::AUTHENTICATION_ERROR);
        }else{
        	$error=$session->get(Security::AUTHENTICATION_ERROR);
        	$session->remove(Security::AUTHENTICATION_ERROR);
        }
        return $this->render('UsuarioBundle:Default:login.html.twig', array(
        		'last_username'=>$session->get(Security::LAST_USERNAME),
        		'error'=>$error
        ));
    }
}
