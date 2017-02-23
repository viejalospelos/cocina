<?php

namespace Cocina\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Cocina\ComprasBundle\Form\Pedidos_detalleType;
use Cocina\ComprasBundle\Form\EventListener\AddProductosFieldSubscriber;
use Cocina\ComprasBundle\Form\EventListener\AddProveedoresFieldSubscriber;


class PedidosType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$propertyPathToProductos='detalles';
    	
        $builder
        	->addEventSubscriber(new AddProveedoresFieldSubscriber($propertyPathToProductos))        
        	->addEventSubscriber(new AddProductosFieldSubscriber($propertyPathToProductos))
    
        	->add('detalles', new Pedidos_detalleType())
        ;
        	
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cocina\ComprasBundle\Entity\Pedidos',
        	'cascade_validation' => true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cocina_comprasbundle_pedidos';
    }


}
