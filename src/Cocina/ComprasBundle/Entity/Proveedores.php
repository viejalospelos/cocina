<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cocina\ComprasBundle\Util\Util;

/**
 * Proveedores
 *
 * @ORM\Table(name="proveedores")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\ProveedoresRepository")
 */
class Proveedores
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
     * @ORM\Column(name="nombre", type="string", length=255, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria_proveedor", type="string", length=50, nullable=true)
     */
    private $categoriaProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="domicilio_social", type="string", length=128, nullable=true)
     */
    private $domicilioSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_principal", type="string", length=15, nullable=true)
     */
    private $telefonoPrincipal;

    /**
     * @var string
     *
     * @ORM\Column(name="email_principal", type="string", length=50, nullable=true)
     */
    private $emailPrincipal;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=15, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=50, nullable=true)
     */
    private $web;

    /**
     * @var string
     *
     * @ORM\Column(name="registro_sanitario", type="string", length=30, nullable=true)
     */
    private $registroSanitario;

    /**
     * @var string
     *
     * @ORM\Column(name="cif", type="string", length=30, nullable=true)
     */
    private $cif;
    
    /**
     * @var string
     *
     * @ORM\Column(name="dia_de_entrega", type="string", length=30, nullable=true)
     */
    private $diaDeEntrega;
    
    /**
     * @var smallint
     *
     * @ORM\Column(name="antelacion_de_pedido", type="smallint", nullable=true)
     */
    private $antelacionDePedido;

    /**
     * @var string
     *
     * @ORM\Column(name="agente_comercial", type="string", length=50, nullable=true)
     */
    private $agenteComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_agente_comercial", type="string", length=15, nullable=true)
     */
    private $telefonoAgenteComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="email_agente_comercial", type="string", length=50, nullable=true)
     */
    private $emailAgenteComercial;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_calidad", type="string", length=50, nullable=true)
     */
    private $responsableCalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_responsable_calidad", type="string", length=15, nullable=true)
     */
    private $telefonoResponsableCalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="email_responsable_calidad", type="string", length=50, nullable=true)
     */
    private $emailResponsableCalidad;

    /**
     * @var string
     *
     * @ORM\Column(name="notas", type="text", nullable=true)
     */
    private $notas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_homologacion", type="date", nullable=true)
     */
    private $fechaHomologacion;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_homologacion", type="string", length=50, nullable=true)
     */
    private $responsableHomologacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta_registro_sanitario", type="string", length=255, nullable=true)
     */
    private $rutaRegistroSanitario;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta_documentos_adjuntos", type="string", length=255, nullable=true)
     */
    private $rutaDocumentosAdjuntos;

    /**
     * @var bool
     *
     * @ORM\Column(name="estabilidad_precios", type="boolean", nullable=true)
     */
    private $estabilidadPrecios;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Proveedores
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
        $this->slug=Util::getSlug($nombre);

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Proveedores
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set categoriaProveedor
     *
     * @param string $categoriaProveedor
     * @return Proveedores
     */
    public function setCategoriaProveedor($categoriaProveedor)
    {
        $this->categoriaProveedor = $categoriaProveedor;

        return $this;
    }

    /**
     * Get categoriaProveedor
     *
     * @return string 
     */
    public function getCategoriaProveedor()
    {
        return $this->categoriaProveedor;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Proveedores
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set domicilioSocial
     *
     * @param string $domicilioSocial
     * @return Proveedores
     */
    public function setDomicilioSocial($domicilioSocial)
    {
        $this->domicilioSocial = $domicilioSocial;

        return $this;
    }

    /**
     * Get domicilioSocial
     *
     * @return string 
     */
    public function getDomicilioSocial()
    {
        return $this->domicilioSocial;
    }

    /**
     * Set telefonoPrincipal
     *
     * @param string $telefonoPrincipal
     * @return Proveedores
     */
    public function setTelefonoPrincipal($telefonoPrincipal)
    {
        $this->telefonoPrincipal = $telefonoPrincipal;

        return $this;
    }

    /**
     * Get telefonoPrincipal
     *
     * @return string 
     */
    public function getTelefonoPrincipal()
    {
        return $this->telefonoPrincipal;
    }

    /**
     * Set emailPrincipal
     *
     * @param string $emailPrincipal
     * @return Proveedores
     */
    public function setEmailPrincipal($emailPrincipal)
    {
        $this->emailPrincipal = $emailPrincipal;

        return $this;
    }

    /**
     * Get emailPrincipal
     *
     * @return string 
     */
    public function getEmailPrincipal()
    {
        return $this->emailPrincipal;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Proveedores
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set web
     *
     * @param string $web
     * @return Proveedores
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string 
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set registroSanitario
     *
     * @param string $registroSanitario
     * @return Proveedores
     */
    public function setRegistroSanitario($registroSanitario)
    {
        $this->registroSanitario = $registroSanitario;

        return $this;
    }

    /**
     * Get registroSanitario
     *
     * @return string 
     */
    public function getRegistroSanitario()
    {
        return $this->registroSanitario;
    }

    /**
     * Set cif
     *
     * @param string $cif
     * @return Proveedores
     */
    public function setCif($cif)
    {
        $this->cif = $cif;

        return $this;
    }

    /**
     * Get cif
     *
     * @return string 
     */
    public function getCif()
    {
        return $this->cif;
    }
    
    /**
     * Set diaDeEntrega
     *
     * @param string $diaDeEntrega
     * @return Proveedores
     */
    public function setdiaDeEntrega($diaDeEntrega)
    {
    	$this->diaDeEntrega = $diaDeEntrega;
    
    	return $this;
    }
    
    /**
     * Get diaDeEntrega
     *
     * @return string
     */
    public function getdiaDeEntrega()
    {
    	return $this->diaDeEntrega;
    }
    
    
    
    
    
    
    
    
    /**
     * Set antelacionDePedido
     *
     * @param smallint $antelacionDePedido
     * @return Proveedores
     */
    public function setantelacionDePedido($antelacionDePedido)
    {
    	$this->antelacionDePedido = $antelacionDePedido;
    
    	return $this;
    }
    
    /**
     * Get antelacionDePedido
     *
     * @return smallint
     */
    public function getantelacionDePedido()
    {
    	return $this->antelacionDePedido;
    }
    
    /**
     * Set agenteComercial
     *
     * @param string $agenteComercial
     * @return Proveedores
     */
    public function setAgenteComercial($agenteComercial)
    {
        $this->agenteComercial = $agenteComercial;

        return $this;
    }

    /**
     * Get agenteComercial
     *
     * @return string 
     */
    public function getAgenteComercial()
    {
        return $this->agenteComercial;
    }

    /**
     * Set telefonoAgenteComercial
     *
     * @param string $telefonoAgenteComercial
     * @return Proveedores
     */
    public function setTelefonoAgenteComercial($telefonoAgenteComercial)
    {
        $this->telefonoAgenteComercial = $telefonoAgenteComercial;

        return $this;
    }

    /**
     * Get telefonoAgenteComercial
     *
     * @return string 
     */
    public function getTelefonoAgenteComercial()
    {
        return $this->telefonoAgenteComercial;
    }

    /**
     * Set emailAgenteComercial
     *
     * @param string $emailAgenteComercial
     * @return Proveedores
     */
    public function setEmailAgenteComercial($emailAgenteComercial)
    {
        $this->emailAgenteComercial = $emailAgenteComercial;

        return $this;
    }

    /**
     * Get emailAgenteComercial
     *
     * @return string 
     */
    public function getEmailAgenteComercial()
    {
        return $this->emailAgenteComercial;
    }

    /**
     * Set responsableCalidad
     *
     * @param string $responsableCalidad
     * @return Proveedores
     */
    public function setResponsableCalidad($responsableCalidad)
    {
        $this->responsableCalidad = $responsableCalidad;

        return $this;
    }

    /**
     * Get responsableCalidad
     *
     * @return string 
     */
    public function getResponsableCalidad()
    {
        return $this->responsableCalidad;
    }

    /**
     * Set telefonoResponsableCalidad
     *
     * @param string $telefonoResponsableCalidad
     * @return Proveedores
     */
    public function setTelefonoResponsableCalidad($telefonoResponsableCalidad)
    {
        $this->telefonoResponsableCalidad = $telefonoResponsableCalidad;

        return $this;
    }

    /**
     * Get telefonoResponsableCalidad
     *
     * @return string 
     */
    public function getTelefonoResponsableCalidad()
    {
        return $this->telefonoResponsableCalidad;
    }

    /**
     * Set emailResponsableCalidad
     *
     * @param string $emailResponsableCalidad
     * @return Proveedores
     */
    public function setEmailResponsableCalidad($emailResponsableCalidad)
    {
        $this->emailResponsableCalidad = $emailResponsableCalidad;

        return $this;
    }

    /**
     * Get emailResponsableCalidad
     *
     * @return string 
     */
    public function getEmailResponsableCalidad()
    {
        return $this->emailResponsableCalidad;
    }

    /**
     * Set notas
     *
     * @param string $notas
     * @return Proveedores
     */
    public function setNotas($notas)
    {
        $this->notas = $notas;

        return $this;
    }

    /**
     * Get notas
     *
     * @return string 
     */
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Set fechaHomologacion
     *
     * @param \DateTime $fechaHomologacion
     * @return Proveedores
     */
    public function setFechaHomologacion($fechaHomologacion)
    {
        $this->fechaHomologacion = $fechaHomologacion;

        return $this;
    }

    /**
     * Get fechaHomologacion
     *
     * @return \DateTime 
     */
    public function getFechaHomologacion()
    {
        return $this->fechaHomologacion;
    }

    /**
     * Set responsableHomologacion
     *
     * @param string $responsableHomologacion
     * @return Proveedores
     */
    public function setResponsableHomologacion($responsableHomologacion)
    {
        $this->responsableHomologacion = $responsableHomologacion;

        return $this;
    }

    /**
     * Get responsableHomologacion
     *
     * @return string 
     */
    public function getResponsableHomologacion()
    {
        return $this->responsableHomologacion;
    }

    /**
     * Set rutaRegistroSanitario
     *
     * @param string $rutaRegistroSanitario
     * @return Proveedores
     */
    public function setRutaRegistroSanitario($rutaRegistroSanitario)
    {
        $this->rutaRegistroSanitario = $rutaRegistroSanitario;

        return $this;
    }

    /**
     * Get rutaRegistroSanitario
     *
     * @return string 
     */
    public function getRutaRegistroSanitario()
    {
        return $this->rutaRegistroSanitario;
    }

    /**
     * Set rutaDocumentosAdjuntos
     *
     * @param string $rutaDocumentosAdjuntos
     * @return Proveedores
     */
    public function setRutaDocumentosAdjuntos($rutaDocumentosAdjuntos)
    {
        $this->rutaDocumentosAdjuntos = $rutaDocumentosAdjuntos;

        return $this;
    }

    /**
     * Get rutaDocumentosAdjuntos
     *
     * @return string 
     */
    public function getRutaDocumentosAdjuntos()
    {
        return $this->rutaDocumentosAdjuntos;
    }

    /**
     * Set estabilidadPrecios
     *
     * @param boolean $estabilidadPrecios
     * @return Proveedores
     */
    public function setEstabilidadPrecios($estabilidadPrecios)
    {
        $this->estabilidadPrecios = $estabilidadPrecios;

        return $this;
    }

    /**
     * Get estabilidadPrecios
     *
     * @return boolean 
     */
    public function getEstabilidadPrecios()
    {
        return $this->estabilidadPrecios;
    }
    
    
    public function _toString(){
    	return $this->getNombre();
    }
}
