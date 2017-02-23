<?php
namespace Cocina\ComprasBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Cocina\ComprasBundle\Entity\Pedidos;


class Pedido extends AbstractFixture implements OrderedFixtureInterface
{
	public function getOrder(){
		return 40;
	}
	public function load(ObjectManager $manager)
 	{
 		$proveedores=$manager->getRepository('ComprasBundle:Proveedores')->findAll();
 		
 		foreach ($proveedores as $proveedor){

		//for ($n=1;$n<500;$n++){
		
 		//PARA LAS PRUEBAS PONEMOS SÓLO UN PEDIDO POR PROVEEDOR	REALIZADO EN EL MOMENTO EN QUE SE CARGAN LOS FIXTURES
			$pedido=new Pedidos();
			
			$fechaPedido= new \DateTime('now');
			$pedido->setFechaPedido($fechaPedido);

			$aleatorio=array_rand(array_flip(array('24 hours','48 hours','72 hours')));
			$fechaEntrega= clone $fechaPedido;
			$fechaEntrega->add(\DateInterval::createFromDateString($aleatorio));
			$pedido->setFechaEntregaPrevista($fechaEntrega);


			$pedido->setResponsableCompra('Sr.Quality Ruiz');
			//$pedido->setIdProveedor($this->getReference("proveedorNumero".mt_rand(1,50)));
			$pedido->setIdProveedor($proveedor);
			$pedido->setEntregado(0);
			
			//$this->addReference('pedidoNumero'.$n, $pedido);
			$manager->persist($pedido);
		}
		$manager->flush();
 	}
	

}
