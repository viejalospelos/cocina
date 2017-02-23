<?php
namespace Cocina\ComprasBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
use Cocina\ComprasBundle\Entity\Proveedores;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Cocina\ComprasBundle\ComprasBundle;


class AddProductosFieldSubscriber implements EventSubscriberInterface
{
	private $propertyPathToProductos;
	
	public function __construct($propertyPathToProductos)
	{
		$this->propertyPathToProductos=$propertyPathToProductos;
	}
	

	
	public static function getSubscribedEvents()
	{
		return array(
				FormEvents::PRE_SET_DATA => 'preSetData',
				FormEvents::PRE_SUBMIT => 'preSubmit',
		);
	}

	private function addProductoForm($form, $proveedores_id, $producto_id = null)	
	{

		$formOptions=array(
				'class'=>'ComprasBundle:Productos',
				'placeholder' => 'Selecciona producto',
				'mapped'=>false,
				'label'=>'Producto',
				'attr' => array(
						'class' => 'producto_selector',
				),		
				'query_builder' => function (EntityRepository $repository) use ($proveedores_id) {
					$qb = $repository->createQueryBuilder('productos')
						->innerJoin('productos.idProveedor', 'proveedores')
						->where('proveedores.id = :proveedores')
						->setParameter('proveedores', $proveedores_id)
					;
					return $qb;					
				}
				);
		$form->add('idProducto', EntityType::class, $formOptions);
	}

	public function preSetData(FormEvent $event)
	{
		$data = $event->getData();
		$form = $event->getForm();
		
				

		if (null === $data) {
			return;
		}
		
		
		$accessor=PropertyAccess::createPropertyAccessor();
		
		$datos=$accessor->getValue($data, $this->propertyPathToProductos);
		
		$producto_id=($datos) ? $datos->getDetalles()->getIdProducto() : null;

		$proveedores_id=($producto_id) ? $producto_id->getIdProveedor() : null;
		
		$proveedores_id=1;
		
		$this->addProductoForm($form, $proveedores_id, $producto_id);


	}

	public function preSubmit(FormEvent $event)
	{
		$data = $event->getData();
		$form = $event->getForm();

		$proveedores_id = array_key_exists('idProveedor', $data) ? $data['idProveedor'] : null;
		$producto_id = array_key_exists('idProducto', $data) ? $data['idProducto'] : null;	

		$this->addProductoForm($form, $proveedores_id, $producto_id);
	}
	

}