<?php
namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Albaranes;

class Albaran extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 60;
	}
	public function load(ObjectManager $manager)
	{
		//DEFINIMOS QUE EL 25% DE LOS PEDIDOS YA HAN SIDO RECEPCIONADOS Y TIENEN ALBARÁN AUNQUE SE PIDIERAN HOY
		$pedidos=$manager->getRepository('ComprasBundle:Pedidos')->findAll();
		
		$i=1;
		
		foreach ($pedidos as $pedido){
			
			$albaran=new Albaranes();
			if ($i%4==0){
				$albaran->setIdPedido($pedido);
				$albaran->setFechaEntrada(new \DateTime('now'));
				$albaran->setNumeroAlbaranProveedor(mt_rand(15001,20999));
				
				$manager->persist($albaran);
			}	
			$i++;
		}
		
		$manager->flush();
	}
}
