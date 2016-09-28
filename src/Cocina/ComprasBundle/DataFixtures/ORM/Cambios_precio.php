<?php
namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Cambios_precio;


class CambiosPrecio extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 80;
	}
	public function load(ObjectManager $manager)
 	{
 		$productos=$manager->getRepository('ComprasBundle:Productos')->findAll();
 		
 		foreach ($productos as $producto){
 			$CambiosPrecio=new Cambios_precio();
 			$CambiosPrecio->setIdProducto($producto);
 			$CambiosPrecio->setPrecioAnterior(0);
 			$CambiosPrecio->setPrecioNuevo(mt_rand(5,20));
 			$CambiosPrecio->setFechaCambioPrecio(new \DateTime('now'));
 			
			$manager->persist($CambiosPrecio);
		}
		$manager->flush();
 	}
	

}