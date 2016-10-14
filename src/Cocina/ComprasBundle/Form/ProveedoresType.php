<?php

namespace Cocina\ComprasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProveedoresType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            //->add('slug')
            ->add('categoriaProveedor')
            ->add('descripcion')
            ->add('domicilioSocial')
            ->add('telefonoPrincipal')
            ->add('emailPrincipal')
            ->add('fax')
            ->add('web')
            ->add('registroSanitario')
            ->add('cif')
            ->add('diaDeEntrega')
            ->add('antelacionDePedido')
            ->add('agenteComercial')
            ->add('telefonoAgenteComercial')
            ->add('emailAgenteComercial')
            ->add('responsableCalidad')
            ->add('telefonoResponsableCalidad')
            ->add('emailResponsableCalidad')
            ->add('notas')
            ->add('fechaHomologacion', 'date')
            ->add('responsableHomologacion')
            ->add('rutaRegistroSanitario')
            ->add('rutaDocumentosAdjuntos')
            ->add('estabilidadPrecios')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cocina\ComprasBundle\Entity\Proveedores'
        ));
    }
}
