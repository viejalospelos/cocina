<?php
namespace Cocina\ComprasBundle\Model;

use Symfony\Component\Validator\Constraints as Assert;

class PedidosModel
{
	/**
	 * @Assert\Type("\Cocina\ComprasBundle\Entity\Productos")
	 * @Assert\NotNull()
	 */
	public $productos;
}