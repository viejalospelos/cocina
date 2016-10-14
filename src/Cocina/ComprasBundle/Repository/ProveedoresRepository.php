<?php

namespace Cocina\ComprasBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ProveedoresRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProveedoresRepository extends EntityRepository
{
	public function findProductosDeProveedor($id)
	{
		$em=$this->getEntityManager();
		$consulta=$em->createQuery('
				SELECT p
				FROM ComprasBundle:Productos p
				WHERE p.idProveedor = :id
				ORDER BY p.nombreProducto				
				');
		$consulta->setParameter('id', $id);
		return $consulta;
	}
	
	public function queryTodosLosProveedores()
	{
		$em=$this->getEntityManager();
		$consulta=$em->createQuery('
				SELECT p
				FROM ComprasBundle:Proveedores p
				ORDER BY p.nombre
				');
		return $consulta;
	}
	public function findTodosLosProveedores()
	{
		return $this->queryTodosLosProveedores();
	}
}
