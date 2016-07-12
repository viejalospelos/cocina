<?php

namespace Cocina\ComprasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productos
 *
 * @ORM\Table(name="productos")
 * @ORM\Entity(repositoryClass="Cocina\ComprasBundle\Repository\ProductosRepository")
 */
class Productos
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
     * @ORM\Column(name="fecha_alta", type="date")
     */
    private $fechaAlta;

    /**
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Proveedores")
     */
    private $idProveedor;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_producto", type="string", length=255)
     */
    private $nombreProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_producto", type="string", length=50, nullable=true)
     */
    private $tipoProducto;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=50, nullable=true)
     */
    private $marca;

    /**
     * @var bool
     *
     * @ORM\Column(name="baja", type="boolean", nullable=true)
     */
    private $baja;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_baja", type="date", nullable=true)
     */
    private $fechaBaja;

    /**
     * @var string
     *
     * @ORM\Column(name="notas", type="text", nullable=true)
     */
    private $notas;

    /**
     * @var string
     *
     * @ORM\Column(name="ean13", type="string", length=13, nullable=true)
     */
    private $ean13;

    /**
     * @var string
     *
     * @ORM\Column(name="dun14", type="string", length=14, nullable=true)
     */
    private $dun14;

    /**
     * @var string
     *
     * @ORM\Column(name="ean128", type="string", length=255, nullable=true)
     */
    private $ean128;

    /**
     * @var string
     *
     * @ORM\Column(name="formato_compra", type="string", length=50)
     */
    private $formatoCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_formato_compra", type="decimal", precision=10, scale=3)
     */
    private $precioFormatoCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="factor_conversion_formato_compra", type="decimal", precision=6, scale=3)
     */
    private $factorConversionFormatoCompra;

    /**
     * @var string
     *
     * @ORM\Column(name="precio_kg", type="decimal", precision=10, scale=3)
     */
    private $precioKg;

    /**
     * @var bool
     *
     * @ORM\Column(name="estabilidad_precios", type="boolean")
     */
    private $estabilidadPrecios;

    /**
     * @ORM\ManyToOne(targetEntity="Cocina\ComprasBundle\Entity\Almacenes")
     */
    private $idAlmacen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_homologacion", type="date")
     */
    private $fechaHomologacion;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable_homologacion", type="string", length=50)
     */
    private $responsableHomologacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta_ficha_tecnica", type="string", length=255, nullable=true)
     */
    private $rutaFichaTecnica;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta_documentos_adjuntos", type="string", length=255, nullable=true)
     */
    private $rutaDocumentosAdjuntos;

    /**
     * @var string
     *
     * @ORM\Column(name="ingredientes_declarados", type="text")
     */
    private $ingredientesDeclarados;

    /**
     * @var bool
     *
     * @ORM\Column(name="gluten", type="boolean")
     */
    private $gluten;

    /**
     * @var bool
     *
     * @ORM\Column(name="leche", type="boolean")
     */
    private $leche;

    /**
     * @var bool
     *
     * @ORM\Column(name="huevo", type="boolean")
     */
    private $huevo;

    /**
     * @var bool
     *
     * @ORM\Column(name="soja", type="boolean")
     */
    private $soja;

    /**
     * @var bool
     *
     * @ORM\Column(name="apio", type="boolean")
     */
    private $apio;

    /**
     * @var bool
     *
     * @ORM\Column(name="pescado", type="boolean")
     */
    private $pescado;

    /**
     * @var bool
     *
     * @ORM\Column(name="crustaceos", type="boolean")
     */
    private $crustaceos;

    /**
     * @var bool
     *
     * @ORM\Column(name="moluscos", type="boolean")
     */
    private $moluscos;

    /**
     * @var bool
     *
     * @ORM\Column(name="frutos_de_cascara", type="boolean")
     */
    private $frutosDeCascara;

    /**
     * @var bool
     *
     * @ORM\Column(name="cacahuete", type="boolean")
     */
    private $cacahuete;

    /**
     * @var bool
     *
     * @ORM\Column(name="mostaza", type="boolean")
     */
    private $mostaza;

    /**
     * @var bool
     *
     * @ORM\Column(name="sesamo", type="boolean")
     */
    private $sesamo;

    /**
     * @var bool
     *
     * @ORM\Column(name="so2_sulfito", type="boolean")
     */
    private $so2Sulfito;

    /**
     * @var bool
     *
     * @ORM\Column(name="altramuces", type="boolean")
     */
    private $altramuces;

    /**
     * @var bool
     *
     * @ORM\Column(name="no2_nitrito", type="boolean")
     */
    private $no2Nitrito;

    /**
     * @var bool
     *
     * @ORM\Column(name="potenciadores_sabor", type="boolean")
     */
    private $potenciadoresSabor;


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
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return Productos
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
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
     */
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set nombreProducto
     *
     * @param string $nombreProducto
     * @return Productos
     */
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get nombreProducto
     *
     * @return string 
     */
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set tipoProducto
     *
     * @param string $tipoProducto
     * @return Productos
     */
    public function setTipoProducto($tipoProducto)
    {
        $this->tipoProducto = $tipoProducto;

        return $this;
    }

    /**
     * Get tipoProducto
     *
     * @return string 
     */
    public function getTipoProducto()
    {
        return $this->tipoProducto;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Productos
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
     * Set marca
     *
     * @param string $marca
     * @return Productos
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set baja
     *
     * @param boolean $baja
     * @return Productos
     */
    public function setBaja($baja)
    {
        $this->baja = $baja;

        return $this;
    }

    /**
     * Get baja
     *
     * @return boolean 
     */
    public function getBaja()
    {
        return $this->baja;
    }

    /**
     * Set fechaBaja
     *
     * @param \DateTime $fechaBaja
     * @return Productos
     */
    public function setFechaBaja($fechaBaja)
    {
        $this->fechaBaja = $fechaBaja;

        return $this;
    }

    /**
     * Get fechaBaja
     *
     * @return \DateTime 
     */
    public function getFechaBaja()
    {
        return $this->fechaBaja;
    }

    /**
     * Set notas
     *
     * @param string $notas
     * @return Productos
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
     * Set ean13
     *
     * @param string $ean13
     * @return Productos
     */
    public function setEan13($ean13)
    {
        $this->ean13 = $ean13;

        return $this;
    }

    /**
     * Get ean13
     *
     * @return string 
     */
    public function getEan13()
    {
        return $this->ean13;
    }

    /**
     * Set dun14
     *
     * @param string $dun14
     * @return Productos
     */
    public function setDun14($dun14)
    {
        $this->dun14 = $dun14;

        return $this;
    }

    /**
     * Get dun14
     *
     * @return string 
     */
    public function getDun14()
    {
        return $this->dun14;
    }

    /**
     * Set ean128
     *
     * @param string $ean128
     * @return Productos
     */
    public function setEan128($ean128)
    {
        $this->ean128 = $ean128;

        return $this;
    }

    /**
     * Get ean128
     *
     * @return string 
     */
    public function getEan128()
    {
        return $this->ean128;
    }

    /**
     * Set formatoCompra
     *
     * @param string $formatoCompra
     * @return Productos
     */
    public function setFormatoCompra($formatoCompra)
    {
        $this->formatoCompra = $formatoCompra;

        return $this;
    }

    /**
     * Get formatoCompra
     *
     * @return string 
     */
    public function getFormatoCompra()
    {
        return $this->formatoCompra;
    }

    /**
     * Set precioFormatoCompra
     *
     * @param string $precioFormatoCompra
     * @return Productos
     */
    public function setPrecioFormatoCompra($precioFormatoCompra)
    {
        $this->precioFormatoCompra = $precioFormatoCompra;

        return $this;
    }

    /**
     * Get precioFormatoCompra
     *
     * @return string 
     */
    public function getPrecioFormatoCompra()
    {
        return $this->precioFormatoCompra;
    }

    /**
     * Set factorConversionFormatoCompra
     *
     * @param string $factorConversionFormatoCompra
     * @return Productos
     */
    public function setFactorConversionFormatoCompra($factorConversionFormatoCompra)
    {
        $this->factorConversionFormatoCompra = $factorConversionFormatoCompra;

        return $this;
    }

    /**
     * Get factorConversionFormatoCompra
     *
     * @return string 
     */
    public function getFactorConversionFormatoCompra()
    {
        return $this->factorConversionFormatoCompra;
    }

    /**
     * Set precioKg
     *
     * @param string $precioKg
     * @return Productos
     */
    public function setPrecioKg($precioKg)
    {
        $this->precioKg = $precioKg;

        return $this;
    }

    /**
     * Get precioKg
     *
     * @return string 
     */
    public function getPrecioKg()
    {
        return $this->precioKg;
    }

    /**
     * Set estabilidadPrecios
     *
     * @param boolean $estabilidadPrecios
     * @return Productos
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

    /**
     * Set idAlmacen
     */
    public function setIdAlmacen(\Cocina\ComprasBundle\Entity\Almacenes $idAlmacen)
    {
        $this->idAlmacen = $idAlmacen;

        return $this;
    }

    /**
     * Get idAlmacen
     *
     * @return string 
     */
    public function getIdAlmacen()
    {
        return $this->idAlmacen;
    }

    /**
     * Set fechaHomologacion
     *
     * @param \DateTime $fechaHomologacion
     * @return Productos
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
     * @return Productos
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
     * Set rutaFichaTecnica
     *
     * @param string $rutaFichaTecnica
     * @return Productos
     */
    public function setRutaFichaTecnica($rutaFichaTecnica)
    {
        $this->rutaFichaTecnica = $rutaFichaTecnica;

        return $this;
    }

    /**
     * Get rutaFichaTecnica
     *
     * @return string 
     */
    public function getRutaFichaTecnica()
    {
        return $this->rutaFichaTecnica;
    }

    /**
     * Set rutaDocumentosAdjuntos
     *
     * @param string $rutaDocumentosAdjuntos
     * @return Productos
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
     * Set ingredientesDeclarados
     *
     * @param string $ingredientesDeclarados
     * @return Productos
     */
    public function setIngredientesDeclarados($ingredientesDeclarados)
    {
        $this->ingredientesDeclarados = $ingredientesDeclarados;

        return $this;
    }

    /**
     * Get ingredientesDeclarados
     *
     * @return string 
     */
    public function getIngredientesDeclarados()
    {
        return $this->ingredientesDeclarados;
    }

    /**
     * Set gluten
     *
     * @param boolean $gluten
     * @return Productos
     */
    public function setGluten($gluten)
    {
        $this->gluten = $gluten;

        return $this;
    }

    /**
     * Get gluten
     *
     * @return boolean 
     */
    public function getGluten()
    {
        return $this->gluten;
    }

    /**
     * Set leche
     *
     * @param boolean $leche
     * @return Productos
     */
    public function setLeche($leche)
    {
        $this->leche = $leche;

        return $this;
    }

    /**
     * Get leche
     *
     * @return boolean 
     */
    public function getLeche()
    {
        return $this->leche;
    }

    /**
     * Set huevo
     *
     * @param boolean $huevo
     * @return Productos
     */
    public function setHuevo($huevo)
    {
        $this->huevo = $huevo;

        return $this;
    }

    /**
     * Get huevo
     *
     * @return boolean 
     */
    public function getHuevo()
    {
        return $this->huevo;
    }

    /**
     * Set soja
     *
     * @param boolean $soja
     * @return Productos
     */
    public function setSoja($soja)
    {
        $this->soja = $soja;

        return $this;
    }

    /**
     * Get soja
     *
     * @return boolean 
     */
    public function getSoja()
    {
        return $this->soja;
    }

    /**
     * Set apio
     *
     * @param boolean $apio
     * @return Productos
     */
    public function setApio($apio)
    {
        $this->apio = $apio;

        return $this;
    }

    /**
     * Get apio
     *
     * @return boolean 
     */
    public function getApio()
    {
        return $this->apio;
    }

    /**
     * Set pescado
     *
     * @param boolean $pescado
     * @return Productos
     */
    public function setPescado($pescado)
    {
        $this->pescado = $pescado;

        return $this;
    }

    /**
     * Get pescado
     *
     * @return boolean 
     */
    public function getPescado()
    {
        return $this->pescado;
    }

    /**
     * Set crustaceos
     *
     * @param boolean $crustaceos
     * @return Productos
     */
    public function setCrustaceos($crustaceos)
    {
        $this->crustaceos = $crustaceos;

        return $this;
    }

    /**
     * Get crustaceos
     *
     * @return boolean 
     */
    public function getCrustaceos()
    {
        return $this->crustaceos;
    }

    /**
     * Set moluscos
     *
     * @param boolean $moluscos
     * @return Productos
     */
    public function setMoluscos($moluscos)
    {
        $this->moluscos = $moluscos;

        return $this;
    }

    /**
     * Get moluscos
     *
     * @return boolean 
     */
    public function getMoluscos()
    {
        return $this->moluscos;
    }

    /**
     * Set frutosDeCascara
     *
     * @param boolean $frutosDeCascara
     * @return Productos
     */
    public function setFrutosDeCascara($frutosDeCascara)
    {
        $this->frutosDeCascara = $frutosDeCascara;

        return $this;
    }

    /**
     * Get frutosDeCascara
     *
     * @return boolean 
     */
    public function getFrutosDeCascara()
    {
        return $this->frutosDeCascara;
    }

    /**
     * Set cacahuete
     *
     * @param boolean $cacahuete
     * @return Productos
     */
    public function setCacahuete($cacahuete)
    {
        $this->cacahuete = $cacahuete;

        return $this;
    }

    /**
     * Get cacahuete
     *
     * @return boolean 
     */
    public function getCacahuete()
    {
        return $this->cacahuete;
    }

    /**
     * Set mostaza
     *
     * @param boolean $mostaza
     * @return Productos
     */
    public function setMostaza($mostaza)
    {
        $this->mostaza = $mostaza;

        return $this;
    }

    /**
     * Get mostaza
     *
     * @return boolean 
     */
    public function getMostaza()
    {
        return $this->mostaza;
    }

    /**
     * Set sesamo
     *
     * @param boolean $sesamo
     * @return Productos
     */
    public function setSesamo($sesamo)
    {
        $this->sesamo = $sesamo;

        return $this;
    }

    /**
     * Get sesamo
     *
     * @return boolean 
     */
    public function getSesamo()
    {
        return $this->sesamo;
    }

    /**
     * Set so2Sulfito
     *
     * @param boolean $so2Sulfito
     * @return Productos
     */
    public function setSo2Sulfito($so2Sulfito)
    {
        $this->so2Sulfito = $so2Sulfito;

        return $this;
    }

    /**
     * Get so2Sulfito
     *
     * @return boolean 
     */
    public function getSo2Sulfito()
    {
        return $this->so2Sulfito;
    }

    /**
     * Set altramuces
     *
     * @param boolean $altramuces
     * @return Productos
     */
    public function setAltramuces($altramuces)
    {
        $this->altramuces = $altramuces;

        return $this;
    }

    /**
     * Get altramuces
     *
     * @return boolean 
     */
    public function getAltramuces()
    {
        return $this->altramuces;
    }

    /**
     * Set no2Nitrito
     *
     * @param boolean $no2Nitrito
     * @return Productos
     */
    public function setNo2Nitrito($no2Nitrito)
    {
        $this->no2Nitrito = $no2Nitrito;

        return $this;
    }

    /**
     * Get no2Nitrito
     *
     * @return boolean 
     */
    public function getNo2Nitrito()
    {
        return $this->no2Nitrito;
    }

    /**
     * Set potenciadoresSabor
     *
     * @param boolean $potenciadoresSabor
     * @return Productos
     */
    public function setPotenciadoresSabor($potenciadoresSabor)
    {
        $this->potenciadoresSabor = $potenciadoresSabor;

        return $this;
    }

    /**
     * Get potenciadoresSabor
     *
     * @return boolean 
     */
    public function getPotenciadoresSabor()
    {
        return $this->potenciadoresSabor;
    }
}
