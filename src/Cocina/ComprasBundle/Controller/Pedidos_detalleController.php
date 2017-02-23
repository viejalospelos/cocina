<?php

namespace Cocina\ComprasBundle\Controller;

use Cocina\ComprasBundle\Entity\Pedidos_detalle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Cocina\ComprasBundle\Form\PedidosType;
use Cocina\ComprasBundle\Form\Pedidos_detalleType;


class PedidosController extends Controller
{
	/**
	 * Lists all pedido entities.
	 *
	 */
	public function newAction(Request $request, $pedido, $form)
	{
		$pedidoDetalle = new Pedidos_detalle();
		$form2 = $this->createForm('Cocina\ComprasBundle\Form\Pedidos_detalleType');
	
		$form2->handleRequest($request);
	
		if ($form2->isSubmitted() && $form2->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($pedidoDetalle);
			$em->flush($pedidoDetalle);
	
			//return $this->redirectToRoute('pedidos_show', array('id' => $pedido->getId()));
		}
	
		return $this->render('ComprasBundle:pedidos:new.html.twig', array(
				'pedido' => $pedido,
				'form' => $form->createView(),
				'form2'=>$form2->createView(),
		));
	}
}