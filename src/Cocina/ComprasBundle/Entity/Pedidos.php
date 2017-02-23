<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;

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
     * @var bool
     * @ORM\Column(name="entregado", type="boolean", nullable=true)
     */
    private $entregado;


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

    }

    /**
     * Get idProveedor
     * @return string 
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }
    
    /**
     * Set entregado
     *
     * @param boolean $entregado
     * @return Pedidos_detalle
     */
    public function setEntregado($entregado)
    {
    	$this->entregado=$entregado;
    	return $this;
    }
    
    /**
     * Get entregado
     *
     * @return boolean
     */
    public function getEntregado()
    {
    	return $this->entregado;
    }
    
    
//     public function __construct()
//     {
//     	$this->id=new ArrayCollection();
//     }
    
    public function __toString(){
    	//return $this->id;
    	return (string) $this->getId();
    }
    /*----------- IMPORTANTE PARA CREAR FORMULARIO EMBEBIDO------------------------ */
    /**
     * @Assert\Type(type="Cocina\ComprasBundle\Entity\Pedidos_detalle")
     * @Assert\Valid()
     */
    protected $detalles;
    
    public function getDetalles()
    {
    	return $this->detalles;
    }
    
    public function setDetalles(\Cocina\ComprasBundle\Entity\Pedidos_detalle $detalles = null)
    {
    	$this->detalles = $detalles;
    }	
    /*------------------------------------------------------------------------------------*/
    
    protected $camposPedido;
    
    public function __construct()
    {
    	$this->camposPedido=new ArrayCollection();
    }
    public function setCamposPedido(Collection $camposPedido)
    {
    	$this->camposPedido=$camposPedido;
    	foreach ($camposPedido as $campoPedido){
    		$campoPedido->setPedidos($this);
    	}
    }
    
    public function getCamposPedido()
    {
    	return $this->camposPedido;
    }
    
}