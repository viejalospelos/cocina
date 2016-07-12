<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cambios_precio
 *
 * @ORM\Table(name="cambios_precio")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\Cambios_precioRepository")
 */
class Cambios_precio
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
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Productos")
     */
    private $idProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_anterior", type="decimal", precision=10, scale=3)
     */
    private $precioAnterior;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_nuevo", type="decimal", precision=10, scale=3)
     */
    private $precioNuevo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cambio_precio", type="date")
     */
    private $fechaCambioPrecio;


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
     * Set idProducto
     *
     * @param string $idProducto
     * @return Cambios_precio
     */
    public function setIdProducto(\Cocina\ComprasBundle\Entity\Productos $idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
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
     * Set precioAnterior
     *
     * @param string $precioAnterior
     * @return Cambios_precio
     */
    public function setPrecioAnterior($precioAnterior)
    {
        $this->precioAnterior = $precioAnterior;

        return $this;
    }

    /**
     * Get precioAnterior
     *
     * @return string 
     */
    public function getPrecioAnterior()
    {
        return $this->precioAnterior;
    }

    /**
     * Set precioNuevo
     *
     * @param string $precioNuevo
     * @return Cambios_precio
     */
    public function setPrecioNuevo($precioNuevo)
    {
        $this->precioNuevo = $precioNuevo;

        return $this;
    }

    /**
     * Get precioNuevo
     *
     * @return string 
     */
    public function getPrecioNuevo()
    {
        return $this->precioNuevo;
    }

    /**
     * Set fechaCambioPrecio
     *
     * @param \DateTime $fechaCambioPrecio
     * @return Cambios_precio
     */
    public function setFechaCambioPrecio($fechaCambioPrecio)
    {
        $this->fechaCambioPrecio = $fechaCambioPrecio;

        return $this;
    }

    /**
     * Get fechaCambioPrecio
     *
     * @return \DateTime 
     */
    public function getFechaCambioPrecio()
    {
        return $this->fechaCambioPrecio;
    }
}
