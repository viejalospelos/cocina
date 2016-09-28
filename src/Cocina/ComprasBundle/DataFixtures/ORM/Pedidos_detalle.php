<?php

namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Pedidos_detalle;



class PedidoDetalle extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 50;
	}
	public function load(ObjectManager $manager)
	{
		$pedidos=$manager->getRepository('ComprasBundle:Pedidos')->findAll();

//A CADA PEDIDO LE PONEMOS ENTRE 2 Y 5 PRODUCTOS
		$n=1;
		foreach ($pedidos as $pedido){
			$aleatorio=mt_rand(2,5);
			for ($j=1;$j<$aleatorio;$j++){				
				$productos=$manager->getRepository('ComprasBundle:Productos')->findById_proveedor($pedido->getId());
				$pedidoDetalle=new Pedidos_detalle();
				$pedidoDetalle->setIdPedido($pedido);
				$productos=$productos[array_rand($productos)];
				$pedidoDetalle->setIdProducto($productos);
				$pedidoDetalle->setCantidadPedida(mt_rand(5,15));
				$pedidoDetalle->setObservaciones($this->verborrea());
				
				$this->addReference('pedidoDetalle'.$n, $pedidoDetalle);
				$n++;
				
				$manager->persist($pedidoDetalle);
			}
		}
		$manager->flush();
	

	}
	
	private function verborrea()
	{
	
		$frases = array_flip(array(
				'Entregar por la mañana',
				'Entregar a primera hora',
				'Urgente',
				'Avisar por teléfono antes de la entrega',
				'No sustituir los productos',
				'Si tienen alguna duda contacten con el Sr.Daemon',
				'La recepción se realizará por la entrada trasera',
				'Para entregar en Avda. Evergreen Terrace, número 3',

		));
	
		$numeroFrases = rand(2, 3);
	
		return implode('; ', array_rand($frases, $numeroFrases));
	}


}