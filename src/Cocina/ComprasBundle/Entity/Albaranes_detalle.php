<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Albaranes_detalle
 *
 * @ORM\Table(name="albaranes_detalle")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\Albaranes_detalleRepository")
 */
class Albaranes_detalle
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
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Albaranes")
     */
    private $idAlbaran;

    /**
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Pedidos_detalle")
     */
    private $idProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_recibida", type="decimal", precision=10, scale=3)
     */
    private $cantidadRecibida;

    /**
     * @var string
     *
     * @ORM\Column(name="barcode", type="string", length=13, unique=true)
     */
    private $barcode;

    /**
     * @var bool
     *
     * @ORM\Column(name="devolucion", type="boolean")
     */
    private $devolucion;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones_devolucion", type="text", nullable=true)
     */
    private $observacionesDevolucion;


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
     * Set idAlbaran
     *
     * @param string $idAlbaran
     * @return Albaranes_detalle
     */
    public function setIdAlbaran(\Cocina\ComprasBundle\Entity\Albaranes $idAlbaran)
    {
        $this->idAlbaran = $idAlbaran;

    }

    /**
     * Get idAlbaran
     *
     * @return string 
     */
    public function getIdAlbaran()
    {
        return $this->idAlbaran;
    }

    /**
     * Set idProducto
     *
     * @param string $idProducto
     * @return Albaranes_detalle
     */
    public function setIdProducto(\Cocina\ComprasBundle\Entity\Pedidos_detalle $idProducto)
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
     * Set cantidadRecibida
     *
     * @param string $cantidadRecibida
     * @return Albaranes_detalle
     */
    public function setCantidadRecibida($cantidadRecibida)
    {
        $this->cantidadRecibida = $cantidadRecibida;

        return $this;
    }

    /**
     * Get cantidadRecibida
     *
     * @return string 
     */
    public function getCantidadRecibida()
    {
        return $this->cantidadRecibida;
    }

    /**
     * Set barcode
     *
     * @param string $barcode
     * @return Albaranes_detalle
     */
    public function setBarcode($barcode)
    {
        $this->barcode = $barcode;

        return $this;
    }

    /**
     * Get barcode
     *
     * @return string 
     */
    public function getBarcode()
    {
        return $this->barcode;
    }

    /**
     * Set devolucion
     *
     * @param boolean $devolucion
     * @return Albaranes_detalle
     */
    public function setDevolucion($devolucion)
    {
        $this->devolucion = $devolucion;

        return $this;
    }

    /**
     * Get devolucion
     *
     * @return boolean 
     */
    public function getDevolucion()
    {
        return $this->devolucion;
    }

    /**
     * Set observacionesDevolucion
     *
     * @param string $observacionesDevolucion
     * @return Albaranes_detalle
     */
    public function setObservacionesDevolucion($observacionesDevolucion)
    {
        $this->observacionesDevolucion = $observacionesDevolucion;

        return $this;
    }

    /**
     * Get observacionesDevolucion
     *
     * @return string 
     */
    public function getObservacionesDevolucion()
    {
        return $this->observacionesDevolucion;
    }
    
    public function __toString(){
    	return $this->id;
    }
}
