<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pedidos
 *
 * @ORM\Table(name="pedidos")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\PedidosRepository")
 */
class Pedidos
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_pedido", type="date")
     */
    private $fechaPedido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrega_prevista", type="date")
     */
    private $fechaEntregaPrevista;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_compra", type="string", length=50)
     */
    private $responsableCompra;

    /**
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Proveedores")
     */
    private $idProveedor;


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
     * Set fechaPedido
     *
     * @param \DateTime $fechaPedido
     * @return Pedidos
     */
    public function setFechaPedido($fechaPedido)
    {
        $this->fechaPedido = $fechaPedido;

    }

    /**
     * Get fechaPedido
     *
     * @return \DateTime 
     */
    public function getFechaPedido()
    {
        return $this->fechaPedido;
    }

    /**
     * Set fechaEntregaPrevista
     *
     * @param \DateTime $fechaEntregaPrevista
     * @return Pedidos
     */
    public function setFechaEntregaPrevista($fechaEntregaPrevista)
    {
        $this->fechaEntregaPrevista = $fechaEntregaPrevista;

        return $this;
    }

    /**
     * Get fechaEntregaPrevista
     *
     * @return \DateTime 
     */
    public function getFechaEntregaPrevista()
    {
        return $this->fechaEntregaPrevista;
    }

    /**
     * Set responsableCompra
     *
     * @param string $responsableCompra
     * @return Pedidos
     */
    public function setResponsableCompra($responsableCompra)
    {
        $this->responsableCompra = $responsableCompra;

        return $this;
    }

    /**
     * Get responsableCompra
     *
     * @return string 
     */
    public function getResponsableCompra()
    {
        return $this->responsableCompra;
    }

    /**
     * Set idProveedor
     */
    public function setIdProveedor(\Cocina\ComprasBundle\Entity\Proveedores $idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get idProveedor
     *
     * @return string 
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    
    public function __construct()
    {
    	$this->id=new ArrayCollection();
    }
    
}
