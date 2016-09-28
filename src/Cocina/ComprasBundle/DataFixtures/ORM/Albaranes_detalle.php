<?php
namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Albaranes_detalle;

class Albaran_detalle extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 70;
	}
	public function load(ObjectManager $manager)
	{
		
		$albaranes=$manager->getRepository('ComprasBundle:Albaranes')->findAll();
		//$productos=$manager->getRepository('ComprasBundle:Pedidos_detalle')->findAll();
		
		
		$i=1;
		foreach ($albaranes as $albaran){
			$detalles=$manager->getRepository('ComprasBundle:Pedidos_detalle')->findByIdPedido($albaran->getIdPedido());
			foreach ($detalles as $detalle){
						$albaran_detalle=new Albaranes_detalle();
	
			 			$albaran_detalle->setIdAlbaran($albaran);
						$albaran_detalle->setIdProducto($detalle);
						$albaran_detalle->setCantidadRecibida(mt_rand(5,15));
						$barcode=1234567890123+$i;
						$albaran_detalle->setBarcode(strval($barcode));
						$albaran_detalle->setDevolucion(0);
						$albaran_detalle->setObservacionesDevolucion('ok');
						
						$i++;	
							$manager->persist($albaran_detalle);
					
	 			}
			}
		
		$manager->flush();
	}
	

}
