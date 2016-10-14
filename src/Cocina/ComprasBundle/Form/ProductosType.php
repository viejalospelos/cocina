<?php

namespace Cocina\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaAlta', 'date')
            ->add('nombreProducto')
            ->add('tipoProducto')
//             ->add('slug')
            ->add('marca')
            ->add('baja')
            ->add('fechaBaja', 'date')
            ->add('notas')
            ->add('ean13')
            ->add('dun14')
            ->add('formatoCompra')
            ->add('precioFormatoCompra')
            ->add('factorConversionFormatoCompra')
            ->add('precioKg')
            ->add('estabilidadPrecios')
            ->add('fechaHomologacion', 'date')
            ->add('responsableHomologacion')
            ->add('rutaFichaTecnica')
            ->add('rutaDocumentosAdjuntos')
            ->add('ingredientesDeclarados')
            ->add('gluten')
            ->add('leche')
            ->add('huevo')
            ->add('soja')
            ->add('apio')
            ->add('pescado')
            ->add('crustaceos')
            ->add('moluscos')
            ->add('frutosDeCascara')
            ->add('cacahuete')
            ->add('mostaza')
            ->add('sesamo')
            ->add('so2Sulfito')
            ->add('altramuces')
            ->add('no2Nitrito')
            ->add('potenciadoresSabor')
//             ->add('idProveedor')
//             ->add('idAlmacen')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cocina\ComprasBundle\Entity\Productos'
        ));
    }
}
