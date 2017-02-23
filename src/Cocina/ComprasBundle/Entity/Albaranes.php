<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Albaranes
 *
 * @ORM\Table(name="albaranes")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\AlbaranesRepository")
 */
class Albaranes
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
     * @var string
     *
     * @ORM\Column(name="numero_albaran_proveedor", type="string", length=128, nullable=true)
     */
    private $numeroAlbaranProveedor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_entrada", type="date")
     */
    private $fechaEntrada;

    /**
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Pedidos")
     */
    private $idPedido;


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
     * Set numeroAlbaranProveedor
     *
     * @param string $numeroAlbaranProveedor
     * @return Albaranes
     */
    public function setNumeroAlbaranProveedor($numeroAlbaranProveedor)
    {
        $this->numeroAlbaranProveedor = $numeroAlbaranProveedor;

        return $this;
    }

    /**
     * Get numeroAlbaranProveedor
     *
     * @return string 
     */
    public function getNumeroAlbaranProveedor()
    {
        return $this->numeroAlbaranProveedor;
    }

    /**
     * Set fechaEntrada
     *
     * @param \DateTime $fechaEntrada
     * @return Albaranes
     */
    public function setFechaEntrada($fechaEntrada)
    {
        $this->fechaEntrada = $fechaEntrada;

        return $this;
    }

    /**
     * Get fechaEntrada
     *
     * @return \DateTime 
     */
    public function getFechaEntrada()
    {
        return $this->fechaEntrada;
    }

    /**
     * Set idPedido
     *
     * @param string $idPedido
     * @return Albaranes
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
    
    public function __toString(){
    	return $this->id;
    }
    
    
}
