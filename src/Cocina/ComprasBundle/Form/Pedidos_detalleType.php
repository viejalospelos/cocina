<?php

namespace Cocina\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class Pedidos_detalleType extends AbstractType
{

	

    public function buildForm(FormBuilderInterface $builder, array $options)
    {  	
        $builder

        ->add('cantidadPedida')
        ->add('observaciones')
        ;
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cocina\ComprasBundle\Entity\Pedidos_detalle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'cocina_comprasbundle_pedidos_detalle';
    }


}
