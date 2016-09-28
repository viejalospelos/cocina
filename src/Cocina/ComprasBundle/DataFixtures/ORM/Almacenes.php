<?php
namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Almacenes;

class Almacen extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 20;
	}
	public function load(ObjectManager $manager)
	{
		$almacenes=array('Almacen seco', 'Congelador', 'Cámara de verduras', 'Cámara de carnes', 'Cámara de pescados', 'Cámara de descongelación');
		
		$i=0;
		
		foreach ($almacenes as $almacen){
			$i++;
			$sitio=new Almacenes();
			$sitio->setNombreAlmacen($almacen);
			
			$manager->persist($sitio);		
			$this->addReference('almacenNumero'.$i, $sitio);
		}
		$manager->flush();
	}
}
