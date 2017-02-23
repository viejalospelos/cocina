<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Almacenes
 *
 * @ORM\Table(name="almacenes")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\AlmacenesRepository")
 */
class Almacenes
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
     * @ORM\Column(name="nombre_almacen", type="string", length=50)
     */
    private $nombreAlmacen;


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
     * Set nombreAlmacen
     *
     * @param string $nombreAlmacen
     * @return Almacenes
     */
    public function setNombreAlmacen($nombreAlmacen)
    {
        $this->nombreAlmacen = $nombreAlmacen;

        return $this;
    }

    /**
     * Get nombreAlmacen
     *
     * @return string 
     */
    public function getNombreAlmacen()
    {
        return $this->nombreAlmacen;
    }
    
    
    public function __toString(){
    	return $this->getNombreAlmacen();
    }
}
