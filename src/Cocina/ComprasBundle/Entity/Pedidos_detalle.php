<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * pedidos_detalle
 *
 * @ORM\Table(name="pedidos_detalle")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\Pedidos_detalleRepository")
 */
class Pedidos_detalle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Pedidos")
     */
    private $idPedido;

    /**
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Productos")
     */
    private $idProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_pedida", type="decimal", precision=10, scale=3)
     */
    private $cantidadPedida;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idPedido
     */
    public function setIdPedido(\Cocina\ComprasBundle\Entity\Pedidos $idPedido)
    {
        $this->idPedido = $idPedido;

    }

    /**
     * Get idPedido
     *
     * @return string 
     */
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    /**
     * Set idProducto
     */
    public function setIdProducto(\Cocina\ComprasBundle\Entity\Productos $idProducto)
    {
        $this->idProducto = $idProducto;

    }

    /**
     * Get idProducto
     *
     * @return string 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set cantidadPedida
     *
     * @param string $cantidadPedida
     * @return pedidos_detalle
     */
    public function setCantidadPedida($cantidadPedida)
    {
        $this->cantidadPedida = $cantidadPedida;

        return $this;
    }

    /**
     * Get cantidadPedida
     *
     * @return string 
     */
    public function getCantidadPedida()
    {
        return $this->cantidadPedida;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return pedidos_detalle
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }
}
