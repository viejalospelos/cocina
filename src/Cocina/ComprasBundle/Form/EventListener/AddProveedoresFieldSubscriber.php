<?php
namespace Cocina\ComprasBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class AddProveedoresFieldSubscriber implements EventSubscriberInterface
{
	private $propertyPathToProductos;

	public function __construct($propertyPathToProductos)
	{
		$this->propertyPathToProductos = $propertyPathToProductos;
	}
	
   public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_SUBMIT => 'preSubmit'
        );
    }

    private function addProveedorForm($form, $proveedores=null)
    {
        $formOptions=array(
            'class' => 'ComprasBundle:Proveedores',
            'placeholder' => 'Selecciona proveedor',
            'mapped' => false,
        	'label'=>'Proveedor',
            'attr' => array(
                'class' => 'proveedor_selector',
            ),

        );
        if ($proveedores){
        	$formOptions['data']=$proveedores;
        }
        
        $form->add('idProveedor',EntityType::class,$formOptions);
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }


		$accessor=PropertyAccess::createPropertyAccessor();
		
		$producto=$accessor->getValue($data, $this->propertyPathToProductos);
		$proveedores=($producto) ? $producto->getId() : null;
		
		$this->addProveedorForm($form, $proveedores);
    }

    public function preSubmit(FormEvent $event)
    {
        $form = $event->getForm();

        $this->addProveedorForm($form);
    }
}