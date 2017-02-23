<?php

namespace Cocina\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Cocina\ComprasBundle\Entity\Pedidos;

class PedidosPadreType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	$builder
    	->add('camposPedido', CollectionType::class, array(
    			'entry_type'=>new PedidosType(),
    			'by_reference'   => false,
    			'prototype_data' => new Pedidos(),
    			'allow_delete'   => true,
    			'allow_add'      => true,
    			'attr'           => array(
    				'class' => 'row camposPedido'
    			)
    	));
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
    	$resolver->setDefaults(array(
    			'data_class' => 'Cocina\ComprasBundle\Entity\Pedidos',
    			'cascade_validation' => true,
    	));
    }
    

    public function getBlockPrefix()
    {
    	return 'cocina_comprasbundle_pedidosPadre';
    }
}