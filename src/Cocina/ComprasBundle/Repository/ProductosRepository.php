<?php

namespace Cocina\ComprasBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProductosRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProductosRepository extends EntityRepository
{
	public function queryListaProductos()
	{
		$em=$this->getEntityManager();
		$consulta=$em->createQuery('
				SELECT p,x
				FROM ComprasBundle:Productos p 
				JOIN p.idProveedor x	
				ORDER BY p.nombreProducto
				');
		return $consulta;
	}
	
	public function findListaProductos()
	{
		return $this->queryListaProductos();
	}
	
	
	
	public function queryProductosPorAlmacen($idAlmacen)
	{
		$em=$this->getEntityManager();
		$consulta=$em->createQuery('
				SELECT p
				FROM ComprasBundle:Productos p
				WHERE p.idAlmacen = :idAlmacen
				ORDER BY p.nombreProducto
				');
		$consulta->setParameter('idAlmacen', $idAlmacen);
		return $consulta;
	
	}
	
	public function findProductosPorAlmacen($idAlmacen)
	{
		return $this->queryProductosPorAlmacen($idAlmacen)->getResult();
	}
	
	
	
}
